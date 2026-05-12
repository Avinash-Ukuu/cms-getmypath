<?php

namespace App\Http\Controllers\cms;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use Illuminate\Http\Request;
use Razorpay\Api\Api;
use Stripe\Stripe;
use Stripe\Checkout\Session;

class PaymentController extends Controller
{
    public function createOrder(Request $request)
    {
        $request->validate([
            'name'      => 'required',
            'email'     => 'required|email',
            'phone'     => 'required',
            'course_name' => 'required',
            'country'   => 'required',
            'amount'    => 'required',
        ]);

        $country = strtolower($request->country);

        // INDIA → RAZORPAY
        if ($country === 'india') {

            $currency = 'INR';

            $api = new Api(
                config('services.razorpay.key'),
                config('services.razorpay.secret')
            );

            $order = $api->order->create([
                'receipt' => 'receipt_' . time(),
                'amount' => $request->amount * 100,
                'currency' => $currency,
            ]);

            return response()->json([
                'gateway' => 'razorpay',
                'currency' => $currency,
                'order' => $order,
                'key' => config('services.razorpay.key'),
            ]);
        }

        // OTHER COUNTRIES → STRIPE

        $currency = 'USD';

        if ($country === 'dubai') {
            $currency = 'AED';
        }

        Stripe::setApiKey(config('services.stripe.secret'));

        $session = Session::create([
            'payment_method_types' => ['card'],
            'line_items' => [[
                'price_data' => [
                    'currency' => strtolower($currency),
                    'product_data' => [
                        'name' => $request->course_name,
                    ],
                    'unit_amount' => $request->amount * 100,
                ],
                'quantity' => 1,
            ]],
            'mode' => 'payment',
            'success_url' => env('APP_URL') . '/success?session_id={CHECKOUT_SESSION_ID}',
            'cancel_url' => env('APP_URL') . '/cancel',
        ]);

        return response()->json([
            'gateway' => 'stripe',
            'currency' => $currency,
            'session_id' => $session->id,
            'checkout_url' => $session->url,
        ]);
    }
    // SAVE RAZORPAY SUCCESS

    public function razorpaySuccess(Request $request)
    {
        $payment = Payment::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'course_name' => $request->course_name,
            'course_mode' => $request->course_mode,
            'batch_type' => $request->batch_type,
            'batch_start' => $request->batch_start,
            'batch_duration' => $request->batch_duration,
            'batch_time' => $request->batch_time,
            'batch_days' => $request->batch_days,
            'country' => $request->country,
            'currency' => 'INR',
            'gateway' => 'razorpay',
            'transaction_id' => $request->razorpay_payment_id,
            'amount' => $request->amount,
            'status' => 'success',
            'response' => $request->all(),
        ]);

        return response()->json([
            'message' => 'Payment Success',
            'data' => $payment,
        ]);
    }

    // SAVE STRIPE SUCCESS

    public function stripeSuccess(Request $request)
    {
        Stripe::setApiKey(config('services.stripe.secret'));

        $session = Session::retrieve($request->session_id);

        $payment = Payment::create([
            'user_id' => auth()->id(),
            'course_id' => $request->course_id,
            'country' => $request->country,
            'currency' => strtoupper($session->currency),
            'gateway' => 'stripe',
            'transaction_id' => $session->payment_intent,
            'amount' => $session->amount_total / 100,
            'status' => 'success',
            'response' => (array)$session,
        ]);

        return response()->json([
            'message' => 'Payment Success',
            'data' => $payment,
        ]);
    }
}

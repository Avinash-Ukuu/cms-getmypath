<?php

namespace App\Http\Controllers\cms;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard()
    {
        return view('cms.dashboard');
    }

    public function paymentData()
    {
        $payments = Payment::latest()->get();

        return response()->json([
            'data' => $payments
        ]);
    }
}

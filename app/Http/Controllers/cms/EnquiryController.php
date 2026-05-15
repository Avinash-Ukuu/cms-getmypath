<?php

namespace App\Http\Controllers\cms;

use App\Http\Controllers\Controller;
use App\Mail\EnquiryMail;
use App\Models\Enquiry;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Yajra\DataTables\Facades\DataTables;

class EnquiryController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data       =   Enquiry::select('enquiries.*');

            if ($request->order == null) {
                $data->orderBy('enquiries.created_at', 'desc');
            }

            return DataTables::of($data)
                ->addIndexColumn()
                ->make(true);
        }

        return view('cms.enquiry');
    }

    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'name'          => 'required|string|max:255',
            'email'         => 'required|email|max:255',
            'mobile'        => 'required|string|max:20',
            'designation'   => 'required|string|max:100',
            'company_name'  => 'required|string|max:100',
            'message'       => 'nullable|string',
        ]);

        $enquiry = Enquiry::create($validated);

        Mail::to(['adithyakaushik@getmypath.com','kavya@getmypath.com'])->send(new EnquiryMail($enquiry));

        return response()->json([
            'status'  => true,
            'message' => 'Enquiry submitted successfully',
            'data'    => $enquiry,
        ], 201);
    }
}

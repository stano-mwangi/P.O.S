<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MpesaController extends Controller
{
    //
    protected $mpesaService;

    public function __construct(MpesaService $mpesaService)
    {
        $this->mpesaService = $mpesaService;
    }

    public function stkPush(Request $request)
    {
        $response = $this->mpesaService->stkPush(
            $request->amount, 
            $request->phone, 
            $request->account_reference, 
            $request->transaction_desc
        );

        return response()->json($response);
    }

    public function callback(Request $request)
    {
        // Handle the callback from M-PESA
        // Save the response to the database or perform other necessary actions
        Log::info('M-PESA Callback: ', $request->all());

        return response()->json(['ResultCode' => 0, 'ResultDesc' => 'Accepted']);
    }
}

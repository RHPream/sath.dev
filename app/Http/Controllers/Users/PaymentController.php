<?php

namespace App\Http\Controllers\Users;

use App\Models\Payment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class PaymentController extends Controller
{
    public function pay(Request $request)
    {
        $this->validate($request,[
           'send_from' => 'required|min:11',
           'method_type' => 'required',
           'amount' => 'required|numeric'
        ]);
        $data = [
            'user_id' => Auth::user()->id,
            'send_from' => $request->send_from,
            'method' => $request->method_type,
            'reference' => $request->reference,
            'amount' => $request->amount,
            'status' => false
        ];
        $requested = Payment::create($data);
        if($requested) {
            Session::flash('success','Your payment request was successfully submitted. Your payment will be added soon after validation.');
        } else {
            Session::flash('denied','Your payment request was denied. Please try again.');
        }
        return back();
    }
}

<?php

namespace App\Http\Controllers\Admins;

use App\Models\Payment;
use App\Models\UserProfile;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PaymentController extends Controller
{
    public function index()
    {
        $payments = Payment::orderBy('id','desc')->get();
        return view('admin.payment.index',compact('payments'));
    }
    public function approve($id)
    {
        $entity = Payment::where('id',$id)->firstOrFail();
        $userProfile = UserProfile::where('user_id',$entity->user_id)->firstOrFail();
        $userProfile->balance = $userProfile->balance?$userProfile->balance:0;
        $userProfile->balance += $entity->amount;
        $userProfile->last_payment_date = $entity->created_at;
        $userProfile->last_payment_amount = $entity->amount;
        $userProfile->save();
        $entity->status = true;
        if($entity->save()){
            return true;
        } else {
            return false;
        }
    }
    public function livePay(Request $request)
    {
        $this->validate($request,[
            'email' => 'required|email',
            'amount' => 'required|numeric'
        ]);
        $user = User::where('email',$request->email)->firstOrFail();
        $userProfile = UserProfile::where('user_id',$user->id)->firstOrFail();
        $userProfile->balance = $userProfile->balance?$userProfile->balance:0;
        $userProfile->balance += $request->amount;
        $userProfile->last_payment_date = date('Y-m-d H:i:s');
        $userProfile->last_payment_amount = $request->amount;
        $userProfile->save();
        $data = [
            'user_id' => $user->id,
            'send_from' => 'Live pay',
            'method' => 'Live',
            'reference' => 'Admin: '.auth()->guard('admin')->user()->email,
            'amount' => $request->amount,
            'status' => true
        ];
        Payment::create($data);
        return back();
    }
}

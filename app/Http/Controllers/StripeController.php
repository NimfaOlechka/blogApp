<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Auth;
use Illuminate\Support\Facades;
use App\Models\User;
use Illuminate\Support\Facades\Password;
use Illuminate\Http\Request;

use Laravel\Cashier;

class StripeController extends Controller
{
    //
    public function checkout(Request $request)
    {
        $user = auth()->user();
        //dd($user);
       
       $user = $user->createSetupIntent();
        return view('admin.posts.checkout', [
            'intent' => $user
        ]);
    }

    public function charge(Request $request)
    {
        //dd($request);
        //$user = User::where('id',6)->get();
        $user          = auth()->user();
        $paymentMethod = $request->input('payment_method');
        dd($paymentMethod);

    try {
        $user->createOrGetStripeCustomer();
        $stripeCharge = $user()->charge(
            130, $request->input('payment_method')
        );
        //$user->updateDefaultPaymentMethod($paymentMethod);
        //$user->charge(152*100, $paymentMethod);   
        dd('hurra');     
    } catch (\Exception $exception) {
        dd('error');
        return back()->with('error', $exception->getMessage());
        
    }

   dd('ops');
    return redirect('/')->with('success','Product purchased successfully!');
    }
}

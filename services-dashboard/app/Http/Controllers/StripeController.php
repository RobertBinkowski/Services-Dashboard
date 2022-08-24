<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;
use Stripe;
use \App\Models\Payment;
use Exception;

class StripeController extends Controller
{
    public function stripe($id){
        return view('service.payment.stripe', [
            'contract' => \App\Models\Contract::find($id),
        ]);
    }
    public function stripePost(Request $request){

        try{
            Stripe::setApiKey(env('STRIPE_SECRET'));
            Charge::create ([
                    "amount" => $request->amount * 100,
                    "currency" => "eur",
                    "source" => $request->stripeToken,
                    "description" => "Test payment form"
            ]);
            // Set As Complete
            DB::table('contracts')
                ->where('service', $request->contract)
                ->limit(1)
                ->update([
                'status' => 'Complete',
            ]);

            $newPayment = new Payment;
            $newPayment->users = $request->user;
            $newPayment->contract = $request->contract;
            $newPayment->amount = $request->amount;
            $newPayment->save();

            return back()->with('success', 'Form successfully Completed, Payment Went Through');
        }catch(Exception $e){

            return back()->with('success', 'There Was an error with the payment');
        }
    }
}

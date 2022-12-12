<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Option;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use KingFlamez\Rave\Facades\Rave as Flutterwave;

class FlutterwaveController extends Controller
{
    /**
     * Initialize Rave payment process
     * @return void
     */
    public function initialize(Request $request)
    {
       // return $this->mobileMoney();
        //This generates a payment reference
        $reference = Flutterwave::generateReference();
        $settings =  Option::where('key','currency')->first();

        $currency = json_decode($settings->value)->code;
        $amount = request()->amount;

        if ($currency == 'USD' && $amount > 50) {
            abort(Response::HTTP_UNPROCESSABLE_ENTITY,
            "Amount must be less than 50 {$currency}");
        }

        //'payment_options' => 'card(visa),account(direct debit),banktransfer,mpesa,qr,ussd,credit,mobile_money_uganda',


        // Enter the details of the payment
        $data = [
            'payment_options' => 'card',
            'amount' => $amount,
            'email' => request()->email,
            'tx_ref' => $reference,
            'currency' => 'UGX', //$currency,
            'redirect_url' => route('callback'),
            'customer' => [
                'email' => request()->email,
                "phone_number" => request()->phone,
                "name" => request()->name
            ],

            "customizations" => [
                "title" => 'Bulk Purchase',
                "description" => now()
            ]
        ];

        $payment = Flutterwave::initializePayment($data);

        if ($payment['status'] == 'error') {
            $request->session()->flash('return_msg', $payment['message']);
            // notify something went wrong
            return back();
        }



        if ($payment['status'] == 'success') {
            $request->session()->flash('return_msg', 'Your payment was successful');
        }

        return redirect($payment['data']['link']);
    }

    public function mobileMoney()
    {
        $tx_ref = Flutterwave::generateReference();
        $order_id = Flutterwave::generateReference('momo');

        $data = [
            'amount' => request()->amount,
            'email' => request()->email,
            'redirect_url' => route('callback'),
            'phone_number' => request()->phone,
            'tx_ref' => $tx_ref,
            'order_id' => $order_id
        ];

        $charge = Flutterwave::payments()->momoUG($data);

        if ($charge['status'] === 'success') {
            # code...
            // Redirect to the charge url
            return redirect($charge['data']['redirect']);
        }
    }

    /**
     * Obtain Rave callback information
     * @return void
     */
    public function callback()
    {
        DB::beginTransaction();
        
        $status = request()->status;
        $ref = request()->tx_ref;
        $transaction_id = request()->transaction_id;

        //if payment is successful
        if ($status == 'successful') {
        
            $transactionID = Flutterwave::getTransactionIDFromCallback();
            $data = Flutterwave::verifyTransaction($transactionID)['data'];

            unset(
                $data['customer'],
                $data['auth_model'],
                $data['card'],
                $data['meta'],
                $data['device_fingerprint'],
                $data['processor_response']
            );

            $data['customer_id'] = Auth()->user()->id;

            Transaction::create($data);

            DB::commit();
            request()->session()->flash('return_msg', 'Your payment was successfully settled');

            return (new ProductController)->index();
        }
        elseif ($status ==  'cancelled'){
            //Put desired action/code after transaction has been cancelled here
        }
        else{

            //Put desired action/code after transaction has failed here
        }
        // Get the transaction from your DB using the transaction reference (txref)
        // Check if you have previously given value for the transaction. If you have, redirect to your successpage else, continue
        // Confirm that the currency on your db transaction is equal to the returned currency
        // Confirm that the db transaction amount is equal to the returned amount
        // Update the db transaction record (including parameters that didn't exist before the transaction is completed. for audit purpose)
        // Give value for the transaction
        // Update the transaction to note that you have given value for the transaction
        // You can also redirect to your success page from here

    }
}

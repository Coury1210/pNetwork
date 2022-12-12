<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Srmklive\PayPal\Services\PayPal;

class PayPalController extends Controller

{
/**
 * Responds with a welcome message with instructions
 *
 * @return \Illuminate\Http\Response
 */

public function payment()
{
    $provider = new PayPal();

    $provider->setCurrency('EUR');
    $token = $provider->getAccessToken();

    // $fields = ['id', 'product_id', 'name', 'description'];
    $plans = $provider->listPlans();

    //create plan

    $data = json_decode('{
        "product_id": "PROD-XXCD1234QWER65782",
        "name": "Video Streaming Service Plan",
        "description": "Video Streaming Service basic plan",
        "status": "ACTIVE",
        "billing_cycles": [
          {
            "frequency": {
              "interval_unit": "MONTH",
              "interval_count": 1
            },
            "tenure_type": "TRIAL",
            "sequence": 1,
            "total_cycles": 2,
            "pricing_scheme": {
              "fixed_price": {
                "value": "3",
                "currency_code": "USD"
              }
            }
          },
          {
            "frequency": {
              "interval_unit": "MONTH",
              "interval_count": 1
            },
            "tenure_type": "TRIAL",
            "sequence": 2,
            "total_cycles": 3,
            "pricing_scheme": {
              "fixed_price": {
                "value": "6",
                "currency_code": "USD"
              }
            }
          },
          {
            "frequency": {
              "interval_unit": "MONTH",
              "interval_count": 1
            },
            "tenure_type": "REGULAR",
            "sequence": 3,
            "total_cycles": 12,
            "pricing_scheme": {
              "fixed_price": {
                "value": "10",
                "currency_code": "USD"
              }
            }
          }
        ],
        "payment_preferences": {
          "auto_bill_outstanding": true,
          "setup_fee": {
            "value": "10",
            "currency_code": "USD"
          },
          "setup_fee_failure_action": "CONTINUE",
          "payment_failure_threshold": 3
        },
        "taxes": {
          "percentage": "10",
          "inclusive": false
        }
      }', true);
      
      $plan = $provider->createPlan($data);

      //get plan details
      $plan_id = 'P-7GL4271244454362WXNWU5NQ';

    $plan = $provider->showPlanDetails($plan_id);

      //update plan
      $data = json_decode('[
        {
          "op": "replace",
          "path": "/payment_preferences/payment_failure_threshold",
          "value": 7
        }
      ]', true);
      
      $plan_id = 'P-7GL4271244454362WXNWU5NQ';
      
      $plan = $provider->updatePlan($plan_id, $data);


    $data = [];
    $data['items'] = [
    [
    'name' => 'web-tuts.com',
    'price' => 100,
    'desc' => 'Description for web-tuts.com',
    'qty' => 1
    ]
    ];

    $data['invoice_id'] = 1;
    $data['invoice_description'] = "Order #{$data['invoice_id']} Invoice";
    $data['return_url'] = route('payment.success');
    $data['cancel_url'] = route('payment.cancel');
    $data['total'] = 100;

    $response = $provider->addProduct('Demo Product', 'Demo Product', 'SERVICE', 'SOFTWARE')
                ->addPlanTrialPricing('DAY', 7)
                ->addDailyPlan('Demo Plan', 'Demo Plan', 1.50)
                ->setReturnAndCancelUrl('https://example.com/paypal-success', 'https://example.com/paypal-cancel')
                ->setupSubscription('John Doe', 'john@example.com', '2021-12-10');
    //  $response = $provider->setExpressCheckout($data);
    //  $response = $provider->setExpressCheckout($data, true);

    return redirect($response['paypal_link']);
}

/**
 * Responds with a welcome message with instructions
 *
 * @return \Illuminate\Http\Response
 */

public function cancel()
{
 dd('Your payment is canceled. You can create cancel page here.');
}

/**
 * Responds with a welcome message with instructions
 *
 * @return \Illuminate\Http\Response
 */

public function success(Request $request)
{
 $response = $provider->getExpressCheckoutDetails($request->token);

if (in_array(strtoupper($response['ACK']), ['SUCCESS', 'SUCCESSWITHWARNING'])) {
 dd('Your payment was successfully. You can create success page here.');
}

 dd('Something is wrong.');
}
}
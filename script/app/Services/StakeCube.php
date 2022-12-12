<?php

namespace App\Services;

use Exception;
use Stakecube\Stakecube as Stake;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;

class StakeCube
{
    public static function getSupportedCoins() 
    {
        $public_key =  env('STAKECUBE_KEY');
        $private_key = env('STAKECUBE_SECRET');

        $stakecube = new Stake($public_key , $private_key);
        dd($stakecube->getArbitrageInfo('DOGEC'));

        

        try {
            $response = (new Client)->request('POST', $url, $options);
        } catch(ClientException $err) {
            return $err->getResponse()->getBody()->getContents();
        }
        dd($response->getBody()->getContents());
    }

    public static function verifyAddress($address, $currency) 
    {
        $url = env('FAUCETPAY_URL').'/checkaddress';
        //$res = Http::dd()->post($url, ['api_key' => env('FAUCETPAY_API')
        // $res = Http::post($url, ['api_key' => env('FAUCETPAY_API')
        // ]);

        $options = [
            'form_params' => [
                'api_key' => env('FAUCETPAY_API'),
                'address' => $address,
                'currency' => $currency               //exists in allowed currencies
            ],
            'verify' => false
        ];

        

        try {
            $response = (new Client)->request('POST', $url, $options);
        } catch(ClientException $err) {
            return $err->getResponse()->getBody()->getContents();
        }
        dd($response->getBody()->getContents());
    }
    /**
     * @param string $to  email of receiver
     */

    public static function sendPayment($amount, $to_email, $currency=null, $ip=null, $referral=false) 
    {
        $url = env('FAUCETPAY_URL').'/send';
        //$res = Http::dd()->post($url, ['api_key' => env('FAUCETPAY_API')
        // $res = Http::post($url, ['api_key' => env('FAUCETPAY_API')
        // ]);

        $options = [
            'form_params' => [
                'api_key' => env('FAUCETPAY_API'),
                'amount' => $amount,
                'to' => $to_email,
                'ip_address' => $ip, //for anti-fruad system check
                'referral'  => $referral,
                'currency' => $currency               //exists in allowed currencies
            ],
            'verify' => false
        ];

        

        try {
            $response = (new Client)->request('POST', $url, $options);
        } catch(ClientException $err) {
            return $err->getResponse()->getBody()->getContents();
        }
        dd($response->getBody()->getContents());
    }

     /**
     * @param string $to  email of receiver
     */

    public static function getRecentPayments($amount, $currency=null, $count=null) 
    {
        $url = env('FAUCETPAY_URL').'/payouts';
        //$res = Http::dd()->post($url, ['api_key' => env('FAUCETPAY_API')
        // $res = Http::post($url, ['api_key' => env('FAUCETPAY_API')
        // ]);

        $options = [
            'form_params' => [
                'api_key' => env('FAUCETPAY_API'),
                'amount' => $amount,
                'currency' => $currency,             //exists in allowed currencies
                'count' => $count
            ],
            'verify' => false
        ];

        

        try {
            $response = (new Client)->request('POST', $url, $options);
        } catch(ClientException $err) {
            return $err->getResponse()->getBody()->getContents();
        }
        dd($response->getBody()->getContents());
    }
}
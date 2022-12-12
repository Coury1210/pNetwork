<?php

namespace App\Services;

use Exception;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;

class FaucetPay
{

    public static function getSupportedCoins() 
    {
        $url = env('FAUCETPAY_URL').'/currencies';
        //$res = Http::dd()->post($url, ['api_key' => env('FAUCETPAY_API')
        // $res = Http::post($url, ['api_key' => env('FAUCETPAY_API')
        // ]);

        $options = [
            'form_params' => [
                'api_key' => env('FAUCETPAY_API')
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

    public static function getBalance($currency = 'BTC') 
    {
        $url = env('FAUCETPAY_URL').'/getBalance';
        //$res = Http::dd()->post($url, ['api_key' => env('FAUCETPAY_API')
        // $res = Http::post($url, ['api_key' => env('FAUCETPAY_API')
        // ]);

        $options = [
            'form_params' => [
                'api_key' => env('FAUCETPAY_API'),
                'currency' => $currency
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
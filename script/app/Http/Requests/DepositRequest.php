<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DepositRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'amount' => "required|numeric",
            'method' => "required|in:btc,swift,paypal",
            'paypal_email' => "nullable|required_if:method,paypal",
            'btc_address' => "nullabe|required_if:method,btc"
        ];
    }
}

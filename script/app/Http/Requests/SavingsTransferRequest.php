<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SavingsTransferRequest extends FormRequest
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
            'receiver_username' => ['required', 'exists:users,username'],
            'amount' => ['required', 'numeric', 'min:0', 'max:999999999.99']
        ];
    }
}

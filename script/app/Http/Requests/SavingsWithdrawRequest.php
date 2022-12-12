<?php

namespace App\Http\Requests;

class SavingsWithdrawRequest extends DepositRequest
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
}

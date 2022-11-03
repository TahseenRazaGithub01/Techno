<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TransactionRequest extends FormRequest
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
            'sender_id'          => 'required',
            'sender_name'        => 'required',
            'sender_mobile'        => 'required',
            'receiver_id'        => 'required',
            'receiver_name'        => 'required',
            'bank_name'        		=> 'required',
            'account_number'        => 'required',
            'transaction_date'        => 'required',
            'transaction_type'        => 'required',
            'pak_rupees'        => 'required',
            'omani_riyal'        => 'required',
        ];
    }
}

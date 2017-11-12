<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PaymentRequest extends FormRequest
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
            'first_name' => 'required|min:4',
            'last_name' => 'required|min:4',
            'address' => 'required|min:2',
            'city' => 'required',
            'state' => 'required',
            'zip_code' => 'required',
            'stripeToken' => 'required|min:10'
        ];
    }
}

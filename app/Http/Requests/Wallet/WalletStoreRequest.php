<?php

namespace App\Http\Requests\Wallet;

use Illuminate\Foundation\Http\FormRequest;

class WalletStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|min:3|string',
            'card-number' => 'required|regex:/^\d{4}[-]?\d{4}[-]?\d{4}[-]?\d{4}$/',
            'expiry-date' => 'required|date_format:m/y',
            'cvv' => 'required|regex:/^\d{3,4}$/',
            'sum' => 'required|min:1|numeric'
        ];
    }
}

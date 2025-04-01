<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CityTariffStoreRequest extends FormRequest
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
            'city_id' => 'required|string|max:255',
            'transport_id' => 'required|string|max:255',
            'tariff_id' => 'required|string|max:255',
            'price' => 'required|min:0|max:500',
        ];
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestCreateHotel extends FormRequest
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
            'nameHotel' => 'required',
            'typeHotel' => 'required|not_in:0',
            'placeHotel' => 'required',
            'addressHotel' => 'required',
            'emailHotel' => 'required|email',
            'phoneHotel' => 'required|numeric|min:10',
            'rateHotel' => 'required|numeric',
            'imageHotel' => 'required',
            'wifiHotel' => 'required|not_in:2',
            'poolHotel' => 'required|not_in:2',
            'parkingHotel' => 'required|not_in:2',
            'smokeHotel' => 'required|not_in:2',
            'animalHotel' => 'required|not_in:2',
            'ageHotel' => 'required|not_in:2',
            'checkinHotel' => 'required',
            'checkoutHotel' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'nameHotel.required' => "Name is required",

            'typeHotel.required' => "Type is required",
            'typeHotel.not_in' => "Type error.Please try again",

            'placeHotel.required' => "Place is required",

            'addressHotel.required' => "Address is required",

            'emailHotel.required' => "Email is required",
            'emailHotel.email' => "Email format is incorrect",

            'phoneHotel.required' => "Phone is required",
            'phoneHotel.numeric' => "Phone is numeric",
            'phoneHotel.min' => "Incorrect phone number",

            'rateHotel.required' => "Rate is required",
            'rateHotel.numeric' => "Rate is numeric",

            'imageHotel.required' => "Image is required",

            'wifiHotel.required' => "Wifi is required",
            'wifiHotel.not_in' => "Wifi error.Please try again",

            'poolHotel.required' => "Pool is required",
            'poolHotel.not_in' => "Pool error.Please try again",

            'parkingHotel.required' => "Parking is required",
            'parkingHotel.not_in' => "Parking error.Please try again",

            'smokeHotel.required' => "Smoke is required",
            'smokeHotel.not_in' => "Smoke error.Please try again",

            'animalHotel.required' => "Animal is required",
            'animalHotel.not_in' => "Animal error.Please try again",

            'ageHotel.required' => "Age is required",
            'ageHotel.not_in' => "Age error.Please try again",

            'checkinHotel.required' => "Checkin is required",

            'checkoutHotel.required' => "Checkout is required",
        ];
    }
}

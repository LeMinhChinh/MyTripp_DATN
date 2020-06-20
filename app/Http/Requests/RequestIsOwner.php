<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestIsOwner extends FormRequest
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
            'nameOwner' => 'required',
            'emailOwner' => 'required|email',
            'phoneOwner' => 'required|numeric|min:10',
            'nameRP' => 'required',
            'rateRP' => 'required|numeric',
            'addressRP' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'emailOwner.required' => "Vui lòng nhập email",
            'emailOwner.email' => "Định dạng email không chính xác",

            'nameOwner.required' => "Vui lòng nhập tên của bạn",

            'phoneOwner.required' => "Vui lòng nhập số điện thoại của bạn",
            'phoneOwner.numeric' => "Định dạng số điện thoại không chính xác",
            'phoneOwner.min' => "Số điện thoại không đúng",

            'nameRP.required' => "Vui lòng nhập tên khách sạn",

            'rateRP.required' => "Vui lòng nhập đánh giá sao của khách sạn",
            'rateRP.numeric' => "Đánh giá sao phải là số",

            'addressRP.required' => "Vui lòng nhập địa chỉ khách sạn",
        ];
    }
}

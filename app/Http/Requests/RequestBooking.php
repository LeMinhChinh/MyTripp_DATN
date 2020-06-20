<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestBooking extends FormRequest
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
            'nameCustomer' => 'required',
            'emailCustomer' => 'required|email',
            'phoneCustomer' => 'required|numeric|min:10',
            'selectPayment' => 'required',
            'selectBank' => 'required',
            'addressCustomer' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'emailCustomer.required' => "Vui lòng nhập email",
            'emailCustomer.email' => "Định dạng email không chính xác",

            'nameCustomer.required' => "Vui lòng nhập tên của bạn",

            'phoneCustomer.required' => "Vui lòng nhập số điện thoại của bạn",
            'phoneCustomer.numeric' => "Định dạng số điện thoại không chính xác",
            'phoneCustomer.min' => "Số điện thoại không đúng",

            'selectPayment.required' => "Vui lòng chọn hình thức thanh toán",

            'selectBank.required' => "Vui lòng chọn ngân hàng thanh toán",

            'addressCustomer.required' => "Vui lòng nhập địa chỉ khách sạn",
        ];
    }
}

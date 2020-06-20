<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestRegister extends FormRequest
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
            'rgtEmail' => 'required|email',
            'rgtPass' => 'required|min:8',
            'rgtFname' => 'required',
            'rgtLname' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'rgtEmail.required' => "Vui lòng nhập email",
            'rgtEmail.email' => "Định dạng email không chính xác",

            'rgtPass.required' => "Vui lòng nhập mật khẩu",
            'rgtPass.min' => "Mật khẩu không được dưới 8 kí tự",

            'rgtFname.required' => "Vui lòng nhập họ và tên đệm của bạn",

            'rgtLname.required' => "Vui lòng nhập tên của bạn",
        ];
    }
}

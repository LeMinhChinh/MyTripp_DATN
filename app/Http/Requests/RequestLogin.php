<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestLogin extends FormRequest
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
            'lgEmail' => 'required|email',
            'lgPass' => 'required|min:8',
        ];
    }

    public function messages()
    {
        return [
            'lgEmail.required' => "Vui lòng nhập email",
            'lgEmail.email' => "Định dạng email không chính xác",
            'lgPass.required' => "Vui lòng nhập mật khẩu"
        ];
    }
}

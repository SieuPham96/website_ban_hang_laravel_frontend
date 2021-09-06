<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
            'email_account' => 'bail|required|email:rfc|max:255|min:6',
            'password_account' => 'bail|required|max:20|min:6',
        ];
    }

    public function messages()
    {
        return [
            'email_account.required' => 'Email không được để trống',
            'email_account.email' => 'Email không hợp lệ',
            'email_account.max' => 'Email không được phép quá 255 ký tự',
            'email_account.min' => 'Email không được phép dưới 6 ký tự',

            'password_account.required' => 'Password không được để trống',
            'password_account.max' => 'Password không được phép quá 20 ký tự',
            'password_account.min' => 'Password không được phép dưới 6 ký tự',
        ];
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'name' => 'bail|required|max:255|min:4',
            'email' => 'bail|required|email:rfc|unique:customers|max:255|min:6',
            'password' => 'bail|required|max:20|min:6',
            'phone' => 'bail|required|unique:customers|max:15|min:10'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Họ tên không được để trống',
            'name.max' => 'Họ tên không được phép quá 255 ký tự',
            'name.min' => 'Họ tên không được phép dưới 4 ký tự',

            'email.required' => 'Email không được để trống',
            'email.unique' => 'Email không được trùng',
            'email.email' => 'Email không hợp lệ',
            'email.max' => 'Email không được phép quá 255 ký tự',
            'email.min' => 'Email không được phép dưới 6 ký tự',

            'password.required' => 'Password không được để trống',
            'password.max' => 'Password không được phép quá 20 ký tự',
            'password.min' => 'Password không được phép dưới 6 ký tự',

            'phone.required' => 'SĐT không được để trống',
            'phone.unique' => 'SĐT không được trùng',
            'phone.max' => 'SĐT không được phép quá 15 ký tự',
            'phone.min' => 'SĐT không được phép dưới 10 ký tự',
        ];
    }
}

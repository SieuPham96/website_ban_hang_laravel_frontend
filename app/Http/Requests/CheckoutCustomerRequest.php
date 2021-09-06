<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CheckoutCustomerRequest extends FormRequest
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
            'email' => 'bail|required|email:rfc|max:255|min:6',
            'phone' => 'bail|required|max:15|min:10',
            'address' => 'bail|required|min:20'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Họ tên không được để trống',
            'name.max' => 'Họ tên không được phép quá 255 ký tự',
            'name.min' => 'Họ tên không được phép dưới 4 ký tự',

            'email.required' => 'Email không được để trống',
            'email.email' => 'Email không hợp lệ',
            'email.max' => 'Email không được phép quá 255 ký tự',
            'email.min' => 'Email không được phép dưới 6 ký tự',

            'phone.required' => 'SĐT không được để trống',
            'phone.max' => 'SĐT không được phép quá 15 ký tự',
            'phone.min' => 'SĐT không được phép dưới 10 ký tự',

            'address.required' => 'Địa chỉ không được để trống',
            'address.min' => 'Địa chỉ không được phép dưới 20 ký tự',
        ];
    }
}

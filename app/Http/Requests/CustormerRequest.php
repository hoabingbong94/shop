<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustormerRequest extends FormRequest
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
            'name'     => 'required|max:255',
            'phone'    => 'required|digits_between:10,11',
            'address'  => 'required',
            'quantity' => 'required|numeric'
        ];
    }

    public function messages()
    {
        return [
            'name.required'         => 'Tên không được bỏ trống',
            'phone.required'        => 'Số điện thoại không được bỏ trống',
            'address.required'      => 'Địa chỉ không được bỏ trống',
            'phone.digits_between'  => 'Số điện thoại không đúng định dạng từ 10 hoặc 11 số',
            'quantity.required'     => 'Số lượng không được bỏ trống',
            'quantity.numeric'      => 'Số lượng không đúng định dạng'
        ];
    }

}

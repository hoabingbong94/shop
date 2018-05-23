<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewsRequest extends FormRequest
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
            'name'  => 'required|max:255',
            'email' => 'email',
            'phone' => 'required|digits_between:10,11',
        ];
    }

    public function messages()
    {
        return [
            'name.required'         => 'Tên không được bỏ trống',
            'phone.required'        => 'Số điện thoại không được bỏ trống',
            // 'email.required'        => 'Chúng tôi cần biết địa chỉ email của bạn!',
            // 'email.unique'          => 'Email đã tồn tại ! Xin bạn chọn email khác!',
            'email.email'           => 'Email không đúng định dạng!',
            'phone.digits_between'  => 'Số điện thoại không đúng định dạng từ 10 hoặc 11 số',
        ];
    }

}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class edituser extends FormRequest
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
            "name"=>"required",
            "email"=>"required|email",
            "phone"=>"required|between:10,11",
            "website"=>"required",
      
            "image"=>"image|mimes:jpeg,png,jpg,gif,svg|max:2048",
        ];
    }
    public function messages()
    {
        return [
            "name.required"=>"Họ tên không được để trống",
            "email.required"=>"Email không được để trống",
            "email.email"=>"Email không hợp lệ",
            "website.required"=>"Website không được để trống",

            'image.mimes' => 'Bạn phải chọn đúng định dạng ảnh ',
            'image.image' => 'Bạn phải chọn đúng kiểu hình ảnh ',
        ];
    }
}

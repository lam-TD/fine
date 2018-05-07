<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CheckAddTouristPlacesRequest extends FormRequest
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
            'place_name' => 'required',
            'address' => 'required',
            'phonenumber' => 'required',
            'description' => 'required',
            'vido' => 'required',
            'kinhdo' => 'required',
            'content' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'place_name.required' => "Vui lòng nhập tên địa điểm.",
            'address.required'  => "Vui lòng nhập địa chỉ.",
            'phonenumber.required'  => "Vui lòng nhập số điện thoại.",
            'description.required'  => "Vui lòng nhập mô tả.",
            'vido.required'  => "Vui lòng nhập vĩ độ",
            'kinhdo.required'  => "Vui lòng nhập kinh độ",
            'content.required'  => "Vui lòng nhập nội dung",
        ];
    }
}

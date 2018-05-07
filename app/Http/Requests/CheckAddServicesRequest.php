<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CheckAddServicesRequest extends FormRequest
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
            'services_name' => 'required',
            'sv_open' => 'required',
            'sv_close' => 'required',
            'sv_lowest_price' => 'required|min:0',
            'sv_highest_price' => 'required|max:2147483647',
            'sv_phone_number' => 'required',
            'website' => 'required',
            'description' => 'required',
            'banner' => 'required',
            'details1' => 'required',
            'details2' => 'required',
            'content' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'services_name.required' => "Vui lòng nhập tên dịch vụ.",
            'sv_open.required'  => "Vui lòng nhập vào giờ mở cửa.",
            'sv_lowest_price.required'  => "Vui lòng nhập số thấp nhất.",
            'sv_lowest_price.min'  => "Giá phải là số lớn hơn 0.",
            'sv_lowest_price.max'  => "Số quá lớn vui lòng kiểm tra lại.",
            'sv_phone_number.required'  => "Vui lòng nhập số điện thoại",
            'website.required'  => "Vui lòng website",
            'description.required'  => "Vui lòng nhập mô tả",
            'content.required'  => "Vui lòng nhập nội dung",
            'banner.required'  => "Vui lòng chọn ảnh",
            'details1.required'  =>  "Vui lòng chọn ảnh",
            'details2.required'  =>  "Vui lòng chọn ảnh",

        ];
    }
}

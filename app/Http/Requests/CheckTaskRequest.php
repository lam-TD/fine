<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CheckTaskRequest extends FormRequest
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
            'task_name' => 'required',
            'task_description' => 'required',
            'task_start_date' => 'required',
            'task_end_date' => 'required',
            'content'=>'required'
        ];
    }
    public function messages()
    {
        return [
            'task_name.required' => "Vui lòng nhập tên nhiệm vụ.",
            'task_description.required'  => "Vui lòng nhập mô tả nhiệm vụ.",
            'task_start_date.required'  => "Vui lòng nhập ngày bắt đầu nhiệm vụ.",
            'task_end_date.required'  => "Vui lòng nhập ngày kết thúc nhiệm vụ.",
            'content.required'  => "Vui lòng nhập nội dung nhiệm vụ.",
        ];
    }
}

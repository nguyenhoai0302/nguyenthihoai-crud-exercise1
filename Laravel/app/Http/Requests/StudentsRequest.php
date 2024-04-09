<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
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
            'name' => 'required|string|min:5',
            'phone' => 'required|string|max:20',
        ];
    }
    
    public function messages()
    {
        return [
            'name.required' => 'Họ và tên bắt buộc phải nhập.',
            'name.string' => 'Tên phải là một chuỗi.',
            'name.min' => 'Họ và tên phải từ :min ký tự trở lên',
            'phone.required' => 'Trường điện thoại là bắt buộc.',
            'phone.string' => 'Điện thoại phải là một chuỗi.',
            'phone.max' => 'Điện thoại không được lớn hơn :max ký tự',
        ];
    }
}

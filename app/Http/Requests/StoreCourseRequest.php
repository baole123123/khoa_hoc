<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCourseRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required' ,
            'description' => 'required' ,
            'image' => 'required' ,
            'status' => 'required' ,
            'category_id' => 'required' ,
            'level_id' => 'required' ,


        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Trường bắt buộc nhập' ,
            'description.required' => 'Trường bắt buộc nhập' ,
            'image.required' => 'Trường bắt buộc nhập' ,
            'status.required' => 'Trường bắt buộc nhập' ,
            'category_id.required' => 'Trường bắt buộc nhập' ,
            'level_id.required' => 'Trường bắt buộc nhập' ,

        ];
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'name' => 'required',
            'email' => 'required|email|unique:members',
            'password' => 'required|min:6',
            'phone' => 'required|unique:members|digits:10',
        ];
    }
    public function messages() {
        return [
            'name.required' => 'Bắt buộc phải nhập tên',
            'email.required' => 'Bắt buộc phải nhập email',
            'email.email' => 'Email không đúng định dạng',
            'email.unique' => 'Email đã tồn tại',
            'password.required' => 'Bắt buộc phải nhập mật khẩu',
            'password.min' => 'Mật khẩu bạn nhập quá ngắn',
            'phone.required' => 'Bắt buộc phải nhập số điện thoại',
            'phone.unique' => 'Số điện thoại đã tồn tại',
            'phone.digits' => 'Số điện thoại không hợp lệ',
        ];
    }
}
<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMemberRequest extends FormRequest
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
            'email' => 'required|unique:members|email',
            'password' => 'min:6|regex:/^[a-zA-Z0-9_\-\.]+$/|required',
            'phone' => 'digits:10|required|unique:members',
        ];
    }
    public function messages() {
        return [
            'name.required' => 'Không được để trống trường này',
            'email.required' => 'Không được để trống trường này',
            'email.unique' => 'Email đã tồn tại',
            'email.email' => 'Email không đúng định dạng',
            'password.required' => 'Không được để trống trường này',
            'password.min' => 'Mật khẩu phải có ít nhất 6 kí tự',
            'password.regex' => 'Mật khẩu không bao gồm các kí tự đặc biệt',
            'phone.digits' => 'Số điện thoại không hợp lệ',
            'phone.required' => 'Không được để trống trường này',
            'phone.unique' => 'Số điện thoại đã tồn tại',
        ];
    }
}

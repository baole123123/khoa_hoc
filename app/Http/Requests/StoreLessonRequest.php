<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreLessonRequest extends FormRequest
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
            'name' => 'required|unique:lessons',
            'reading' => 'required'
        ];
    }
    public function messages() {
        return [ 
            'name.required' => 'ko dc de trong',
            'name.unique' => 'bai hoc da ton tai',
            'reading.required' => 'ko dc de trong',
        ];
    }
}

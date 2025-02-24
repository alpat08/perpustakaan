<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreLoginRequest extends FormRequest
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
            'login' => 'required',
            'password' => 'required|min:8'
        ];
    }

    public function messages()
    {
        return [
            'login.required' => 'Harus Di isi',
            'password.required' => 'Harus Di isi',
            'password.min:8' => 'Password minimal 8 karakter'
        ];
    }
}

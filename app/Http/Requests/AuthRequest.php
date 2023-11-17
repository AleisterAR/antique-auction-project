<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AuthRequest extends FormRequest
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
        if ($this->method() === 'POST') {
            return [
                'email' => ['required', 'email'],
                'password' => ['required', 'min:8', 'max:20']
            ];
        }
        return [
            'email' => ['required', 'unique:users,email', 'email'],
            'password' => ['required', 'min:8', 'max:20']
        ];
    }
}
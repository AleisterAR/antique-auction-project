<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminUserCreateRequest extends FormRequest
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
            'user_name' => ['required', 'max:20'],
            'full_name' => ['required', 'max:20'],
            'email' => ['required', 'unique:users,email', 'email'],
            'phone_number' => ['required'],
            'address' => ['required'],
            'role' => ['exists:roles,id', 'required'],
            'password' => ['required', 'min:8', 'max:20', 'confirmed'],
        ];
    }
}
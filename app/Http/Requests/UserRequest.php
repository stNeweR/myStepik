<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            "email" => ["email", "required", "unique:users,email"],
            "first_name" => ["required", "string"],
            "last_name" => ["required", "string"],
            "user_name" => ["string", "required", "unique:users,user_name"],
            "password" => ["string", "min:3", "confirmed", "required"],
        ];
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
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
            'user_name' => [ Rule::unique('users', 'user_name')->ignore(Auth::id()), "string", "required"],
            "full_name" => ["required", "string"],
            "password" => ["string", "min:3", "confirmed", "required"],
            'description' => ['string']
        ];
    }
}

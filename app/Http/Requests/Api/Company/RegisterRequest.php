<?php

namespace App\Http\Requests\Api\Company;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        return [
            'name' => 'required|string|min:3|max:100',
            'email' => 'required|string|email|unique:companies,email',
            'logo' => 'required|file|mimes:png,jpg,jpeg,webp|max:2048',
            'password' => 'required|string|min:6|max:30',
            'phone' => 'nullable|string|unique:companies,phone',
            'bio' => 'nullable|string|min:3|max:2000',
            'about' => 'nullable|string|min:3|max:2000',
            'location' => 'nullable|string|min:4|max:200',
            'website' => 'nullable|string|url',
        ];
    }
}

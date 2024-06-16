<?php

namespace App\Http\Requests\MerchantAuth;

use Illuminate\Foundation\Http\FormRequest;

class MerchantRegisterRequest extends FormRequest
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
            'name' => 'required|string|max:100',
            'phone' => 'required|string|regex:/^[0-9]{10,15}$/',
            'email' => 'required|email',
            'description' => 'nullable|string|max:500',
            'linkWebsite' => 'nullable|url',
            'address' => 'nullable|string|max:200',
            'password' => 'required|string',
            'username' => 'required|string',
        ];
    }
    /**
     * Get the error messages for the defined validation rules.
     */
    public function messages(): array
    {
        return [
            'name.required' => 'Name is required',
            'name.max' => "Name length can't be more than 100.",
            'phone.required' => 'Phone is required',
            'phone.regex' => 'Invalid phone number',
            'email.required' => 'Email is required',
            'email.email' => 'Invalid email address',
            'description.max' => "Description length can't be more than 500.",
            'linkWebsite.url' => 'Invalid URL',
            'address.max' => "Address length can't be more than 200.",
            'password.required' => 'Password is required',
            'username.required' => 'Username is required',
        ];
    }

    protected function prepareForValidation(): void
    {
        $this->merge([
            'name' => trim($this->name),
            'phone' => preg_replace('/\s+/', '', $this->phone), // Remove spaces from phone number
            'email' => trim($this->email),
            'description' => trim($this->description),
            'linkWebsite' => trim($this->linkWebsite),
            'address' => trim($this->address),
            'username' => trim($this->username),
        ]);
    }
}

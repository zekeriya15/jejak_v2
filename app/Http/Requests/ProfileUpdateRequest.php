<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'string',
                'lowercase',
                'email',
                'max:255',
                Rule::unique(User::class)->ignore($this->user()->id),
            ],
            'phone' => [
                'nullable',  // Make phone field optional
                'string',    // Ensure it is a string
                'max:15',    // Adjust max length based on your requirements
                'unique:users,phone,' . $this->user()->id, // Ensure the phone number is unique (except for the current user's)
            ],
            'password' => [
                'nullable',  // Allow password to be null if not provided
                'confirmed',  // Ensure password confirmation matches
                'min:8',  // Set a minimum length requirement for the password
            ],
        ];
    }
}

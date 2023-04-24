<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateUserRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'updateFullName' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'updateEmail' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'updatePassword' => ['required', 'string', 'min:8', 'confirmed'],
            // 'contact_no' => ['required', 'int', 'min:11', 'max:11'],
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Name field is required.',
            'password.required' => 'Password field is required.',
            'password.confirmed' => 'Password does not match.',
            'password.min' => 'Password must be a minimum of 8 characters',
            'email.required' => 'Email field is required.',
            'email.unique' => 'Email address must be unique within the organization',
            'email.email' => 'Email field must be email address.',
            'updateFullName.required' => 'Name field is required.',
            'updatePassword.required' => 'Password field is required.',
            'updatePassword.confirmed' => 'Password does not match.',
            'updatePassword.min' => 'Password must be a minimum of 8 characters',
            'updateEmail.required' => 'Email field is required.',
            'updateEmail.unique' => 'Email address must be unique within the organization',
            'updateEmail.email' => 'Email field must be email address.',
            // 'contact_no.required' => 'Contact field is required.',
            // 'contact_no.max' => 'Contact nuber must be a min and max of 11 characters'
        ];
    } 
}

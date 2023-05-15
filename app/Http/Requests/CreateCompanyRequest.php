<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateCompanyRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'contact_no' => ['required', 'min:11', 'max:11'],
            'contact_name' => ['required', 'string', 'max:255'],
            'tel' => ['required', 'string', 'max:20'],
            'street' => ['required', 'string', 'max:255'],
            'city' => ['required', 'string', 'max:255'],
            'state' => ['required', 'string', 'max:255'],
            'postal_code' => ['required', 'string', 'max:6'],
            'website' => ['nullable', 'url', 'max:255'],
            'facebook' => ['required', 'url', 'max:255'],
            'linkedin' => ['nullable', 'url', 'max:255'],
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
            'contact_no.required' => 'Contact field is required.',
            'contact_no.min' => 'Contact nuber must be a min and max of 11 numbers',
            'contact_no.max' => 'Contact nuber must be a min and max of 11 numbers',
            'contact_name.required' => 'Name field is required.',
            'tel.required' => 'Telephone field is required.',
            'tel.max' => 'Telephone must be a max of 12 characters',
            'street.required' => 'Street field is required.',
            'city.required' => 'City field is required.',
            'state.required' => 'State field is required.',
            'postal_code.required' => 'Postal code field is required.',
            'website.max' => 'Website link field must be a max of 255 characters',
            'facebook.max' => 'Facebook link field must be a max of 255 characters',
            'linkedin.max' => 'Linkedin link field must be a max of 255 characters',
            'facebook.required' => 'Facebook link field is required.',
            'website.url' => 'Website link must be a url',
            'facebook.url' => 'Facebook link must be a url',
            'linkedin.url' => 'Linkedin link must be a url',
        ];
    } 
}

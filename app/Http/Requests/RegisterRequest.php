<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class RegisterRequest extends FormRequest
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

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'email' => ['required', 'email', 'unique:users'],
            'password' => ['required', 'min:6', 'max:255', 'confirmed'],
            'name' => ['required', 'unique:users'],
        ];
    }

    /**
     * Error messages
     * 
     * @return array
     */
    public function messages()
    {
        return [
            'email.required' => __('Email') . ' ' . __('is required'),
            'email.email' => __('Email') . ' ' . __('is invalid'),
            'email.unique' => __('Email') . ' ' . __('must be unique'),
            'password.required' => __('Password') . ' ' . __('is required'),
            'password.min' => __('Password') . ' ' . __('min length is') . ' 6',
            'password.max' => __('Password') . ' ' . __('max length is') . ' 255',
            'password.confirmed' => __('Password') . ' ' . __('confirmation failed'),
            'name.required' => __('Name') . ' ' . __('is required'),
            'name.unique' => __('Name') . ' ' . __('must be unique'),
        ];
    }
}

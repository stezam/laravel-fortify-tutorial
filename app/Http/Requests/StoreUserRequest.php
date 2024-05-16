<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
        $user = $this->route('admin.user') ? $this->route('admin.user')->id : null;
        // dd($user);
        return [
            'name' => 'required|max:255',
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                 Rule::unique('users')->ignore($user),
            ],
                'password' => 'required|min:8|max:255'
            
        ];
    }

    public function attributes():array
    {
        return [
            'email' => 'Email Address'
        ];
    }

    public function messages(): array
    {
        return 
        [
            'name.required' => 'This is a custom message in the Requests folder -> StoreUserRequests'
        ];
    }
}

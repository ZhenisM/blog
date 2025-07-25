<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class AdminUserFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth("admin")->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $userId = $this->route('admin_user');

        return [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:admin_users,email,' . $userId,
            'password' => 'nullable|min:6|confirmed',
            'roles' => 'array',
        ];
    }
}

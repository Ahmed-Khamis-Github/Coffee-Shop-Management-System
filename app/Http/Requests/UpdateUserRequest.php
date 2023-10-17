<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Route;
use Illuminate\Validation\Rule;

class UpdateUserRequest extends FormRequest
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
        $id = Route::current()->parameter('id');
 
    return [
        'name' => 'required|string|max:255|min:2',
        'email' => [
            'required',
            'email',
            Rule::unique('users')->ignore($id),
        ],
        'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048', 
    ];
    }
}

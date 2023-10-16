<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCategoryRequest extends FormRequest
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
		$rules = [
			'name' => 'required|min:1|max:32|unique:categories,name',
			'slug' => 'required|min:1|max:32',
			'description' => 'required',
		];
		if ($this->isMethod('post')) {
			$rules['image'] = 'required';
		}
		if ($this->isMethod('put')) {
			$rules['name'] = 'required|min:1|max:32';
		}
		return $rules;
	}
}

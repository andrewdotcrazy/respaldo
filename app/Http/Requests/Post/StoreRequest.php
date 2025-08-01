<?php

namespace App\Http\Requests\Post;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'title' => 'required|string|max:500',
            'slug' => 'required|string|max:500|unique:posts',
            'content' => 'required|min:7',
            'description' => 'required|min:7',
            'category_id' => 'required|min:7',
            'posted' => 'required',
        ];
    }
}

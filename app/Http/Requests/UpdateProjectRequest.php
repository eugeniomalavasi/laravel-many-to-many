<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateProjectRequest extends FormRequest
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
            'title' => ['required', 'min:3', Rule::unique('projects')->ignore($this->project)],
            'content' => ['min:10'],
            'cover_img' => ['nullable', 'image', 'max:8000'],
            'type_id' => ['nullable'],
            'technologies' => ['nullable', 'exists:technologies,id']
        ];
    }
}

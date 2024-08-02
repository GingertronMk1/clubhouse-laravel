<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePositionRequest extends FormRequest
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
            'name' => ['required', 'string'],
            'description' => ['nullable', 'string'],
            'sport_id' => ['exists:sports,id'],
            'sort_order' => ['nullable', 'integer'],
            'default_number' => ['nullable', 'integer'],
            'preview_position_x' => ['integer', 'between:0,100'],
            'preview_position_y' => ['integer', 'between:0,100'],
        ];
    }
}

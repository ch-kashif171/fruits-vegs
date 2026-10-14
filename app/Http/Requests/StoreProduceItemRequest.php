<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreProduceItemRequest extends FormRequest
{
    public function authorize(): bool
    {
        return $this->user() !== null;
    }

    /**
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'category' => ['required', 'string', Rule::in(['fruit', 'vegetable', 'other'])],
            'image_path' => ['nullable', 'image', 'max:2048'],
            'sort_order' => ['required', 'integer', 'min:0', 'max:9999'],
            'status' => ['nullable', 'integer'],
        ];
    }
}

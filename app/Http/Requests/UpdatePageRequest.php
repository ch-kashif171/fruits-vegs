<?php

namespace App\Http\Requests;

use App\Models\Page;
use Illuminate\Foundation\Http\FormRequest;

class UpdatePageRequest extends FormRequest
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
        $page = $this->route('page');
        $slug = $page instanceof Page ? $page->slug : '';

        $rules = [
            'title' => ['required', 'string', 'max:255'],
            'meta_description' => ['nullable', 'string', 'max:500'],
            'hero_title' => ['required', 'string', 'max:255'],
            'hero_subtitle' => ['nullable', 'string', 'max:2000'],
            'hero_image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:4096'],
        ];

        return match ($slug) {
            'home' => [
                ...$rules,
                'intro_title' => ['required', 'string', 'max:255'],
                'intro_body' => ['required', 'string', 'max:5000'],
                'cta_title' => ['required', 'string', 'max:255'],
                'cta_body' => ['required', 'string', 'max:2000'],
                'cta_button' => ['required', 'string', 'max:100'],
            ],
            'about' => [
                ...$rules,
                'section_title' => ['required', 'string', 'max:255'],
                'lead' => ['required', 'string', 'max:5000'],
                'why_title' => ['required', 'string', 'max:255'],
                'why_choose' => ['required', 'string', 'max:2000'],
                'mission' => ['required', 'string', 'max:2000'],
                'vision' => ['required', 'string', 'max:2000'],
                'values' => ['required', 'string', 'max:2000'],
            ],
            'services' => [
                ...$rules,
                'faq_title' => ['required', 'string', 'max:255'],
            ],
            'contact' => [
                ...$rules,
                'intro_title' => ['required', 'string', 'max:255'],
                'form_title' => ['required', 'string', 'max:255'],
            ],
            default => $rules,
        };
    }
}

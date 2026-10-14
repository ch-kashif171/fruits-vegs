<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSettingRequest extends FormRequest
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
            'site_name' => ['required', 'string', 'max:255'],
            'tagline' => ['required', 'string', 'max:255'],
            'logo' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
            'address' => ['required', 'string', 'max:1000'],
            'sales_label' => ['required', 'string', 'max:255'],
            'sales_phone' => ['required', 'string', 'max:50'],
            'telephone_label' => ['required', 'string', 'max:255'],
            'telephone' => ['required', 'string', 'max:50'],
            'email_info' => ['required', 'email', 'max:255'],
            'email_hr' => ['required', 'email', 'max:255'],
            'hours_weekdays' => ['required', 'string', 'max:255'],
            'hours_saturday' => ['required', 'string', 'max:255'],
            'hours_sunday' => ['required', 'string', 'max:255'],
            'map_embed_url' => ['required', 'url', 'max:1000'],
            'cta_label' => ['required', 'string', 'max:255'],
            'copyright' => ['required', 'string', 'max:255'],
        ];
    }
}

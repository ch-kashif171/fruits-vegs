<?php

namespace App\Http\Requests;

use App\Rules\MathCaptcha;
use App\Services\CaptchaService;
use Illuminate\Foundation\Http\FormRequest;

class StoreEnquiryRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    /**
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['nullable', 'string', 'max:50'],
            'email' => ['required', 'email', 'max:255'],
            'subject' => ['nullable', 'string', 'max:100'],
            'message' => ['required', 'string', 'max:5000'],
            'captcha' => ['required', new MathCaptcha],
            'contact_company_website' => ['prohibited'],
        ];
    }

    /**
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'contact_company_website.prohibited' => 'Spam detected. Submission blocked.',
            'captcha.required' => 'Please solve the security math question.',
        ];
    }

    protected function passedValidation(): void
    {
        CaptchaService::reset();
    }
}

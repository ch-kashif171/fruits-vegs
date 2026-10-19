<?php

namespace App\Services;

class CaptchaService
{
    /**
     * Generate a new math captcha challenge and store the answer in session.
     *
     * @return array{question: string}
     */
    public static function generate(): array
    {
        $firstNumber = random_int(1, 9);
        $secondNumber = random_int(1, 9);
        $answer = $firstNumber + $secondNumber;
        $question = "{$firstNumber} + {$secondNumber} = ?";

        session()->put('captcha.answer', (string) $answer);
        session()->put('captcha.question', $question);

        return [
            'question' => $question,
        ];
    }

    /**
     * Get the current active question or generate a new one if none exists.
     */
    public static function getQuestion(): string
    {
        if (session()->has('captcha.question') && session()->has('captcha.answer')) {
            return (string) session('captcha.question');
        }

        return static::generate()['question'];
    }

    /**
     * Verify the user's submitted answer.
     */
    public static function check(?string $value): bool
    {
        $expectedAnswer = session('captcha.answer');

        if ($expectedAnswer === null || $value === null) {
            static::generate();

            return false;
        }

        $isValid = trim((string) $value) === (string) $expectedAnswer;

        if (! $isValid) {
            static::generate();
        }

        return $isValid;
    }

    /**
     * Clear the captcha from the session once verified and processed.
     */
    public static function reset(): void
    {
        session()->forget(['captcha.answer', 'captcha.question']);
    }

    /**
     * Helper for tests to set a predictable captcha answer.
     */
    public static function fake(string $answer = '10', string $question = '5 + 5 = ?'): void
    {
        session()->put('captcha.answer', $answer);
        session()->put('captcha.question', $question);
    }
}

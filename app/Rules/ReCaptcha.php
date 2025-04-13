<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Support\Facades\Http;


class ReCaptcha implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string, ?string=): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $response = Http::timeout(10)->asForm()->post("https://www.google.com/recaptcha/api/siteverify", [
            'secret' => env('RECAPTCHA_SECRET'),
            'response' => $value,
        ])->json();
        if (!isset($response['success']) || !$response['success']) {
            $fail("The Google reCAPTCHA verification failed.");
        }
    }
}

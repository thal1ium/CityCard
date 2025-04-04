<?php

namespace App\Services;

class PhoneFormatter
{
    public static function normalize(string $number): ?string
    {
        if (preg_match('/[a-zA-Zа-яА-Я]/', $number)) {
            return null;
        }

        $digits = preg_replace('/\D/', '', $number);
        $digitsCount = strlen($digits);

        if ($digitsCount < 12 || $digitsCount > 16) {
            return null;
        }

        return '+' . $digits;
    }
}

<?php
namespace App\Rules\CustomRules;

use Illuminate\Contracts\Validation\Rule;

class CustomRule implements Rule
{
    public function passes($attribute, $value)
    {
        // Zdefiniuj warunek walidacji według potrzeb
        return $value === 'przykladowa_wartosc';
    }

    public function message()
    {
        return 'Wartość :attribute musi być równa "przykladowa_wartosc".';
    }
}

<?php

namespace App\FieldValidators;

class NumberField
{
    public static function rules()
    {
        return [
            'nullable',
            'numeric'
        ];
    }

    public static function message()
    {
        return 'The field must be a number.';
    }
}

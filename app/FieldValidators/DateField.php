<?php

namespace App\FieldValidators;

class DateField
{
    public static function rules()
    {
        return [
            'nullable',
            'date'
        ];
    }

    public static function message()
    {
        return 'The field must be a date.';
    }
}

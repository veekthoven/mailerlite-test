<?php

namespace App\FieldValidators;

class StringField
{
    public static function rules()
    {
        return [
            'nullable',
            'string'
        ];
    }

    public static function message()
    {
        return 'The field must be a string.';
    }
}

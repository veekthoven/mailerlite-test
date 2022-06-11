<?php

namespace App\FieldValidators;

class BooleanField
{
    public static function rules()
    {
        return [
            'nullable',
            'boolean'
        ];
    }

    public static function message()
    {
        return 'This field must be true or false.';
    }
}

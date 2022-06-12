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
}

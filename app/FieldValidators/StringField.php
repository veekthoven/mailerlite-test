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
}

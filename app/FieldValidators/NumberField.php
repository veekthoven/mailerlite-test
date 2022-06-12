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
}

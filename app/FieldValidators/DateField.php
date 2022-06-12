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
}

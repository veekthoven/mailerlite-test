<?php

namespace App\Traits;

use App\Enums\Type;

trait ValidatesSubscriber
{
    protected function prepareForValidation(): void
    {
        foreach ($this->fields as $field) {
            $this->merge([
                $field['key'] => $field['value'] ?? ""
            ]);
        }
    }

    protected function prepareRules(): array
    {
        $rules = [];

        foreach ($this->fields as $field) {
            $fieldValidator = sprintf("App\FieldValidators\%sField", ucfirst($field['type']));

            $rules[$field['key']] = class_exists($fieldValidator) ? $fieldValidator::rules() : [];
        }

        return array_merge(
            [
                'email' => [
                    'required',
                    'unique:subscribers,email',
                    'email:rfc,dns'
                ],
                'name' => [
                    'required',
                    'string'
                ]
            ],
            $rules
        );
    }
}

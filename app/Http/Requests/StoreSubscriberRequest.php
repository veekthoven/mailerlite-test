<?php

namespace App\Http\Requests;

use Illuminate\Support\Facades\Log;
use Illuminate\Foundation\Http\FormRequest;

class StoreSubscriberRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        $rules = [];

        foreach ($this->fields as $field) {
            $fieldValidator = sprintf("App\FieldValidators\%sField", ucfirst($field['type']));

            $rules[] = [
                $field['key'] => $fieldValidator::rules()
            ];
        }

        return array_merge(
            [
                'email' => [
                    'required',
                    'email'
                ],
                'name' => [
                    'required',
                    'string'
                ]
            ],
            $rules[0]
        );
    }

    // public function messages()
    // {
    //     return $this->messages[0];
    // }
}

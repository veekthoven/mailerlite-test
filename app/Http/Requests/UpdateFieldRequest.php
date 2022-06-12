<?php

namespace App\Http\Requests;

use App\Enums\Type;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Enum;
use Illuminate\Foundation\Http\FormRequest;

class UpdateFieldRequest extends FormRequest
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
        return [
            "title" => [
                'required',
                'string',
                Rule::unique('fields')->ignore($this->route('field'))
            ],
            "type" => [
                'required',
                'string',
                new Enum(Type::class)
            ]
        ];
    }
}

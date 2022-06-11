<?php

namespace App\Providers;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Validator::extend('field', function ($attribute, $value, $parameters, $validator) {
            $rules = [];
            $values = [];
            $messages = [];
        
            foreach ($value as $field) {
                $fieldValidator = sprintf("App\FieldValidators\%sField", ucfirst($field['type']));

                $rules[] = [
                    $field['key'] => $fieldValidator::rules()
                ];

                $values[] = [
                    $field['key'] => $field['value']
                ];

                $messages[] = [
                    $field['key'] => $fieldValidator::message()
                ];
            }

            $validator = Validator::make($values[0], $rules[0], $messages[0], ['company']);

            return !$validator->fails();
        });
    }
}

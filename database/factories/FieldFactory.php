<?php

namespace Database\Factories;

use App\Enums\Type;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Field>
 */
class FieldFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $title = $this->faker->unique()->word();

        return [
            'title' => $title,
            'type' => collect(array_column(Type::cases(), 'value'))->random(),
            'key' => Str::slug($title, '_')
        ];
    }
}

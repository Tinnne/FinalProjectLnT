<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Item>
 */
class ItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $name = fake()->name();
        $slug=Str::slug($name);
        return [
            "name"=> $name,
            'slug'=> $slug,
            'category'=> fake()->company(),
            'price'=> fake()->numberBetween(1000, 10000000),
            'amount'=> fake()->numberBetween(1,1000),

        ];
    }
}

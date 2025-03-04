<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            // Generando un ISBN de 13 dígitos
            'ISBN' => fake()->isbn13(), // Esto genera un ISBN de 13
            'title' => fake()->sentence(),
            'author' => fake()->name(),
            'cover' => 'https://picsum.photos/200/300',
            'stock' => fake()->numberBetween(1, 125),
            'price' => fake()->randomFloat(2, 5, 50) // Para precios con decimales
        ];
    }
}

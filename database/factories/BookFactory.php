<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

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
            'ISBN' => $this->faker->isbn13(),
            'title' => $this->faker->words(3, true),
            'author' => $this->faker->name(),
            'genre' => $this->faker->randomElement(['Fiction', 'Non-fiction', 'Mystery', 'Science Fiction', 'Fantasy', 'Romance', 'History', 'Biography', 'Horror', 'Children']),
            'cover' => 'https://picsum.photos/200/300',
            'stock' => $this->faker->numberBetween(1, 125),
            'price' => $this->faker->randomFloat(2, 5, 100),
        ];
    }
}

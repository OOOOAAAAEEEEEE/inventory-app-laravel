<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\InputProduct>
 */
class InputProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'barang' => fake()->name(),
            'kategori' => fake()->name(),
            'stok' => fake()->numberBetween(1, 500),
            'tanggal_masuk' => fake()->dateTime(),
        ];
    }
}

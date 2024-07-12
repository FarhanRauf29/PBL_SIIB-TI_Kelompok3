<?php

namespace Database\Factories;

use App\Models\Barang;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Barang>
 */
class BarangFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Barang::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nama' => $this->faker->word,
            'kategori' => $this->faker->optional()->word,
            'barcode' => $this->faker->unique()->numerify('##########'), // Example barcode: 1234567890
            'stok' => $this->faker->numberBetween(0, 100),
            'status' => $this->faker->randomElement(['available', 'unavailable']),
        ];
    }
}

<?php

namespace Database\Factories;

use App\Models\Staff;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Staff>
 */
class StaffFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Staff::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nama' => $this->faker->name,
            'nip' => $this->faker->unique()->numerify('##########'), // Example: 1234567890
            'email' => $this->faker->unique()->safeEmail,
            'no_telp' => $this->faker->phoneNumber,
            'bagian' => $this->faker->jobTitle,
        ];
    }
}

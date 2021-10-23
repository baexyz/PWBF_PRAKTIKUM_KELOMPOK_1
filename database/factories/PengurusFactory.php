<?php

namespace Database\Factories;

use App\Models\Pengurus;
use Illuminate\Database\Eloquent\Factories\Factory;

class PengurusFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Pengurus::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $gend = mt_rand(1,2);
        if ($gend == 1) {
            $gender = 'male';
            $gen = 'M';
        } else {
            $gender = 'female';
            $gen = 'F';
        }

        return [
            'nama' => substr($this->faker->name($gender), 0, 50),
            'email' => $this->faker->unique()->freeEmail(),
            'hp' => $this->faker->unique()->e164PhoneNumber(),
            'gender' => $gen,
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'aktif' => '1',
        ];
    }
}

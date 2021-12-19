<?php

namespace Database\Factories;

use App\Models\Santri;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class SantriFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Santri::class;

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
            'namasantri' => substr($this->faker->name($gender), 0, 50),
            'gender' => $gen,
            'tanggallhr' => Carbon::parse($this->faker->dateTimeBetween('-22 years', '-19 years'))->format('Y-m-d'),
            'kotalhr' => $this->faker->city(),
            'namaortu' => substr($this->faker->name(), 0, 50),
            'alamatortu' => substr($this->faker->streetAddress(), 0, 100),
            'hp' => substr($this->faker->unique()->e164PhoneNumber(), 0, 15),
            'email' => $this->faker->unique()->freeEmail(),
            'password' => bcrypt('password'),
            'tanggalmasuk' => $this->faker->date(),
            'aktif' => '1',
        ];
    }
}

<?php

namespace Database\Factories;

use App\Models\Bab;
use App\Models\Buku;
use Illuminate\Database\Eloquent\Factories\Factory;

class BabFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Bab::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'idbuku' => 1,
            'bab' => '1',
            'judul' => $this->faker->sentence(2),
            'keterangan' => $this->faker->paragraph(4),
        ];
    }
}

<?php

namespace Database\Factories;

use App\Models\Bab;
use App\Models\DetailKemajuan;
use App\Models\Kemajuan;
use Illuminate\Database\Eloquent\Factories\Factory;

class DetailKemajuanFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = DetailKemajuan::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'idkemajuan' => Kemajuan::factory()->create(),
            'idbab' => Bab::inRandomOrder()->first(),
            'keterangan' => $this->faker->paragraph(8),
        ];
    }
}

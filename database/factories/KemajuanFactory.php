<?php

namespace Database\Factories;

use App\Models\Kemajuan;
use App\Models\Pengurus;
use App\Models\Santri;
use Illuminate\Database\Eloquent\Factories\Factory;

class KemajuanFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Kemajuan::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'idsantri' => Santri::inRandomOrder()->first(),
            'idpengurus' => Pengurus::inRandomOrder()->first(),
            'tanggal' => now(),
            'status' => 'T',
        ];
    }
}

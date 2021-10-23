<?php

namespace Database\Factories;

use App\Models\DetailPeran;
use App\Models\Pengurus;
use Illuminate\Database\Eloquent\Factories\Factory;

class DetailPeranFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = DetailPeran::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'idperan' => mt_rand(1,2),
            'idpengurus' => Pengurus::factory(),
        ];
    }
}

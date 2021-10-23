<?php

namespace Database\Seeders;

use App\Models\DetailPeran;
use Illuminate\Database\Seeder;
use Pengurus;
use App\Models\Peran;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        Peran::create([
            'peran' => 'Guru',
            'aktif' => '1',
        ]);

        Peran::create([
            'peran' => 'Staff',
            'aktif' => '1',
        ]);

        DetailPeran::factory(20)->create();
    }
}

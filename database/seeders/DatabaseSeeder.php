<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;

use App\Models\Bab;
use App\Models\Buku;
use App\Models\DetailKemajuan;
use App\Models\DetailPeran;
use App\Models\Peran;
use App\Models\Santri;

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
        //Membuat data untuk peran
        Peran::create([
            'peran' => 'Staff',
            'aktif' => '1',
        ]);

        Peran::create([
            'peran' => 'Guru',
            'aktif' => '1',
        ]);

        //Membuat data dari pengurus dan detail peran
        DetailPeran::factory(10)->create();

        //Membuat data santri
        Santri::factory(30)->create();

        //Membuat data buku dan bab
        Buku::factory(5)->create();
        Bab::factory(20)->create();
                
        //Membuat data DetailKemajuan dan Kemajuan
        DetailKemajuan::factory(100)->create();

        // Pengurus::factory(10)->create()->each(function ($m) {
        //     $detailperan = DetailPeran::factory()->make();
        //     $kemajuan = Kemajuan::factory(5)->make();
        // });
        
    }
}

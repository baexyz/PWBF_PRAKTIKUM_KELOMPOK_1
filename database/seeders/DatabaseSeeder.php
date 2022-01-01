<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;

use App\Models\Bab;
use App\Models\Buku;
use App\Models\DetailKemajuan;
use App\Models\DetailPeran;
use App\Models\Peran;
use App\Models\Pengurus;
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
        
        DetailPeran::create([
            'idperan' => 1,
            'idpengurus' => Pengurus::factory()->create([
                'nama' => "Administrator",
                'email' => "admin@gmail.com",
            ])->idpengurus,
        ]);

        //Membuat data untuk guru
        DetailPeran::create([
            'idperan' => 2,
            'idpengurus' => Pengurus::factory()->create([
                'email' => "guru@gmail.com",
            ])->idpengurus,
        ]);
        
        //Membuat data dari pengurus dan detail peran
        DetailPeran::factory(5)->create();
        
        //Membuat data santri
        Santri::factory()->create([
            'email' => 'santri@gmail.com'
        ]);
        
        Santri::factory(20)->create();

        //Membuat data buku dan bab
        $buku = Buku::factory(5)->create();
        foreach ($buku as $item) {
            $iter = 1;     
            $bab_all = Bab::factory(5)->create();
            foreach ($bab_all as $bab) {
                $bab->idbuku = $item->idbuku;
                $bab->bab = $iter++; 
                $bab->save();
            }
        }        
                
        //Membuat data DetailKemajuan dan Kemajuan
        DetailKemajuan::factory(100)->create();
        
    }
}

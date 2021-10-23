<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengurus extends Model
{
    use HasFactory;
    protected $table = 'pengurus';
    protected $primaryKey = 'idpengurus';
    protected $guarded = ['idpengurus'];

    public function kemajuan(){
        $kolom = 'idpengurus';
        return $this->hasMany(Kemajuan::class, $kolom, $kolom);
    }
    
    public function detailperan(){
        $kolom = 'idpengurus';
        return $this->hasOne(DetailPeran::class, $kolom, $kolom);
    }
}

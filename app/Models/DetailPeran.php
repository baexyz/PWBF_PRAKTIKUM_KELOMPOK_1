<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailPeran extends Model
{
    use HasFactory;
    protected $table = 'detailperan';
    protected $primaryKey = 'iddetailperan';
    protected $guarded = ['iddetailperan'];

    public function pengurus(){
        $kolom = 'idpengurus';
        return $this->belongsTo(Pengurus::class, $kolom, $kolom);
    }

    public function peran(){
        $kolom = 'idperan';
        return $this->belongsTo(Peran::class, $kolom, $kolom);
    }
}

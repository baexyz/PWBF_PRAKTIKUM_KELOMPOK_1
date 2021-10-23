<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kemajuan extends Model
{
    use HasFactory;
    protected $table = 'kemajuan';
    protected $primaryKey = 'idkemajuan';
    protected $guarded = ['idkemajuan'];

    public function pengurus(){
        $kolom = 'idpengurus';
        return $this->belongsTo(Pengurus::class, $kolom, $kolom);
    }

    public function santri(){
        $kolom = 'idsantri';
        return $this->belongsTo(Santri::class, $kolom, $kolom);
    }
}

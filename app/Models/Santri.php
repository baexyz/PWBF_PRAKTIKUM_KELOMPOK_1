<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Santri extends Model
{
    use HasFactory;
    protected $table = 'santri';
    protected $primaryKey = 'idsantri';
    protected $guarded = ['idsantri'];

    public function kemajuan(){
        $kolom = 'idsantri';
        return $this->hasMany(Kemajuan::class, $kolom, $kolom);
    }
}

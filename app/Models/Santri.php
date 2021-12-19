<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Santri extends Authenticatable
{
    use HasFactory;
    protected $table = 'santri';
    protected $primaryKey = 'idsantri';
    protected $guarded = ['idsantri'];
    protected $hidden = [
        'password'
    ];

    public function kemajuan(){
        $kolom = 'idsantri';
        return $this->hasMany(Kemajuan::class, $kolom, $kolom);
    }

    public function getHasRoleAttribute()
    {
        return 'Santri';
    }
}

<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Pengurus extends Authenticatable
{
    use HasFactory;
    protected $table = 'pengurus';
    protected $primaryKey = 'idpengurus';
    protected $guarded = ['idpengurus'];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function kemajuan(){
        $kolom = 'idpengurus';
        return $this->hasMany(Kemajuan::class, $kolom, $kolom);
    }
    
    public function detailperan(){
        $kolom = 'idpengurus';
        return $this->hasOne(DetailPeran::class, $kolom, $kolom);
    }
}

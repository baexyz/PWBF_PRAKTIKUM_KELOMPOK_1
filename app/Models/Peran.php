<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peran extends Model
{
    use HasFactory;
    protected $table = 'peran';
    protected $primaryKey = 'idperan';
    protected $guarded = ['idperan'];
}

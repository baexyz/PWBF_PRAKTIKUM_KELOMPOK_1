<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bab extends Model
{
    use HasFactory;
    protected $table = 'bab';
    protected $primaryKey = 'idbab';
    protected $guarded = ['idbab'];

}

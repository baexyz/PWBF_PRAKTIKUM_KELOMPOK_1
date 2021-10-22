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
}

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
}

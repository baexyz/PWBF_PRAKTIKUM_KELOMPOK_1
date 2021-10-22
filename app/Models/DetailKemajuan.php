<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailKemajuan extends Model
{
    use HasFactory;
    protected $table = 'detailkemajuan';
    protected $primaryKey = 'iddetailkemajuan';
    protected $guarded = ['iddetailkemajuan'];
}

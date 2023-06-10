<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Terjual extends Model
{
    use HasFactory;
    protected $fillable = ['id_jual','jenis','harga','stock'];
}

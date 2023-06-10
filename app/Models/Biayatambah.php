<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Biayatambah extends Model
{
    use HasFactory;
    protected $fillable = ['id_jual','deskripsi','harga'];
}

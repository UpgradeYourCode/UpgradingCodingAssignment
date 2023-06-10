<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Namapaket extends Model
{
    use HasFactory;
    protected $fillable = ['nama','deskripsi','harga','modal','untung','status'];
}

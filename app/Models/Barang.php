<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Barang extends Model
{
    protected $fillable = [
        'nobarcode',
        'nama',
        'harga',
        'stok',
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataDiri extends Model
{
    use HasFactory;

    protected $table = 'data_diris';

    protected $fillable = [
        'name', 'no_telp', 'address', 'tanggal'
    ];
}

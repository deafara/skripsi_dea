<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Knowledge extends Model
{
    use HasFactory;

    protected $table = 'knowledges';
    protected $fillable = ['id_penyakit', 'id_gejala', 'MB', 'MD'];

    public function penyakit()
    {
        return $this->belongsTo(Penyakit::class, 'id_penyakit');
    }

    public function gejala()
    {
        return $this->belongsTo(Gejala::class, 'id_gejala');
    }

}

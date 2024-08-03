<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diagnosa extends Model
{
    use HasFactory;
    protected $fillable = ['id_penyakit', 'id_datadiri','presentase'];
    public function penyakit()
    {
        return $this->belongsTo(Penyakit::class, 'id_penyakit');
    }

    public function datadiri()
    {
        return $this->belongsTo(DataDiri::class, 'id_datadiri');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class detail_alternatif extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_alternatif',
        'alternatif',
        'kriteria',
        'sub_kriteria',
        'bobot_sub'
    ];

    public function alternatif()
    {
        return $this->belongsTo('App\Models\alternatif', 'id_alternatif');
    }
}

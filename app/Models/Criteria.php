<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Criteria extends Model
{
    use HasFactory;

    protected $fillable = [
        'kode_kriteria',
        'kriteria',
        'jenis',
        'bobot_criteria'
    ];

    public function sub_kriteria()
    {
        return $this->hasOne('App\Models\subCriteria', 'id_kriteria');
    }

    // public function detail()
    // {
    //     return $this->hasOne('App\Models\detail_alternatif', 'id_kriteria');
    // }
}

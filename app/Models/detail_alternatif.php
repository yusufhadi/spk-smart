<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class detail_alternatif extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_alternatif',
        // 'id_kriteria',
        'id_sub',
    ];

    public function alternatif()
    {
        return $this->belongsTo('App\Models\alternatif', 'id_alternatif');
    }

    // public function kriteria()
    // {
    //     return $this->belongsTo('App\Models\Criteria', 'id_kriteria');
    // }

    public function sub()
    {
        return $this->belongsTo('App\Models\SubCriteria', 'id_sub');
    }
}

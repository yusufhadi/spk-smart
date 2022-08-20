<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCriteria extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_kriteria',
        'sub_kriteria',
        'bobot'
    ];

    public function kriteria()
    {
        return $this->belongsTo('App\Models\Criteria', 'id_kriteria');
    }
}

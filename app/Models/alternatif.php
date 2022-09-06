<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class alternatif extends Model
{
    use HasFactory;

    protected $fillable = [
        'alternatif',
        'reporter',
        'tgl'
    ];

    public function detail_alternatif()
    {
        return $this->hasOne('App\Models\detail_alternatif', 'id_alternatif');
    }
}

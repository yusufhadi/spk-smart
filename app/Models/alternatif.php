<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class alternatif extends Model
{
    use HasFactory;

    protected $fillable = [
        'alternatif',
        'reporter',
        'tgl'
    ];
    public function sub()
    {
        return $this->belongsToMany('App\Models\SubCriteria');
    }

    /**
     * The subCriteria that belong to the alternatif
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function subCriteria(): BelongsToMany
    {
        return $this->belongsToMany('App\Models\SubCriteria', 'detail_alternatifs', 'id_alternatif', 'id_sub');
    }
}

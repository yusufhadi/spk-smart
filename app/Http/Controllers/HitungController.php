<?php

namespace App\Http\Controllers;

use App\Models\Criteria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HitungController extends Controller
{
    public function hitung()
    {
        //table data kriteria
        $criteria = Criteria::all();
        $total_bobot = DB::table('criterias')->sum('bobot_criteria');

        //table normalisasi data kriteria
        $n = Criteria::select('bobot_criteria')->get();
        $normalisasi = array();
        for ($i = 1; $i <= sizeof($n); $i++) {
            $i = $total_bobot * $n;
            $normalisasi = $i;
        }
        dd($normalisasi[]);

        return view('dashboard.Hitung.index', compact('criteria', 'total_bobot'));
    }
}

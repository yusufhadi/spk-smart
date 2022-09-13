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
        $criteria = DB::table('criterias')->get();
        $total_bobot = DB::table('criterias')->sum('bobot_criteria');

        // table normalisasi data kriteria
        $n = DB::table('criterias')->select('bobot_criteria')->get();
        $normalisasi = array();
        for ($i = 0; $i < sizeof($n); $i++) {
            $m = $n[$i]->bobot_criteria / $total_bobot;
            array_push($normalisasi, $m);
        }

        $total_normalisasi = array_sum($normalisasi);

        return view('dashboard.Hitung.index', compact('criteria', 'total_bobot', 'normalisasi', 'total_normalisasi'));
    }
}

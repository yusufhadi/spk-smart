<?php

namespace App\Http\Controllers;

use App\Models\alternatif;
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

        //Memberi Nilai Alternatif pada Masing-Masing Kriteria
        // $bobot_alternatif1 = DB::table('detail_alternatifs')
        //     ->join('alternatifs', 'alternatifs.id', '=', 'detail_alternatifs.id_alternatif')
        //     ->join('sub_criterias', 'sub_criterias.id', '=', 'detail_alternatifs.id_sub')
        //     ->select('id_alternatif', 'id_sub', 'alternatif', 'sub_kriteria')
        //     ->get();



        // $bobot_alternatif2 = DB::table('detail_alternatifs')
        //     ->join('alternatifs', 'alternatifs.id', '=', 'detail_alternatifs.id_alternatif')
        //     ->join('sub_criterias', 'sub_criterias.id', '=', 'detail_alternatifs.id_sub')
        //     ->select('id_alternatif', 'id_sub', 'alternatif', 'sub_kriteria')
        //     ->get();


        $bobot_alternatif1 = alternatif::with(['subCriteria'])->get();

        return view('dashboard.Hitung.index', compact('criteria', 'total_bobot', 'normalisasi', 'total_normalisasi', 'bobot_alternatif1'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\alternatif;
use App\Models\Criteria;
use App\Models\detail_alternatif;
use App\Models\SubCriteria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PenilaianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $alternatif = alternatif::all();
        $criteria = Criteria::all();
        $subCriteria = SubCriteria::all();

        $detail = DB::table('criterias')
            ->join('sub_criterias', 'sub_criterias.id_kriteria', '=', 'criterias.id')
            ->get();

        // dd($detail);
        return view('dashboard.Penilaian.index', compact('alternatif', 'detail', 'criteria', 'subCriteria'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        $this->validate($request, [
            'id_alternatif' => 'required',
            'id_sub' => 'required',
        ]);

        $id_subs = $request->id_sub;
        foreach ($id_subs as $id_sub) {
            detail_alternatif::create([
                'id_alternatif' => $request->id_alternatif,
                'id_sub' => $id_sub
            ]);
        }

        return redirect('/penilaian')->with('toast_success', 'Penilaian Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

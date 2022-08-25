<?php

namespace App\Http\Controllers;

use App\Models\Criteria;
use App\Models\SubCriteria;
use Illuminate\Http\Request;

class SubCriteriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $criteria = Criteria::all();
        $subCriteria = SubCriteria::all();

        // dd($subCriteria);
        return view('dashboard.SubCriteria.index', compact('criteria', 'subCriteria'));
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
        $this->validate($request, [
            'id_kriteria' => 'required',
            'sub_kriteria' => 'required',
            'bobot' => 'required'
        ]);

        $subCriteria = SubCriteria::create([
            'id_kriteria' => $request->id_kriteria,
            'sub_kriteria' => $request->sub_kriteria,
            'bobot' => $request->bobot
        ]);

        // dd($subCriteria);

        return redirect('sub-criteria');
        // return view('dashboard.SubCriteria.index', compact('subCriteria'));
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
        $request->validate([
            'id_kriteria' => 'required',
            'sub_kriteria' => 'required',
            'bobot' => 'required'
        ]);

        $subCriteria = SubCriteria::findOrFail($id);

        $subCriteria->update([
            'id_kriteria' => $request->id_kriteria,
            'sub_kriteria' => $request->sub_kriteria,
            'bobot' => $request->bobot
        ]);

        return redirect('sub-criteria');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $subCriteria = SubCriteria::findOrFail($id);

        $data = $subCriteria->delete();

        return redirect('sub-criteria');
    }
}

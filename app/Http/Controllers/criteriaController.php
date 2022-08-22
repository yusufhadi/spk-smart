<?php

namespace App\Http\Controllers;

use App\Models\Criteria;
use Illuminate\Http\Request;

class criteriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $criteria = Criteria::all();
        return view('dashboard.Criteria.index', compact('criteria'));
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
            'kode_kriteria' => 'required',
            'kriteria' => 'required',
            'jenis' => 'required',
            'bobot' => 'required'
        ]);

        $criteria = Criteria::create([
            'kode_kriteria' => $request->kode_kriteria,
            'kriteria' => $request->kriteria,
            'jenis' => $request->jenis,
            'bobot' => $request->bobot,
        ]);

        return redirect('criteria');
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
            'kode_kriteria' => 'required',
            'kriteria' => 'required',
            'jenis' => 'required',
            'bobot' => 'required'
        ]);

        $criteria = Criteria::findOrFail($id);

        $criteria->update([
            'kode_kriteria' => $request->kode_kriteria,
            'kriteria' => $request->kriteria,
            'jenis' => $request->jenis,
            'bobot' => $request->bobot,
        ]);

        return redirect('criteria');
        // return view('dashboard.Criteria.index', compact('criteria'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $criteria = Criteria::findOrFail($id);

        $data = $criteria->delete();

        return redirect('criteria');
    }
}

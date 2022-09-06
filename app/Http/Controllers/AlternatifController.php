<?php

namespace App\Http\Controllers;

use App\Models\alternatif;
use Illuminate\Http\Request;

class AlternatifController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $alternatif = alternatif::all();
        return view('dashboard.Alternatif.index', compact('alternatif'));
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
            'alternatif' => 'required',
            'reporter' => 'required',
            'tgl' => 'required'
        ]);

        $alternatif = alternatif::create([
            'alternatif' => $request->alternatif,
            'reporter' => $request->reporter,
            'tgl' => $request->tgl
        ]);

        return redirect('alternatif');
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
            'alternatif' => 'required',
            'reporter' => 'required',
            'tgl' => 'required'
        ]);

        $alternatif = alternatif::findOrFail($id);

        $alternatif->update([
            'alternatif' => $request->alternatif,
            'reporter' => $request->reporter,
            'tgl' => $request->tgl
        ]);

        return redirect('alternatif');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $alternatif = alternatif::findOrFail($id);

        $data = $alternatif->delete();

        return redirect('alternatif');
    }
}

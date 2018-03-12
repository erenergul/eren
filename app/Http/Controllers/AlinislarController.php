<?php

namespace App\Http\Controllers;

use App\Alinis;
use App\Tur;
use Illuminate\Http\Request;

class AlinislarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

     $alinislar = Alinis::all();

     $turlar = Tur::pluck('name','id')->all();

     return view('admin.alinis.index', compact('alinislar','turlar'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Alinis::create($request->all());

        return redirect('admin/alinis');
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
        $alinis = Alinis::findOrFail($id);

        $turlar = Tur::pluck('name','id')->all();

        return view('admin.alinis.edit' , compact('alinis','turlar'));


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
        $alinis = Alinis::findOrFail($id);


        $alinis->update($request->all());

        return redirect('admin/alinis');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $alinis = Alinis::find($id);

        $alinis->delete();

        return redirect('admin/alinis');
    }
}

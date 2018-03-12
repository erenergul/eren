<?php

namespace App\Http\Controllers;

use App\Cari_Hesaplar;
use Illuminate\Http\Request;

class cariHesapController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cari_hesap = Cari_Hesaplar::all();


        return view('admin.carihesap.index', compact('cari_hesap'));
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
        Cari_Hesaplar::create($request->all());

        return redirect('admin/carihesap');
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
        $cari_hesap = Cari_Hesaplar::find($id);

        return view('admin.carihesap.edit', compact('cari_hesap'));
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

        $cari_hesap = Cari_Hesaplar::findOrFail($id);

        $cari_hesap->update($request->all());

        return redirect('admin/carihesap/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cari_hesap = Cari_Hesaplar::find($id);

        $cari_hesap->delete();

        return redirect('admin/carihesap')->with('status' , 'Cari Hesap Silindi.');
    }
}

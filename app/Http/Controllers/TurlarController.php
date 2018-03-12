<?php

namespace App\Http\Controllers;



use App\Tur;
use Illuminate\Http\Request;

class TurlarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $turlar = Tur::all();

        return view('admin.tur.index', compact('turlar'));
    }

    public function ajax() {

        return view('admin.turlar.index');

    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Tur::create($request->all());


        return redirect('admin/tur')->with('status_eklendi' , 'Tur Başarıyla Oluşturuldu');
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
        $turlar = Tur::findOrFail($id);

        return view('admin.tur.edit', compact('turlar'));
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
        $turlar = Tur::findOrFail($id);

        $turlar->update($request->all());

        return redirect('admin/tur');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        $turlar = Tur::find($id);

        $turlar->delete();

        return redirect('admin/tur')->with('status' , 'Tur Silindi.');
    }
}

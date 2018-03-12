<?php

namespace App\Http\Controllers;

use App\Rehber;
use Illuminate\Http\Request;


class RehberlerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rehberler = Rehber::all();

        return view('admin.rehber.index', compact('rehberler'));
    }

    public function ajax() {

        return view('admin.rehberler.index');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Rehber::create($request->all());


        return redirect('admin/rehber')->with('status_eklendi' , 'Rehber Başarıyla Oluşturuldu');
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
        $rehber = Rehber::findOrFail($id);

        return view('admin.rehber.edit', compact('rehber'));
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
        $rehber = Rehber::findOrFail($id);

        $rehber->update($request->all());

        return redirect('admin/rehber');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $rehber = Rehber::find($id);

        $rehber->delete();

        return redirect('admin/rehber')->with('status' , 'Rehber Silindi.');


    }
}

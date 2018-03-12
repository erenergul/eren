<?php

namespace App\Http\Controllers;

use App\Otel;
use Illuminate\Http\Request;

class OtellerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $oteller = Otel::all();

        return view('admin.otel.index', compact('oteller'));
    }

    public function ajax() {

        return view('admin.oteller.index');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Otel::create($request->all());


        return redirect('admin/otel')->with('status_eklendi' , 'Otel Başarıyla Oluşturuldu');
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
        $oteller = Otel::findOrFail($id);

        return view('admin.otel.edit', compact('oteller'));
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
        $oteller = Otel::findOrFail($id);

        $oteller->update($request->all());

        return redirect('admin/otel');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $oteller = Otel::find($id);

        $oteller->delete();

        return redirect('admin/otel')->with('status' , 'Otel Silindi.');
    }


    public function find(Request $request)
    {
        $term = trim($request->q);

        if (empty($term)) {
            return \Response::json([]);
        }

        $tags = Otel::search($term)->limit(5)->get();

        $formatted_tags = [];

        foreach ($tags as $tag) {
            $formatted_tags[] = ['id' => $tag->id, 'text' => $tag->name];
        }

        return \Response::json($formatted_tags);
    }


}

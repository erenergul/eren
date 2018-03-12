<?php

namespace App\Http\Controllers;

use App\Alinis;
use App\Otel;
use App\Rehber;
use App\Rezervasyon;
use App\Tur;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\DB;

class APIController extends Controller
{
    public function getRehber()
    {

        $rehber = Rehber::all();

        return Datatables::of($rehber)
            ->addColumn('action', function ($rehber) {
                return
                    '<a href="rehber/' . $rehber->rehber_id . '/edit" class="btn btn-primary" style="margin-right: 10px;">Düzenle</a>' .
                    '<a href="rehber/destroy/' . $rehber->rehber_id . '" class="btn btn-danger" >Sil</a>';
            })
            ->make(true);

    }

    public function getOtel()
    {

        $oteller = Otel::all();

        return Datatables::of($oteller)
            ->addColumn('action', function ($oteller) {
                return
                    '<a href="otel/' . $oteller->id . '/edit" class="btn btn-primary" style="margin-right: 10px;">Düzenle</a>' .
                    '<a href="otel/destroy/' . $oteller->id . '" class="btn btn-danger" >Sil</a>';
            })
            ->make(true);

    }

    public function getTur()
    {

        $turlar = Tur::all();

        return Datatables::of($turlar)
            ->addColumn('action', function ($turlar) {
                return
                    '<a href="tur/' . $turlar->id . '/edit" class="btn btn-primary" style="margin-right: 10px;">Düzenle</a>' .
                    '<a href="tur/destroy/' . $turlar->id . '" class="btn btn-danger" >Sil</a>';
            })
            ->make(true);

    }

    public function getAlinis()
    {

        $alinislar = Alinis::all();

        $turlar = Tur::with('turlar')->select('turlar.*');

        return Datatables::of($alinislar, $turlar)
            ->addColumn('action', function ($alinislar) {
                return
                    '<a href="tur/' . $alinislar->id . '/edit" class="btn btn-primary" style="margin-right: 10px;">Düzenle</a>' .
                    '<a href="tur/destroy/' . $alinislar->id . '" class="btn btn-danger" >Sil</a>';
            })
            ->make(true);
    }

    public function getRezervasyon()
    {

        $rezervasyonlar = Rezervasyon::with('tur.turlar')->select('rezervasyonlar.*');

        return Datatables::of($rezervasyonlar)
            ->addColumn('action', function ($rezervasyonlar) {
                return
                    '<a href="rezervasyon/' . $rezervasyonlar->rezervasyonlar_id . '/edit" class="btn btn-primary" style="margin-right: 10px;">Düzenle</a>' .
                    '<a href="rezervasyon/destroy/' . $rezervasyonlar->rezervasyonlar_id . '" class="btn btn-danger" >Sil</a>';
            })
            ->make(true);
    }




    public function getTurList(Request $request)
    {
        $alinis = DB::table("alinislar")
            ->where("tur_id", $request->tur_id)
            ->pluck("name", "id");
        return response()->json($alinis);
    }
}


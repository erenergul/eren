<?php

namespace App\Http\Controllers;

use App\Alinis;
use App\Otel;
use App\Rehber;
use App\Rezervasyon;
use App\Tur;
use Illuminate\Http\Request;
use App\Http\Requests;


class RezervasyonlarController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        //Bugün olanm rezervasyonlara göre filitreler.
        //$pages = Rezervasyonlar::where('rezervasyon_tarihi',date("Y-m-d",strtotime("now")))->paginate(10);

        $pages = Rezervasyon::orderBy('rezervasyon_tarihi', 'ASC')->paginate(10);
        $tur = Tur::all();
        $rehber = Rehber::all();

        return view('admin.rezervasyon.index', compact('tur','rehber'))->withPosts($pages);
    }

    public function indexYarin() {
        $pages = Rezervasyon::where('rezervasyon_tarihi',date("Y-m-d",strtotime("tomorrow")))->paginate(20);
        $tur = Tur::all();
        $rehber = Rehber::all();

        return view('admin.rezervasyon.index', compact('tur','rehber'))->withPosts($pages);
    }

    public function indexTarih(Requests\TarihFiltrele $request) {
        $pages = Rezervasyon::orderBy('rezervasyon_tarihi', 'ASC')
            ->whereBetween('rezervasyon_tarihi',  array($request->input('tarih1'), $request->input('tarih2')))
            ->paginate(5);

        $rezervasyon = Rezervasyon::all();
        $request->flash();

        return view('admin.rezervasyon.index', compact('rezervasyon','request'))->withPosts($pages);
    }

    public function indexFilitreliAd(Requests\AdFiltrele $request) {
        $pages = Rezervasyon::orderBy('rezervasyon_tarihi', 'ASC')
            ->where('rezervasyon_adi', "like" ,  "%".$request->input('adi')."%")
            ->paginate(1);

        $rezervasyon = Rezervasyon::all();
        $tur = Tur::all();
        $rehber = Rehber::all();
        $request->flash();

        return view('admin.rezervasyon.index', compact('rezervasyon','tur','rehber','request'))->withPosts($pages);
    }

    public function detay($id) {
        $rezervasyon = Rezervasyon::find($id);

        return view('admin.rezervasyon.detay',compact('rezervasyon'));
    }

    public function sil($id) {
        $rezervasyon = Rezervasyon::find($id);
        $rezervasyon->delete();

        return redirect('/admin/rezervasyonlar/')->with('status','Rezervasyon Silindi');
    }

    public function ekleForm() {

        $alinis = Alinis::all();

        $otel = Otel::pluck('name' ,'id')->prepend('select');

        $tur = Tur::pluck('name','id')->all();

        $rehberler = Rehber::pluck('rehber_adi', 'rehber_id')->all();


        return view('admin.rezervasyon.create', compact('tur' , 'alinis', 'otel' , 'rehberler'));
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'tarih' => 'required',
            'tur_id' => 'required',
            'rezervasyon_yetiskin_pax' => 'required',
            'rezervasyon_cocuk_pax' => 'required',
            'rezervasyon_bebek_pax' => 'required',
            'rezervasyon_ucret_pax' => 'required',
            'rezervasyon_no' => 'required',
            'otel_id' => 'required',
            'alinis_id' => 'required',
            'rehber_id' => 'required',
            'rezervasyon_toplam_satis' => 'required',
            'rezervasyon_toplam_satis_doviz' => 'required',
            'rezervasyon_kapora' => 'required',
            'rezervasyon_kapora_doviz' => 'required',
            'rezervasyon_rest' => 'required',
            'rezervasyon_rest_doviz' => 'required'
        ],[
            'tarih.required' => 'Lütfen Tarih Seçiniz.',
            'tur_id.required' => 'Lütfen Listeden Tur Seçiniz.',
            'rezervasyon_yetiskin_pax' => 'Lütfen Yetişkin Sayısını Belirtiniz.',
            'rezervasyon_cocuk_pax' => 'Lütfen Yetişkin Sayısını Belirtiniz.',
            'rezervasyon_bebek_pax' => 'Lütfen Yetişkin Sayısını Belirtiniz.',
            'rezervasyon_ucret_pax' => 'Lütfen Yetişkin Sayısını Belirtiniz.',
            'rezervasyon_no' => 'Lütfen Bilet/Rezervasyon Numarasını Giriniz',
            'otel' => 'Lütfen Oteli Seçiniz.',
            'alinis_id' => 'Lütfen Alınış Saatini Belirtiniz.',
            'rehber_id' => 'Lütfen Rehberi Belirtiniz.',
            'rezervasyon_toplam_satis' => 'Lütfen Toplam Satış Miktarını Giriniz.',
            'rezervasyon_toplam_satis_doviz' => 'Lütfen Döviz Türünü Seçiniz.',
            'rezervasyon_kapora' => 'Lütfen Kapora Miktarını Belirtiniz.',
            'rezervasyon_kapora_doviz' => 'Lütfen Döviz Türünü Seçiniz.',
            'rezervasyon_rest' => 'Lütfen Rest Miktarını Belirtiniz.',
            'rezervasyon_rest_doviz' => 'Lütfen Döviz Türünü Seçiniz.',
        ]);


        $newrezervasyon = new Rezervasyon();

        $newrezervasyon->rezervasyon_tarihi = $request->get('tarih');
        $newrezervasyon->tur_id = $request->get('tur_id');
        $newrezervasyon->rezervasyon_yetiskin_pax = $request->get('rezervasyon_yetiskin_pax');
        $newrezervasyon->rezervasyon_cocuk_pax = $request->get('rezervasyon_cocuk_pax');
        $newrezervasyon->rezervasyon_bebek_pax = $request->get('rezervasyon_bebek_pax');
        $newrezervasyon->rezervasyon_ucret_pax = $request->get('rezervasyon_ucret_pax');
        $newrezervasyon->rezervasyon_adi = $request->get('rezervasyon_adi') ;
        $newrezervasyon->rezervasyon_no = $request->get('rezervasyon_no');
        $newrezervasyon->rezervasyon_oda_no = $request->get('rezervasyon_oda_no') ;
        $newrezervasyon->rezervasyon_tel = $request->get('rezervasyon_tel') ;
        $newrezervasyon->rezervasyon_toplam_satis = $request->get('rezervasyon_toplam_satis');
        $newrezervasyon->rezervasyon_toplam_satis_doviz = $request->get('rezervasyon_toplam_satis_doviz');
        $newrezervasyon->rezervasyon_kapora = $request->get('rezervasyon_kapora');
        $newrezervasyon->rezervasyon_kapora_doviz = $request->get('rezervasyon_kapora_doviz');
        $newrezervasyon->rezervasyon_rest = $request->get('rezervasyon_rest');
        $newrezervasyon->rezervasyon_rest_doviz = $request->get('rezervasyon_rest_doviz');;
        $newrezervasyon->otel_id = $request->get('otel_id');
        $newrezervasyon->alinis_id = $request->get('alinis_id');
        $newrezervasyon->rehber_id = $request->get('rehber_id');

        $newrezervasyon->save();


        return redirect('admin/rezervasyon');
    }

    public function edit($id)
    {
        $rezervasyon = Rezervasyon::find($id);

        $tur = Tur::pluck('name','id')->all();

        $alinis = Alinis::where('tur_id', $rezervasyon->tur_id)->get();

        $otel = Otel::pluck('name' ,'id')->all();

        $rehberler = Rehber::pluck('rehber_adi', 'rehber_id')->all();

        return view('admin.rezervasyon.edit', compact('rezervasyon','tur','otel','rehberler','alinis'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'tarih' => 'required',
            'tur_id' => 'required',
            'rezervasyon_yetiskin_pax' => 'required',
            'rezervasyon_cocuk_pax' => 'required',
            'rezervasyon_bebek_pax' => 'required',
            'rezervasyon_ucret_pax' => 'required',
            'rezervasyon_no' => 'required',
            'otel_id' => 'required',
            'alinis_id' => 'required',
            'rehber_id' => 'required',
            'rezervasyon_toplam_satis' => 'required',
            'rezervasyon_toplam_satis_doviz' => 'required',
            'rezervasyon_kapora' => 'required',
            'rezervasyon_kapora_doviz' => 'required',
            'rezervasyon_rest' => 'required',
            'rezervasyon_rest_doviz' => 'required'
        ],[
            'tarih.required' => 'Lütfen Tarih Seçiniz.',
            'tur_id.required' => 'Lütfen Listeden Tur Seçiniz.',
            'rezervasyon_yetiskin_pax' => 'Lütfen Yetişkin Sayısını Belirtiniz.',
            'rezervasyon_cocuk_pax' => 'Lütfen Yetişkin Sayısını Belirtiniz.',
            'rezervasyon_bebek_pax' => 'Lütfen Yetişkin Sayısını Belirtiniz.',
            'rezervasyon_ucret_pax' => 'Lütfen Yetişkin Sayısını Belirtiniz.',
            'rezervasyon_no' => 'Lütfen Bilet/Rezervasyon Numarasını Giriniz',
            'otel_id' => 'Lütfen Oteli Seçiniz.',
            'alinis_id' => 'Lütfen Alınış Saatini Belirtiniz.',
            'rehber_id' => 'Lütfen Rehberi Belirtiniz.',
            'rezervasyon_toplam_satis' => 'Lütfen Toplam Satış Miktarını Giriniz.',
            'rezervasyon_toplam_satis_doviz' => 'Lütfen Döviz Türünü Seçiniz.',
            'rezervasyon_kapora' => 'Lütfen Kapora Miktarını Belirtiniz.',
            'rezervasyon_kapora_doviz' => 'Lütfen Döviz Türünü Seçiniz.',
            'rezervasyon_rest' => 'Lütfen Rest Miktarını Belirtiniz.',
            'rezervasyon_rest_doviz' => 'Lütfen Döviz Türünü Seçiniz.',
        ]);


        $rezervasyon = Rezervasyon::find($id);

        $rezervasyon->rezervasyon_tarihi = $request->get('tarih');
        $rezervasyon->tur_id = $request->get('tur_id');
        $rezervasyon->rezervasyon_yetiskin_pax = $request->get('rezervasyon_yetiskin_pax');
        $rezervasyon->rezervasyon_cocuk_pax = $request->get('rezervasyon_cocuk_pax');
        $rezervasyon->rezervasyon_bebek_pax = $request->get('rezervasyon_bebek_pax');
        $rezervasyon->rezervasyon_ucret_pax = $request->get('rezervasyon_ucret_pax');
        $rezervasyon->rezervasyon_adi = $request->get('rezervasyon_adi') ;
        $rezervasyon->rezervasyon_no = $request->get('rezervasyon_no');
        $rezervasyon->rezervasyon_oda_no = $request->get('rezervasyon_oda_no') ;
        $rezervasyon->rezervasyon_tel = $request->get('rezervasyon_tel') ;
        $rezervasyon->rezervasyon_toplam_satis = $request->get('rezervasyon_toplam_satis');
        $rezervasyon->rezervasyon_toplam_satis_doviz = $request->get('rezervasyon_toplam_satis_doviz');
        $rezervasyon->rezervasyon_kapora = $request->get('rezervasyon_kapora');
        $rezervasyon->rezervasyon_kapora_doviz = $request->get('rezervasyon_kapora_doviz');
        $rezervasyon->rezervasyon_rest = $request->get('rezervasyon_rest');
        $rezervasyon->rezervasyon_rest_doviz = $request->get('rezervasyon_rest_doviz');;
        $rezervasyon->otel_id = $request->get('otel_id');
        $rezervasyon->alinis_id = $request->get('alinis_id');
        $rezervasyon->rehber_id = $request->get('rehber_id');

        $rezervasyon->save();

        return redirect('admin/rezervasyon/');

    }

    public function destroy($id)
    {
        $rezervasyon = Rezervasyon::find($id);

        $rezervasyon->delete();

        return redirect('admin/rezervasyon')->with('status' , 'Rezervasyon Silindi.');
    }
}

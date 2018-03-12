<?php

namespace App\Http\Controllers;

use App\Cari_Hesaplar;
use App\Http\Requests\odemeEkleRequest;
use DateTime;
use App\Odemeler;
use Maatwebsite\Excel\Facades\Excel;
use Teknomavi\Tcmb\Doviz;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class odemeController extends Controller
{
    public function index() {
        $odeme = array();
        $ch = Cari_Hesaplar::all();

        return view('admin.odeme.index', compact('odeme','ch','chid'));
    }

    public function indexFilitreli(Requests\cariFilitreleRequest $request) {
        $odeme = Odemeler::select(
            DB::raw ('* ,(@onceki :=  odeme_tutar  + @onceki) AS odeme_toplam'))
            ->from(DB::raw ('odemeler ,(SELECT @onceki:=0) a'))
            ->whereBetween('odeme_tarihi',  array($request->input('tarih1'), $request->input('tarih2')))
            ->where('ch_id', $request->input('carihesap'))
            ->get();

        $ch = Cari_Hesaplar::all();
        $chid = $request->input('carihesap');
        $request->flash();

        return view('admin.odeme.index', compact('odeme','ch','chid'));
    }

    public function excelOut(Requests\odemeFilitreleRequest $request) {
        $odeme = Odemeler::whereBetween('odeme_tarihi',  array($request->input('tarih1'), $request->input('tarih2')))
            ->where('ch_id', $request->input('carihesap'))
            ->orderBy('odeme_tarihi', 'ASC')
            ->get();

        $ch = Cari_Hesaplar::where('ch_id',$request->input('carihesap'))->first();

        $data = array(
            array('Cari Hesap : ', $ch->ch_adi, 'Döviz : '. $ch->ch_doviz),
            array('Tarih Aralıkları : ',  $request->input('tarih1').' - '.$request->input('tarih2')),
            array(''),
            array('Ödeme #','Tarihi','Türü','Tutar','Döviz','Açıklama')
        );

        $sayac = 0;

        foreach ($odeme as $item) {
            $sayac++;
            array_push($data,array($sayac,
                $item->odeme_tarihi,
                ($item->odeme_turu) ? "Alındı" : "Yapıldı",
                $item->odeme_tutar,
                $item->odeme_doviz,
                $item->odeme_aciklama
            ));
        }

        Excel::create('odemeler', function($excel) use($data) {
            $excel->sheet('Sheetname', function($sheet) use($data) {
                $sheet->fromArray($data);
            });
        })->download('xls');
    }

    public function sil($id) {
        $odeme = Odemeler::find($id);
        $odeme->delete();

        return redirect('/admin/odemeler/')->with('status','Ödeme Silindi');
    }

    public function ekleForm() {
        $ch = Cari_Hesaplar::all();

        return view('admin.odeme.ekle',compact('ch'));
    }

    public function eklePost(odemeEkleRequest $request) {
        $doviz = new Doviz(); $dovizler = array('USD' => null, 'EUR' => null, 'GBP' => null);

        $dovizler['USD'] = $doviz->kurAlis("USD", Doviz::TYPE_EFEKTIFALIS);
        $dovizler['EUR'] = $doviz->kurAlis("EUR", Doviz::TYPE_EFEKTIFALIS);
        $dovizler['GBP'] = $doviz->kurAlis("GBP", Doviz::TYPE_EFEKTIFALIS);

        $ch = Cari_Hesaplar::find($request->input('carihesap'));

        $odeme = new Odemeler();

        $odeme->odeme_turu = $request->get('odemeturu');
        $odeme->odeme_aciklama = $request->get('aciklama');
        $odeme->odeme_tutar = $request->get('tutar');
        $odeme->odeme_doviz = $request->get('doviz');
        $odeme->odeme_tarihi = new DateTime();
        $odeme->ch_id = $request->get('carihesap');

        if ($request->input('doviz') == $ch->ch_doviz) {
            $odeme->odeme_tutar_cari = $request->input('tutar');
        } else {
            switch ($request->input('doviz')) {
                case "TRY": $odeme->odeme_tutar_cari = $request->input('tutar') / $dovizler[$ch->ch_doviz]; break;
                case "USD": $value = ($request->input('tutar') * $dovizler["USD"]); $odeme->odeme_tutar_cari = ($value / $dovizler[$ch->ch_doviz]); break;
                case "EUR": $value = ($request->input('tutar') * $dovizler["EUR"]); $odeme->odeme_tutar_cari = ($value / $dovizler[$ch->ch_doviz]); break;
                case "GBP": $value = ($request->input('tutar') * $dovizler["GBP"]); $odeme->odeme_tutar_cari = ($value / $dovizler[$ch->ch_doviz]); break;
            }
        }

        $odeme->save();

        return redirect('admin/odeme/ekle')->with('status','Ödeme Yapıldı');
    }

    public function duzenleForm($id) {
        $odeme = Odemeler::find($id);
        $ch = Cari_Hesaplar::all();

        return view('admin.odeme.duzenle', compact('odeme','ch'));
    }

    public function duzenlePost(odemeEkleRequest $request,$id) {
        $doviz = new Doviz(); $dovizler = array('USD' => null, 'EUR' => null, 'GBP' => null);

        $dovizler['USD'] = $doviz->kurAlis("USD", Doviz::TYPE_EFEKTIFALIS);
        $dovizler['EUR'] = $doviz->kurAlis("EUR", Doviz::TYPE_EFEKTIFALIS);
        $dovizler['GBP'] = $doviz->kurAlis("GBP", Doviz::TYPE_EFEKTIFALIS);

        $ch = Cari_Hesaplar::find($request->input('carihesap'));

        $odeme = Odemeler::find($id);

        $odeme->odeme_turu = $request->get('odemeturu');
        $odeme->odeme_aciklama = $request->get('aciklama');
        $odeme->odeme_tutar = $request->get('tutar');
        $odeme->odeme_doviz = $request->get('doviz');
        $odeme->odeme_tarihi = new DateTime();
        $odeme->ch_id = $request->get('carihesap');

        if ($request->input('doviz') == $ch->ch_doviz) {
            $odeme->odeme_tutar_cari = $request->input('tutar');
        } else {
            switch ($request->input('doviz')) {
                case "TRY": $odeme->odeme_tutar_cari = $request->input('tutar') / $dovizler[$ch->ch_doviz]; break;
                case "USD": $value = ($request->input('tutar') * $dovizler["USD"]); $odeme->odeme_tutar_cari = ($value / $dovizler[$ch->ch_doviz]); break;
                case "EUR": $value = ($request->input('tutar') * $dovizler["EUR"]); $odeme->odeme_tutar_cari = ($value / $dovizler[$ch->ch_doviz]); break;
                case "GBP": $value = ($request->input('tutar') * $dovizler["GBP"]); $odeme->odeme_tutar_cari = ($value / $dovizler[$ch->ch_doviz]); break;
            }
        }

        $odeme->save();

        return redirect('admin/odeme/duzenle/'.$id)->with('status','Ödeme Düzenlendi');
    }
}

<?php

namespace App\Http\Controllers;

use App\Cari_Hesaplar;
use App\Cariler;
use App\Http\Requests\cariGonderRequest;
use App\Http\Requests\cariFilitreleRequest;
use App\Odemeler;
use App\Rezervasyon;
use Maatwebsite\Excel\Facades\Excel;
use Teknomavi\Tcmb\Doviz;
use Illuminate\Foundation\Http\FormRequest;

class cariController extends Controller
{
    public function index() {
        $output = array();
        $ch = Cari_Hesaplar::all();
        $chid = 0;

        return view('admin.cari.index', compact('output','ch','chid'));
    }

    public function indexID($id) {
        $ch = Cari_Hesaplar::all();
        $chid = $id;

        $cariler = Cariler::where('ch_id', $id)->get();
        $odemeler = Odemeler::where('ch_id', $id)->get();

        $output = array();

        foreach ($cariler as $item) {
            array_push($output, carilerOdemeler::cariEkle(
                $item->Rezervasyon['rezervasyonlar_id'],
                $item->cari_id,
                $item->cari_tarihi,
                $item->Turlar->name,
                $item->Rezervasyon['rezervasyon_yetiskin_pax'],
                $item->Rezervasyon['rezervasyon_cocuk_pax'],
                $item->Rezervasyon['rezervasyon_bebek_pax'],
                $item->Rezervasyon['rezervasyon_ucret_pax'],
                $item->cari_borc,
                $item->cari_alacak,
                $item->cari_bakiye
            ));
        }

        foreach ($odemeler as $item) {
            $bakiye = $item->odeme_tutar_cari;

            if ($item->odeme_turu == 0) {
                $bakiye = $item->odeme_tutar_cari - ($item->odeme_tutar_cari * 2);
            }

            array_push($output, carilerOdemeler::odemeEkle(
                $item->odeme_id,
                $item->odeme_turu,
                $item->odeme_tarihi,
                $bakiye,
                $item->odeme_aciklama,
                $item->odeme_tutar." ".$item->odeme_doviz
            ));
        }

        usort($output, function($a, $b)
        {
            return strcmp($a->tarih, $b->tarih);
        });

        return view('admin.cari.index', compact('output','ch','chid'));
    }

    public function indexFilitreli(cariFilitreleRequest $request) {
        $ch = Cari_Hesaplar::all();
        $chid = $request->input('carihesap');

        $cariler = Cariler::whereBetween('cari_tarihi',  array($request->input('tarih1'), $request->input('tarih2')))
            ->where('ch_id', $request->input('carihesap'))
            ->get();

        $odemeler = Odemeler::whereBetween('odeme_tarihi',  array($request->input('tarih1'), $request->input('tarih2')))
            ->where('ch_id', $request->input('carihesap'))
            ->get();

        $output = array();

        foreach ($cariler as $item) {
            array_push($output, carilerOdemeler::cariEkle(
                $item->Rezervasyon->rezervasyonlar_id,
                $item->cari_id,
                $item->cari_tarihi,
                $item->Turlar->tur_adi,
                $item->Rezervasyon->rezervasyon_yetiskin_pax,
                $item->Rezervasyon->rezervasyon_cocuk_pax,
                $item->Rezervasyon->rezervasyon_bebek_pax,
                $item->Rezervasyon->rezervasyon_ucret_pax,
                $item->cari_borc,
                $item->cari_alacak,
                $item->cari_bakiye
            ));
        }

        foreach ($odemeler as $item) {
            $bakiye = $item->odeme_tutar_cari;

            if ($item->odeme_turu == 0) {
                $bakiye = $item->odeme_tutar_cari - ($item->odeme_tutar_cari * 2);
            }

            array_push($output, carilerOdemeler::odemeEkle(
                $item->odeme_id,
                $item->odeme_turu,
                $item->odeme_tarihi,
                $bakiye,
                $item->odeme_aciklama,
                $item->odeme_tutar." ".$item->odeme_doviz
            ));
        }

        usort($output, function($a, $b)
        {
            return strcmp($a->tarih, $b->tarih);
        });

        $request->flash();

        return view('admin.cari.index', compact('output','ch','chid'));
    }

    public function excelOut(cariFilitreleRequest $request) {
        $ch = Cari_Hesaplar::where('ch_id',$request->input('carihesap'))->first();

        $cariler = Cariler::whereBetween('cari_tarihi',  array($request->input('tarih1'), $request->input('tarih2')))
            ->where('ch_id', $request->input('carihesap'))
            ->get();

        $odemeler = Odemeler::whereBetween('odeme_tarihi',  array($request->input('tarih1'), $request->input('tarih2')))
            ->where('ch_id', $request->input('carihesap'))
            ->get();

        $output = array();

        foreach ($cariler as $item) {
            array_push($output, carilerOdemeler::cariEkle(
                $item->Rezervasyonlar->rezervasyonlar_id,
                $item->cari_id,
                $item->cari_tarihi,
                $item->Turlar->tur_adi,
                $item->Rezervasyonlar->rezervasyon_yetiskin_pax,
                $item->Rezervasyonlar->rezervasyon_cocuk_pax,
                $item->Rezervasyonlar->rezervasyon_bebek_pax,
                $item->Rezervasyonlar->rezervasyon_ucret_pax,
                $item->cari_borc,
                $item->cari_alacak,
                $item->cari_bakiye
            ));
        }

        foreach ($odemeler as $item) {
            $bakiye = $item->odeme_tutar_cari;

            if ($item->odeme_turu == 0) {
                $bakiye = $item->odeme_tutar_cari - ($item->odeme_tutar_cari * 2);
            }

            array_push($output, carilerOdemeler::odemeEkle(
                $item->odeme_id,
                $item->odeme_turu,
                $item->odeme_tarihi,
                $bakiye,
                $item->odeme_aciklama,
                $item->odeme_tutar." ".$item->odeme_doviz
            ));
        }

        usort($output, function($a, $b)
        {
            return strcmp($a->tarih, $b->tarih);
        });

        $data = array(
            array('Cari Hesap : ', $ch->ch_adi, 'Döviz : '. $ch->ch_doviz),
            array(''),
            array('Cari','#','Tarih','Tur','Y - Ç - B - Ü','Borç','Alacak','Bakiye','Toplam'),
            array('Ödeme','','','','Açıklama','','İşlem Tutarı','',''),
            array('')
        );

        $sayac = 0;
        $toplam = 0;

        foreach ($output as $item) {
            $sayac++;
            $toplam += $item->bakiye;

            if ($item->type == 0) {
                array_push($data,array("Ödeme",$sayac,$item->tarih,($item->odeme == 0) ? "Yapıldı" : "Alındı",
                    $item->aciklama, "",$item->tutar,$item->bakiye,($toplam == 0) ? "0" : $toplam
                ));
            } else {
                $pax = $item->y." - ".$item->c." - ".$item->b." - ".$item->u;

                array_push($data,array("Cari",$sayac,$item->tarih,$item->tur,$pax,
                    $item->borc,$item->alacak,$item->bakiye,($toplam == 0) ? "0" : $toplam
                ));
            }
        }

        Excel::create('cariler', function($excel) use($data) {
            $excel->sheet('Sheetname', function($sheet) use($data) {
                $sheet->fromArray($data);
            });
        })->download('xls');
    }

    public function excelOutID($id) {
        $ch = Cari_Hesaplar::where('ch_id',$id)->first();
        $cariler = Cariler::where('ch_id', $id)->get();
        $odemeler = Odemeler::where('ch_id', $id)->get();

        $output = array();

        foreach ($cariler as $item) {
            array_push($output, carilerOdemeler::cariEkle(
                $item->Rezervasyon['rezervasyonlar_id'],
                $item->cari_id,
                $item->cari_tarihi,
                $item->Turlar->tur_adi,
                $item->Rezervasyon['rezervasyon_yetiskin_pax'],
                $item->Rezervasyon['rezervasyon_cocuk_pax'],
                $item->Rezervasyon['rezervasyon_bebek_pax'],
                $item->Rezervasyon['rezervasyon_ucret_pax'],
                $item->cari_borc,
                $item->cari_alacak,
                $item->cari_bakiye
            ));
        }

        foreach ($odemeler as $item) {
            $bakiye = $item->odeme_tutar_cari;

            if ($item->odeme_turu == 0) {
                $bakiye = $item->odeme_tutar_cari - ($item->odeme_tutar_cari * 2);
            }

            array_push($output, carilerOdemeler::odemeEkle(
                $item->odeme_id,
                $item->odeme_turu,
                $item->odeme_tarihi,
                $bakiye,
                $item->odeme_aciklama,
                $item->odeme_tutar." ".$item->odeme_doviz
            ));
        }

        usort($output, function($a, $b)
        {
            return strcmp($a->tarih, $b->tarih);
        });

        $data = array(
            array('Cari Hesap : ', $ch->ch_adi, 'Döviz : '. $ch->ch_doviz),
            array(''),
            array('Cari','#','Tarih','Tur','Y - Ç - B - Ü','Borç','Alacak','Bakiye','Toplam'),
            array('Ödeme','','','','Açıklama','','İşlem Tutarı','',''),
            array('')
        );

        $sayac = 0;
        $toplam = 0;

        foreach ($output as $item) {
            $sayac++;
            $toplam += $item->bakiye;

            if ($item->type == 0) {
                array_push($data,array("Ödeme",$sayac,$item->tarih,($item->odeme == 0) ? "Yapıldı" : "Alındı",
                    $item->aciklama, "",$item->tutar,$item->bakiye,($toplam == 0) ? "0" : $toplam
                ));
            } else {
                $pax = $item->y." - ".$item->c." - ".$item->b." - ".$item->u;

                array_push($data,array("Cari",$sayac,$item->tarih,$item->tur,$pax,
                    $item->borc,$item->alacak,$item->bakiye,($toplam == 0) ? "0" : $toplam
                ));
            }
        }

        Excel::create('cariler', function($excel) use($data) {
            $excel->sheet('Sheetname', function($sheet) use($data) {
                $sheet->fromArray($data);
            });
        })->download('xls');
    }

    public function sil($id) {
        $cari = Cariler::find($id);
        $cari->delete();

        return redirect('/admin/caridetaylari/{id}');
    }

    public function ekleForm($id) {
        $ch = Cari_Hesaplar::all();

        return view('admin.cari.ekle',compact('ch','id'));
    }

    public function eklePost(cariGonderRequest $request, $id) {
        $doviz = new Doviz(); $dovizler = array('USD' => null, 'EUR' => null, 'GBP' => null);

        $dovizler['USD'] = $doviz->kurAlis("USD", Doviz::TYPE_EFEKTIFALIS);
        $dovizler['EUR'] = $doviz->kurAlis("EUR", Doviz::TYPE_EFEKTIFALIS);
        $dovizler['GBP'] = $doviz->kurAlis("GBP", Doviz::TYPE_EFEKTIFALIS);

        $rezervasyon = Rezervasyon::find($id);

        $cari = new Cariler();

        $cari->cari_tarihi = $rezervasyon->rezervasyon_tarihi;
        $cari->ch_id = $request->get('carihesap');
        $cari->otel_id = $rezervasyon->otel_id;
        $cari->tur_id = $rezervasyon->tur_id;
        $cari->rezervasyonlar_id = $id;

        $ch = Cari_Hesaplar::find($request->get('carihesap'));

        if ($rezervasyon->rezervasyon_rest_doviz == $ch->ch_doviz) {

            $borc = $rezervasyon->rezervasyon_rest;
            $cari->cari_borc = $borc;

        } else {
            switch ($rezervasyon->rezervasyon_rest_doviz) {
                case "TRY": $borc = $rezervasyon->rezervasyon_rest / $dovizler[$ch->ch_doviz]; $cari->cari_borc = $borc; break;
                case "USD": $value = ($rezervasyon->rezervasyon_rest * $dovizler["USD"]); $borc = ($value / $dovizler[$ch->ch_doviz]); $cari->cari_borc = $borc; break;
                case "EUR": $value = ($rezervasyon->rezervasyon_rest * $dovizler["EUR"]); $borc = ($value / $dovizler[$ch->ch_doviz]); $cari->cari_borc = $borc; break;
                case "GBP": $value = ($rezervasyon->rezervasyon_rest * $dovizler["GBP"]); $borc = ($value / $dovizler[$ch->ch_doviz]); $cari->cari_borc = $borc; break;
            }
        }

        $yetiskin = ($rezervasyon->rezervasyon_yetiskin_pax * $request->get('yetiskin')) ;
        $cocuk = ($rezervasyon->rezervasyon_cocuk_pax * $request->get('cocuk')) ;
        $bebek = ($rezervasyon->rezervasyon_bebek_pax * $request->get('bebek')) ;
        $ucret = ($rezervasyon->rezervasyon_ucret_pax * $request->get('ucret')) ;

        $ucretler = ($yetiskin + $cocuk + $bebek + $ucret);

        $cari->cari_alacak = $ucretler;

        $cari->cari_bakiye = ($borc - $ucretler);

        $cari->save();

        return redirect('admin/rezervasyon/')->with('status','Cariye Gönderildi');
    }
}

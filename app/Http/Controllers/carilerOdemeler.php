<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class carilerOdemeler extends Controller
{
    public $id;
    public $rez;
    public $type;
    public $odeme;
    public $tarih;
    public $tur;
    public $y;
    public $c;
    public $b;
    public $u;
    public $borc;
    public $alacak;
    public $bakiye;
    public $aciklama;
    public $tutar;


    public function __construct()
    {
        $this->id = 0;
        $this->rez = 0;
        $this->type = 0;
        $this->odeme = 0;
        $this->tarih = null;
        $this->tur = null;
        $this->y = 0;
        $this->c = 0;
        $this->b = 0;
        $this->u = 0;
        $this->borc = 0;
        $this->alacak = 0;
        $this->bakiye = 0;
        $this->aciklama = null;
        $this->tutar = null;
    }

    /**
     * @return int
     */
    public function getRez()
    {
        return $this->rez;
    }

    /**
     * @param int $rez
     */
    public function setRez($rez)
    {
        $this->rez = $rez;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getTutar()
    {
        return $this->tutar;
    }

    /**
     * @param mixed $tutar
     */
    public function setTutar($tutar)
    {
        $this->tutar = $tutar;
    }

    /**
     * @return mixed
     */
    public function getAciklama()
    {
        return $this->aciklama;
    }

    /**
     * @param mixed $aciklama
     */
    public function setAciklama($aciklama)
    {
        $this->aciklama = $aciklama;
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param mixed $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * @return mixed
     */
    public function getOdeme()
    {
        return $this->odeme;
    }

    /**
     * @param mixed $odeme
     */
    public function setOdeme($odeme)
    {
        $this->odeme = $odeme;
    }

    /**
     * @return mixed
     */
    public function getTarih()
    {
        return $this->tarih;
    }

    /**
     * @param mixed $tarih
     */
    public function setTarih($tarih)
    {
        $this->tarih = $tarih;
    }

    /**
     * @return mixed
     */
    public function getTur()
    {
        return $this->tur;
    }

    /**
     * @param mixed $tur
     */
    public function setTur($tur)
    {
        $this->tur = $tur;
    }

    /**
     * @return mixed
     */
    public function getY()
    {
        return $this->y;
    }

    /**
     * @param mixed $y
     */
    public function setY($y)
    {
        $this->y = $y;
    }

    /**
     * @return mixed
     */
    public function getC()
    {
        return $this->c;
    }

    /**
     * @param mixed $c
     */
    public function setC($c)
    {
        $this->c = $c;
    }

    /**
     * @return mixed
     */
    public function getB()
    {
        return $this->b;
    }

    /**
     * @param mixed $b
     */
    public function setB($b)
    {
        $this->b = $b;
    }

    /**
     * @return mixed
     */
    public function getU()
    {
        return $this->u;
    }

    /**
     * @param mixed $u
     */
    public function setU($u)
    {
        $this->u = $u;
    }

    /**
     * @return mixed
     */
    public function getBorc()
    {
        return $this->borc;
    }

    /**
     * @param mixed $borc
     */
    public function setBorc($borc)
    {
        $this->borc = $borc;
    }

    /**
     * @return mixed
     */
    public function getAlacak()
    {
        return $this->alacak;
    }

    /**
     * @param mixed $alacak
     */
    public function setAlacak($alacak)
    {
        $this->alacak = $alacak;
    }

    /**
     * @return mixed
     */
    public function getBakiye()
    {
        return $this->bakiye;
    }

    /**
     * @param mixed $bakiye
     */
    public function setBakiye($bakiye)
    {
        $this->bakiye = $bakiye;
    }

    /**
     * @param $odeme
     * @param $tarih
     * @param $bakiye
     * @param $aciklama
     * @param $tutar
     * @return carilerOdemeler
     */
    public static function odemeEkle($id,$odeme, $tarih, $bakiye, $aciklama, $tutar) {
        $obj = new carilerOdemeler();

        $obj->setId($id);
        $obj->setType(0);
        $obj->setOdeme($odeme);
        $obj->setTarih($tarih);
        $obj->setBakiye($bakiye);
        $obj->setAciklama($aciklama);
        $obj->setTutar($tutar);

        return $obj;
    }

    /**
     * @param $tarih
     * @param $tur
     * @param $y
     * @param $c
     * @param $b
     * @param $u
     * @param $borc
     * @param $alacak
     * @param $bakiye
     * @return carilerOdemeler
     */
    public static function cariEkle($rez_id, $id, $tarih, $tur, $y, $c, $b, $u, $borc, $alacak, $bakiye) {
        $obj = new carilerOdemeler();

        $obj->setRez($rez_id);
        $obj->setId($id);
        $obj->setTarih($tarih);
        $obj->setType(1);
        $obj->setTur($tur);
        $obj->setY($y);
        $obj->setC($c);
        $obj->setB($b);
        $obj->setU($u);
        $obj->setBorc($borc);
        $obj->setAlacak($alacak);
        $obj->setBakiye($bakiye);

        return $obj;
    }
}

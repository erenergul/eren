@extends('admin.layouts.master')
@section('content')
    <form action="/admin/odeme/duzenle/{{ $odeme->odeme_id }}" method="post">
        {{ csrf_field() }}

        @foreach ($errors->all() as $error)
            <div class="row">
                <div class="col-sm-12">
                    <div class="alert alert-danger">
                        {{ $error }}
                    </div>
                </div>
            </div>
        @endforeach
        @if (session('status'))
            <div class="row">
                <div class="col-sm-12">
                    <div class="alert alert-info">
                        {{session('status')}}
                    </div>
                </div>
            </div>
        @endif

        <div class="row">
            <div class="col-sm-12">
                <h2>Ödeme Yap</h2>
                <hr>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12 col-md-6">
                <div class="form-group row">
                    <label for="carihesap" class="col-4 col-form-label">Hesap Seç</label>
                    <div class="col-8">
                        <select class="form-control" id="carihesap" name="carihesap">
                            @forelse ($ch as $o)
                                <option {{ ($odeme->ch_id == $o->ch_id) ? "selected" : "" }} value="{{ $o->ch_id }}">{{ $o->ch_adi . ' - ' . $o->ch_doviz }}</option>
                            @empty
                                <option>Lütfen Bir Cari Hesap Ekleyin !!</option>
                            @endforelse
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-6">
                <div class="form-group row">
                    <label for="odemeturu" class="col-4 col-form-label">Ödeme Türü</label>
                    <div class="col-8">
                        <select class="form-control" id="odemeturu" name="odemeturu">
                            <option {{ ($odeme->odeme_turu = 0) ? "selected" : "" }} value="0">Ödeme Yapıldı</option>
                            <option {{ ($odeme->odeme_turu = 1) ? "selected" : "" }} value="1">Ödeme Alındı</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12 col-md-6">
                <div class="form-group row">
                    <label for="aciklama" class="col-4 col-form-label">Açıklama</label>
                    <div class="col-8">
                        <input class="form-control" type="text" value="{{$odeme->odeme_aciklama}}" id="aciklama" name="aciklama">
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-6">
                <div class="form-group row">
                    <label for="tutar" class="col-4 col-form-label">Tutar</label>
                    <div class="col-4">
                        <input class="form-control" type="text" value="{{$odeme->odeme_tutar}}" id="tutar" name="tutar">
                    </div>
                    <div class="col-4">
                        <select class="form-control" id="doviz" name="doviz">
                            <option {{ ($odeme->odeme_doviz == "TRY" ) ? "selected" : ""}} value="TRY">TRY</option>
                            <option {{ ($odeme->odeme_doviz == "USD" ) ? "selected" : ""}} value="USD">USD</option>
                            <option {{ ($odeme->odeme_doviz == "EUR" ) ? "selected" : ""}} value="EUR">EUR</option>
                            <option {{ ($odeme->odeme_doviz == "GBP" ) ? "selected" : ""}} value="GBP">GBP</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12 col-md-12">
                <div class="row">
                    <div class="col-12" style="margin-top: -1rem">
                        <hr>
                    </div>
                    <div class="col-sm-12">
                        <button type="submit" class="btn btn-primary">Ödeme Düzenle</button>
                        <input type="reset" class="btn btn-warning" value="Sıfırla">
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
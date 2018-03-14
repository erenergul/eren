@extends('admin.layouts.master')
@section('content')

    <div class="panel">
        <div class="panel-heading">
            <h3 class="panel-title">Ödemeler</h3>
        </div>
        <div class="panel-body container-fluid">


            <div class="col-md-12">
                <!-- Example Basic Form (Form row) -->
                <div class="example-wrap">

                    <div class="example">
                        <form action="/admin/odeme/ekle" method="post">
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
                                <div class="col-sm-12 col-md-6">
                                    <div class="form-group row">
                                        <label for="carihesap" class="col-4 col-form-label">Hesap Seç</label>
                                        <div class="col-8">
                                            <select class="form-control" id="carihesap" name="carihesap">
                                                @forelse ($ch as $o)
                                                    <option value="{{ $o->ch_id }}">{{ $o->ch_adi . ' - ' . $o->ch_doviz }}</option>
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
                                                <option value="0">Ödeme Alındı</option>
                                                <option value="1">Ödeme Yapıldı</option>
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
                                            <input class="form-control" type="text" value="" id="aciklama" name="aciklama">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-6">
                                    <div class="form-group row">
                                        <label for="tutar" class="col-4 col-form-label">Tutar</label>
                                        <div class="col-4">
                                            <input class="form-control" type="text" value="0" id="tutar" name="tutar">
                                        </div>
                                        <div class="col-4">
                                            <select class="form-control" id="doviz" name="doviz">
                                                <option value="TRY">TRY</option>
                                                <option value="USD">USD</option>
                                                <option value="EUR">EUR</option>
                                                <option value="GBP">GBP</option>
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
                                            <button type="submit" class="btn btn-primary">Gönder</button>
                                            <input type="reset" class="btn btn-warning" value="Sıfırla">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>





@endsection
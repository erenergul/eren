@extends('admin.layouts.master')
@section('content')
    <div class="panel">
        <div class="panel-body container-fluid">
            <div class=" panel col-md-12">
                <header class="panel-heading">
                    <div class="panel-actions"></div>
                    <h3 class="panel-title"></h3>
                </header>

                    <div class="col-sm-12 col-md-6">
                        <div class="row">
                            <div class="col-6">
                                <h4>Cariler</h4>
                            </div>
                            <div class="col-6">
                                <a class="btn btn-block btn-primary " href="{{ url('/admin/caridetaylari') }}">
                                    <i class="icon fa-mail-forward" aria-hidden="true"></i> Cari Detayları</a>
                            </div>
                        </div>
                        <hr>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <div class="row">
                            <div class="col-6">
                                <h4>Cari Hesaplar</h4>
                            </div>
                            <div class="col-md-6">
                                <a class="btn btn-block btn-success" href="{{ url('/admin/cari') }}">
                                    <i class="icon wb-plus-circle" aria-hidden="true"></i></i>Ekle</a>
                            </div>

                        </div>
                        <hr>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <div class="row">
                            <div class="col-6">
                                <h4>Ödemeler</h4>
                            </div>
                            <div class="col-3">
                                <a class="btn btn-sm btn-block btn-outline-success"
                                   href="{{ url('/admin/odeme/ekle') }}">Yap</a>
                            </div>
                            <div class="col-3">
                                <a class="btn btn-sm btn-block btn-outline-info" href="{{ url('/admin/odemeler') }}">Detaylar</a>
                            </div>
                        </div>
                        <hr>
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection
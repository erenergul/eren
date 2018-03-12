@extends('admin.layouts.master')

@section('content')
    <div class="panel">
        <div class="panel-body container-fluid">
            <div class=" panel col-md-12">
                <header class="panel-heading">
                    <div class="panel-actions"></div>
                    <h3 class="panel-title">Rezervasyonlar</h3>
                </header>
                <div class="col-12" style="margin-top: -1rem">
                    <hr>
                </div>
                <form action="{{url('/admin/rezervasyon/filitreliAd')}}" method="get">
                    {{csrf_field()}}
                    <input type="text" value="0" name="ftype" hidden>
                    <div class="row">
                        <div class="col-sm-4 col-md-4">
                            <div class="form-group row">
                                <label  class="col-3 col-form-label">Ad</label>
                                <div class="col-8">
                                    <input class="form-control" type="text"  name="adi" placeholder="Rezervasyon Adını Giriniz" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4 col-md-6">
                            <div class="form-group row">
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary">Filtrele</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <div class="col-12" style="margin-top: -1rem">
                    <hr>
                </div>

                <form action="{{url('/admin/rezervasyon/filitrelitarih')}}" method="get">
                    {{csrf_field()}}
                    <input type="text" value="0" name="ftype" hidden>
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group row">
                                <label for="tarih1" class="col-1 col-form-label">Tarih</label>
                                <div class="col-3">
                                    <input class="form-control" type="date" value="{{old('tarih1')}}" id="tarih1" name="tarih1" required>
                                </div>
                                <div class="col-1">
                                    <label for="tarih2" class="col-1 col-form-label"> Arası </label>
                                </div>
                                <div class="col-3">
                                    <input class="form-control" type="date" value="{{old('tarih2')}}" id="tarih2" name="tarih2" required>
                                </div>

                                <button type="submit" class="btn btn-primary">Filtrele</button>
                            </div>
                        </div>

                        <div class="col-sm-12 col-md-12">
                            <div class="row">
                                <div class="col-12" style="margin-top: -1rem">
                                    <hr>
                                </div>
                                <div class="col-sm-12">

                                    <input type="reset" class="btn btn-sm btn-warning" value="Sıfırla">
                                    <a class="btn btn-sm btn-info" href="{{ url('/admin/rezervasyon/yarin/')}}">Yarın Olan Rezervasyonlar</a>
                                    <a class="btn btn-sm btn-success" href="{{ url('/admin/rezervasyon/create/')}}">Rezervasyon Ekle</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-12"><hr></div>
                    </div>
                </form>
                <div class="table-responsive">
                    <table class="table table-sm table-hover">
                        <thead>
                        <tr>
                            <th style="padding-left: 0;" width="20px">ID</th>
                            <th>Tarih</th>
                            <th>Tur Adı</th>
                            <th>Y</th>
                            <th>Ç</th>
                            <th>B</th>
                            <th>Ü</th>
                            <th>Adı</th>
                            <th>Otel</th>
                            <th>Oda No</th>
                            <th>Saat</th>
                            <th>Bilet No</th>
                            <th>Satış</th>
                            <th>Kapora</th>
                            <th>Rest</th>
                            <th width="10px"></th>
                            <th width="10px"></th>
                            <th width="10px"></th>
                        </tr>
                        </thead>
                        <tbody>
                        @php $yetiskin = 0; $cocuk = 0; $bebek =0; $ucret = 0; @endphp
                        @forelse ($posts as $o)
                            @php
                                $yetiskin += $o->rezervasyon_yetiskin_pax;
                                $cocuk += $o->rezervasyon_cocuk_pax;
                                $bebek += $o->rezervasyon_bebek_pax;
                                $ucret += $o->rezervasyon_ucret_pax;
                            @endphp
                            <tr class="{{ (empty($o->Cariler)) ? "alert-primary" : "" }}">
                                <td style="padding-left: 2px;">{{$o->rezervasyonlar_id}}</td>
                                <td>{{$o->rezervasyon_tarihi->formatLocalized('%d/%m/%Y')}}</td>
                                <td>{{$o->tur['name']}}</td>
                                <td>{{$o->rezervasyon_yetiskin_pax}}</td>
                                <td>{{$o->rezervasyon_cocuk_pax}}</td>
                                <td>{{$o->rezervasyon_bebek_pax}}</td>
                                <td>{{$o->rezervasyon_ucret_pax}}</td>
                                <td>{{$o->rezervasyon_adi}}</td>
                                <td>{{$o->otel['name']}}</td>
                                <td>{{$o->rezervasyon_oda_no}}</td>
                                <td>{{$o->alinis['name']}}</td>
                                <td>{{$o->rezervasyon_no}}</td>
                                <td>{{$o->rezervasyon_toplam_satis}} {{$o->rezervasyon_toplam_satis_doviz}}</td>
                                <td>{{$o->rezervasyon_kapora}} {{$o->rezervasyon_kapora_doviz}}</td>
                                <td>{{$o->rezervasyon_rest}} {{$o->rezervasyon_rest_doviz}}</td>
                                <td class="text-center"><a
                                            class="btn btn-sm btn-xs btn-primary {{ (empty($o->Cariler) ? "" : "disabled") }}"
                                            href="{{ url('/admin/cari/gonder/'.$o->rezervasyonlar_id) }}"><i
                                                class="fa fa-arrow-right" aria-hidden="true"></i></a></td>
                                <td class="text-center"><a
                                            class="btn btn-sm btn-xs btn-success {{ (empty($o->Cariler) ? "" : "disabled") }}"
                                            href="{{ url('/admin/rezervasyon/edit/'.$o->rezervasyonlar_id) }}"><i
                                                class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>
                                <td class="text-center"><a
                                            class="btn btn-sm btn-xs btn-danger {{ (empty($o->Cariler) ? "" : "disabled") }}"
                                            href="{{ url('/admin/rezervasyon/destroy/'.$o->rezervasyonlar_id) }}"><i
                                                class="fa fa-trash-o" aria-hidden="true"></i></a></td>
                            </tr>
                        @empty
                            <p>Boş</p>
                        @endforelse
                        <tr>
                            <td colspan="3" class="text-center">Toplam Kişi Sayısı</td>
                            <td>{{ $yetiskin }}</td>
                            <td>{{ $cocuk }}</td>
                            <td>{{ $bebek }}</td>
                            <td>{{ $ucret }}</td>
                            <td colspan="10"></td>
                        </tr>
                        </tbody>

                    </table>
                    @if (session('status'))
                        <div class="row">
                            <div class="col-md-8">
                                <div class="alert alert-danger">
                                    {{session('status')}}
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
            <!-- End Example Basic Form (Form row) -->
        </div>

    </div>



@endsection

@section('javascript')
    <script src="{{asset('adminsrc/global/vendor/bootstrap-touchspin/bootstrap-touchspin.min.js')}}"></script>

    <script src="{{asset('adminsrc/global/vendor/bootstrap-datepicker/bootstrap-datepicker.js')}}"></script>

    <script src="{{asset('adminsrc/global/js/Plugin/bootstrap-datepicker.js')}}"></script>

    <script>
        $('#turlar').change(function () {
            var turID = $(this).val();
            if (turID) {
                $.ajax({
                    type: "GET",
                    url: "{{url('/api/get-tur-list')}}?tur_id=" + turID,
                    success: function (res) {
                        if (res) {
                            $("#alinis").empty();
                            $("#alinis").append('<option>Alınış Saatini Seç</option>');
                            $.each(res, function (key, value) {
                                $("#alinis").append('<option value="' + key + '">' + value + '</option>');
                            });

                        } else {
                            $("#alinis").empty();
                        }
                    }
                });
            }
        });

    </script>


@stop
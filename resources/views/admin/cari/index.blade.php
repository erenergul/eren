@extends('admin.layouts.master')
@section('content')

    <div class="panel">
        <div class="panel-body container-fluid">
            <div class=" panel col-md-12">
                <header class="panel-heading">
                    <h3 class="panel-title">Cari Detayları</h3>
                </header>
                <hr>
                <form action="{{url('/admin/caridetaylari/filitreli')}}" method="get">
                    {{csrf_field()}}
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group row">
                                <label for="carihesap" class="col-1 col-form-label">Cari Hesap</label>
                                <div class="col-4">
                                    <select class="form-control" id="carihesap" name="carihesap">
                                        <option>Lütfen Bir Hesap Seçin</option>
                                        @forelse($ch as $item)
                                            <option {{ ($chid == $item->ch_id) ? "selected" : "" }} value="{{$item->ch_id}}">{{$item->ch_adi}}</option>
                                        @empty
                                            <option>Boş</option>
                                        @endforelse
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group row">
                                <label for="tarih" class="col-1 col-form-label">Tarih</label>
                                <div class="col-3">
                                    <input class="form-control" type="date" value="{{ old('tarih1') }}" id="tarih1"
                                           name="tarih1">
                                </div>
                                <div class="col-1">
                                    <label for="tarih2" class="col-1 col-form-label">Arası</label>
                                </div>
                                <div class="col-3">
                                    <input class="form-control" type="date" value="{{ old('tarih2') }}" id="tarih2"
                                           name="tarih2">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12">
                            <div class="row">
                                <div class="col-12" style="margin-top: -1rem">
                                    <hr>
                                </div>
                                <div class="col-sm-12">
                                    <button type="submit" class="btn btn-sm btn-primary">Carileri Filitrele</button>
                                    <input type="reset" class="btn btn-sm btn-warning" value="Sıfırla">
                                    <a class="btn btn-sm btn-success {{ (count($output) <= 0) ? "disabled" : "" }}"
                                       href="{{ (empty(old('carihesap'))) ? url('/admin/cari/excel')."/".$chid : url('/admin/cari/excel/').'?carihesap='.old('carihesap').'&tarih1='.old('tarih1').'&tarih2='.old('tarih2') }}">
                                        <i class="fa fa-file-excel-o" aria-hidden="true"></i> Excel Çıktısı Al
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <hr>
                        </div>
                    </div>
                </form>
                <div class="row">
                    <div class="col-sm-12">
                        <p><strong class="text-success"> 1-) Borç</strong> Turun Rest kısmını temsil eder, </p>
                        <p><strong class="text-danger"> 2-) Alacak</strong> Turun (Pas)Taban fiyatının toplamını temsil eder ( örn : 2 yetişkin (x) 10€ = 20€ ).</p>
                        <p><strong class="text-info">3-) Bakiye</strong> "-" ise rezervasyondan borçlu olduğunuzu "+"ise alacaklı olduğunuz bildirir.</p>
                        <div class="table-responsive">
                            <table class="table table-sm">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Tarih</th>
                                    <th>Tur</th>
                                    <th>Y</th>
                                    <th>Ç</th>
                                    <th>B</th>
                                    <th>Ü</th>
                                    <th class="text-success">Borç</th>
                                    <th class="text-danger">Alacak</th>
                                    <th class="text-info">Bakiye</th>
                                    <th>Toplam</th>
                                    <th><i class="fa fa-question-circle" aria-hidden="true"></i></th>
                                    <th><i class="fa fa-times-circle" aria-hidden="true"></i></th>
                                </tr>
                                </thead>
                                <tbody>
                                @php $sayac = 1; $toplam = (float)0; @endphp
                                @forelse($output as $item)
                                    @php $sayac++; $toplam += $item->bakiye; @endphp
                                    <tr style="{{ ($item->type == 0) ? "color: #387eff" : "" }}" class="table-active">
                                        <td>{{ $sayac }}</td>
                                        <td>{{ $item->tarih }}</td>
                                        @if($item->type == 1)
                                            <td>{{ $item->tur }}</td>
                                            <td>{{ $item->y }}</td>
                                            <td>{{ $item->c }}</td>
                                            <td>{{ $item->b }}</td>
                                            <td>{{ $item->u }}</td>
                                            <td>{{ $item->borc }}</td>
                                            <td>{{ $item->alacak }}</td>
                                            <td>{{ $item->bakiye }}</td>
                                            <td>{{ $toplam }}</td>
                                            <td class="text-center"><a class="btn btn-sm btn-outline-info"
                                                                       href="{{ url('/admin/rezervasyon/detay/'.$item->rez) }}"><i
                                                            class="fa fa-question-circle" aria-hidden="true"></i></a>
                                            </td>
                                            <td class="text-center"><a class="btn btn-sm btn-outline-danger"
                                                                       href="{{ url('/admin/cari/sil/'.$item->id) }}"><i
                                                            class="fa fa-times-circle" aria-hidden="true"></i></a></td>
                                        @else
                                            <td>{{ ($item->odeme == 0) ? "Ödeme Alındı" : "Ödeme Yapıldı" }}</td>
                                            <td colspan="5">{{ $item->aciklama }}</td>
                                            <td>{{ $item->tutar }}</td>
                                            <td>{{ $item->bakiye }}</td>
                                            <td>{{ $toplam }}</td>
                                            <td class="text-center"><a class="btn btn-sm btn-outline-warning"
                                                                       href="{{ url('/admin/odeme/duzenle/'.$item->id) }}"><i
                                                            class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                            </td>
                                            <td class="text-center"><a class="btn btn-sm btn-outline-danger"
                                                                       href="{{ url('/admin/odeme/sil/'.$item->id) }}"><i
                                                            class="fa fa-trash-o" aria-hidden="true"></i></a></td>
                                        @endif
                                    </tr>
                                @empty
                                    <p>Boş</p>
                                @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection

@section('javascript')
    <script>
        $(function () {
            $('#carihesap').on('change', function () {
                var url = $(this).val();
                if (url) {
                    window.location = "{{ url("/admin/caridetaylari") }}/" + url;
                }
                return false;
            });
        });
    </script>
@endsection
@extends('admin.layouts.master')

@section('content')
    <div class="panel">
        <div class="panel-body container-fluid">
            <div class=" panel col-md-12">
                <header class="panel-heading">
                    <div class="panel-actions"></div>
                    <h3 class="panel-title">Transferler</h3>
                </header>

            </div>

            <div class="table-responsive">
                <table class="table table-sm table-hover">
                    <thead>
                    <tr>
                        <th style="padding-left: 0;" width="20px">ID</th>
                        <th>Tarih</th>
                        <th>Saat</th>
                        <th>Yolcu Tipi</th>
                        <th>Havalimanı</th>
                        <th>Otel</th>
                        <th>Adı</th>
                        <th>Kişi Sayısı</th>
                        <th>Fiyat</th>
                    </tr>
                    </thead>
                    <tbody>

                    @forelse ($transfer as $o)

                        <tr>
                            <td style="padding-left: 2px;">{{$o->id}}</td>
                            <td>{{$o->date}}</td>
                            <td>{{$o->time}}</td>
                            <td>{{$o->gelen}}</td>
                            <td>{{$o->birakilis}}</td>
                            <td>{{$o->otel['name']}}</td>
                            <td>{{$o->name}}</td>
                            <td>{{$o->pax}}</td>
                            <td>{{$o->total}} {{$o->doviz}}</td>
                        </tr>
                    @empty
                        <p>Boş</p>
                    @endforelse

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



@stop
@extends('admin.layouts.master')
@section('content')


    <div class="page-content container-fluid">
        <div class="alert alert-alt alert-primary alert-dismissible"> <strong>Önemli Bilgi: </strong>   <p> Hesap Ekleme esnasında Döviz Türü'nü dikkatli seçin tekrar değiştirilemez. Tur Pas(Taban) fiyatının döviz türünü seçmeniz gerekmektedir.</p>
            <p>Eğer bir tura kişi başı 8€ ödüyorsanız. Döviz türü olarak EUR seçmeniz gerekmektedir. Eğer kişi başı 20TL ödüyorsanız TRY seçmeniz gerekmektedir.</p></div>

        <div class="row">

            <div class="col-xxl-4 col-lg-6">
                <!-- Example Heading Icon -->

                <div class="panel">

                    <div class="panel-heading">
                        <h3 class="panel-title icondemo vertical-align-middle"><i class="icon wb-user-add"
                                                                                  aria-hidden="true"></i>Cari Hesap
                            Ekle</h3>

                    </div>

                    <div class="panel-body">

                        {!! Form::open(['method' => 'POST', 'action' => 'cariHesapController@store', 'files' => true]) !!}

                        <div class="form-group">
                            {!! Form::label ('ch_adi' ,'Cari Hesap Adı') !!}
                            {!! Form::text('ch_adi',null ,['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label ('ch_doviz' ,'Döviz Türü')!!}
                            {!! Form::select('ch_doviz', ['TRY' => 'TRY' , 'EUR'=>'EUR','USD'=>'USD','GBP'=> 'GBP'],'',array('class'=>'form-control')) !!}

                        </div>
                        <div class="form-group">
                            {!! Form::submit('Ekle' , ['class' => 'btn btn-primary']) !!}
                        </div>

                        {{Form::close()}}

                        @if (session('status_eklendi'))
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="alert alert-info">
                                        {{session('status_eklendi')}}
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
                <!-- End Example Heading Icon -->
            </div>
            <div class=" panel col-md-8">
                <header class="panel-heading">
                    <div class="panel-actions"></div>
                    <h3 class="panel-title">Cari Hesaplar</h3>
                </header>
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
                        <table class="table table-hover table-sm">
                            <thead>
                            <tr>
                                <th>Hesap Adı</th>
                                <th>Döviz Türü</th>
                                <th>Hesap</th>
                                <th width="150px"></th>
                            </tr>
                            </thead>
                            <tbody>
                            @if($cari_hesap)
                                @foreach ($cari_hesap as $o)
                                    <tr>
                                        <td>{{$o->ch_adi}}</td>
                                        <td>{{$o->ch_doviz}}</td>
                                        <td><a class="btn btn-block btn-success"
                                               href="{{ url('/admin/caridetaylari/'.$o->ch_id) }}">Hesap Detaylarını Görüntüle</a></td>
                                        <td><a class="btn btn-primary"
                                               href="{{ url('/admin/carihesap/edit/'.$o->ch_id) }}">Düzenle</a>
                                            <a class="btn btn-danger"
                                               href="{{ url('/admin/carihesap/destroy/'.$o->ch_id) }}">Sil</a></td>

                                    </tr>
                                @endforeach
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>





@endsection

@section('javascript')

    <script type="text/javascript" src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.js"></script>

    <script src="{{asset('adminsrc/global/vendor/datatables.net-bs4/dataTables.bootstrap4.js')}}"></script>

@endsection
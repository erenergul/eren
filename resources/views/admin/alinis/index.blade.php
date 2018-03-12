@extends('admin.layouts.master')
@section('content')


    <div class="page-content container-fluid">
        <div class="row">

            <div class="col-xxl-4 col-lg-6">
                <!-- Example Heading Icon -->
                <div class="panel">
                    <div class="panel-heading">
                        <h3 class="panel-title icondemo vertical-align-middle"><i class="icon wb-user-add"
                                                                                  aria-hidden="true"></i>Alınış Saati
                            Ekle</h3>
                    </div>

                    <div class="panel-body">
                        {!! Form::open(['method' => 'POST', 'action' => 'AlinislarController@store', 'files' => true]) !!}

                        <div class="form-group">
                            {!! Form::label ('name' ,'Alınış Saati') !!}
                            {!! Form::text('name',null ,['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label ('tur_id' ,'Tur Adı') !!}
                            {{ Form::select('tur_id',["" => "Tur Seç"] + $turlar,null, ['class' => 'form-control',]) }}

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
                    <h3 class="panel-title">Alınış Saati</h3>
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
                                <th>Alınış Saati</th>
                                <th>Tur</th>
                                <th width="150px"></th>
                            </tr>
                            </thead>
                            <tbody>
                            @if($alinislar)
                                @foreach ($alinislar as $o)
                                    <tr>
                                        <td>{{$o->name}}</td>
                                        <td>{{$o->tur['name']}}</td>
                                        <td><a class="btn btn-primary"
                                                                   href="{{ url('/admin/alinis/edit/'.$o->id) }}">Düzenle</a>
                                            <a class="btn btn-danger"
                                               href="{{ url('/admin/alinis/destroy/'.$o->id) }}">Sil</a></td>

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
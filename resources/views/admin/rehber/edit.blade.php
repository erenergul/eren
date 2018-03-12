@extends('admin.layouts.master')
@section('content')
    <div class="page-content container-fluid">
        <div class="row">

            <div class="col-xxl-4 col-lg-6">
                <!-- Example Heading Icon -->
                <div class="panel">
                    <div class="panel-heading">
                        <h3 class="panel-title icondemo vertical-align-middle"><i class="icon wb-user-add" aria-hidden="true"></i>Rehber Oluştur
                        </h3>
                    </div>
                    <div class="panel-body">
                        {!! Form::model( $rehber, ['method' => 'PATCH', 'action' => ['RehberlerController@update', $rehber->rehber_id]]) !!}

                        <div class="form-group">
                            {!! Form::label ('rehber_adi' ,'Rehber Adı') !!}
                            {!! Form::text('rehber_adi',null ,['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::submit('Rehber Güncelle' , ['class' => 'btn btn-primary']) !!}
                        </div>


                        {{Form::close()}}
                    </div>
                </div>
                <!-- End Example Heading Icon -->
            </div>
        </div>
    </div>


@endsection
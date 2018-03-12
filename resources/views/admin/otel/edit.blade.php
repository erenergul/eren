@extends('admin.layouts.master')
@section('content')
    <div class="page-content container-fluid">
        <div class="row">

            <div class="col-xxl-4 col-lg-6">
                <!-- Example Heading Icon -->
                <div class="panel">
                    <div class="panel-heading">
                        <h3 class="panel-title icondemo vertical-align-middle"><i class="icon wb-user-add" aria-hidden="true"></i>Otel Ekle
                        </h3>
                    </div>
                    <div class="panel-body">
                        {!! Form::model( $oteller, ['method' => 'PATCH', 'action' => ['OtellerController@update', $oteller->id]]) !!}

                        <div class="form-group">
                            {!! Form::label ('name' ,'Otel Adı') !!}
                            {!! Form::text('name',null ,['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::submit('Oteli Güncelle' , ['class' => 'btn btn-primary']) !!}
                        </div>


                        {{Form::close()}}
                    </div>
                </div>
                <!-- End Example Heading Icon -->
            </div>
        </div>
    </div>


@endsection
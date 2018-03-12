@extends('admin.layouts.master')
@section('content')
    <div class="panel">
        <div class="panel-heading">
            <h3 class="panel-title">Rezervasyon Ekle</h3>
        </div>
        <div class="panel-body container-fluid">


            <div class="col-md-12">
                <!-- Example Basic Form (Form row) -->
                <div class="example-wrap">

                    <div class="example">
                        {!! Form::open(['method' => 'POST', 'action' => 'TransferlerController@store']) !!}
                        <div class="form-row">
                            <div class="form-group col-md-4" data-plugin="formMaterial">
                                <label for="date" class="">Tarih</label>
                                <input class="form-control " type="text" value="" id="datepicker" name="date" required>
                            </div>
                            <div class="form-group col-md-4" data-plugin="formMaterial">
                                <label for="time" class="">Saat</label>
                                <input class="timepicker form-control " type="text" name="time"
                                       data-plugin="clockpicker" data-autoclose="true" required>
                            </div>
                            <div class="col-md-4">
                                {!! Form::label ('gelen' ,'Yolcu Tipi')!!}
                                {!! Form::select('gelen', ['placeholder' => 'Yolcu Tipi Seç', 'GELEN YOLCU' =>  'GELEN YOLCU', 'GİDEN YOLCU' =>  'GİDEN YOLCU'],'',array('class'=>'form-control')) !!}
                            </div>
                            <div class="form-group col-md-4">
                                {!! Form::label ('otel_id' ,'Otel') !!}
                                {!! Form::select('otel_id',$otel, null,['placeholder' => 'Otel Seç' ,'class' => 'form-control', 'required']) !!}
                            </div>
                            <div class="col-md-4">
                                {!! Form::label ('birakilis' ,'Bırakılacak Havalimanı')!!}
                                {!! Form::select('birakilis', ['placeholder'=> 'Havalimanı Seç ','Antalya Havalimanı' =>'Antalya Havalimanı','Gazipaşa Havalimanı' =>'Gazipaşa Havalimanı'],'',array('class'=>'form-control')) !!}
                            </div>
                            <div class="form-group col-md-2">
                                {!! Form::label ('pax' ,'Kişi Sayısı')!!}
                                {!! Form::text('pax', $value = 1,['data-min'=>'1' , 'data-max'=>'100', 'data-stepinterval'=>'50','data-plugin' => 'TouchSpin', 'class' => 'form-control']) !!}
                            </div>
                            <div class="form-group col-md-4">
                                {!! Form::label ('name' ,'Müşteri Adı')!!}
                                {!! Form::text('name',null ,['placeholder' => 'Müşteri Adını Giriniz','class' => 'form-control','required']) !!}
                            </div>
                            <div class="form-group col-md-4">
                                {!! Form::label ('rezervasyon_tel' ,'Tel No') !!}
                                {!! Form::text('rezervasyon_tel',null ,['placeholder' => 'Telefon Numarasını Giriniz','class' => 'form-control']) !!}
                            </div>

                            <div class="form-group col-md-1">
                                {!! Form::label ('total' ,'Satış Fiyatı') !!}
                                {!! Form::text('total',null ,['class' => 'form-control','required']) !!}
                            </div>
                            <div class="col-md-1">
                                {!! Form::label ('doviz' ,'Döviz Türü')!!}
                                {!! Form::select('doviz', ['TRY' => 'TRY' , 'EUR'=>'EUR','USD'=>'USD','GBP'=> 'GBP'],'',array('class'=>'form-control')) !!}
                            </div>



                        </div>
                        </br></br>
                        <div class="row">
                            <div class="form-group col-lg-8">
                                {!! Form::submit('Rezervasyon Ekle' , ['class' => 'btn btn-primary btn-block']) !!}
                            </div>
                        </div>
                        {!!  Form::close() !!}
                    </div>

                </div>
                <!-- End Example Basic Form (Form row) -->
            </div>

        </div>
    </div>


@endsection

@section('javascript')
    <script src="{{asset('adminsrc/global/vendor/bootstrap-touchspin/bootstrap-touchspin.min.js')}}"></script>

    <script src="{{asset('adminsrc/global/vendor/bootstrap-datepicker/bootstrap-datepicker.js')}}"></script>

    <script src="{{asset('adminsrc/global/js/Plugin/bootstrap-datepicker.js')}}"></script>


    <script>
        $('#datepicker').datepicker({
            format: 'yyyy/mm/dd',
            autoclose: true
        });

    </script>
@stop
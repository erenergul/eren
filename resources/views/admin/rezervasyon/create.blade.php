@extends('admin.layouts.master')

@section('css')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.4/css/select2.min.css" rel="stylesheet"/>
<script>
    $(function() {
    $('#select').filterByText($('#textbox'), false);
    $("select option").click(function(){
    alert(1);
    });
    });
</script>
@endsection


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
                        {!! Form::open(['method' => 'POST', 'action' => 'RezervasyonlarController@store']) !!}
                        <div class="form-row">
                            <div class="form-group col-md-4" data-plugin="formMaterial">
                                <label for="tarih" class="">Tarih</label>
                                <input class="form-control " type="date" value="" id="" name="tarih" required>
                            </div>

                            <div class="form-group col-md-4">
                                {!! Form::label ('tur_id' ,'Tur Seç')!!}
                                {!! Form::select('tur_id', ['' => 'Tur Seçiniz'] +$tur,'',array('class'=>'form-control','id'=>'turlar' ,'required')) !!}
                            </div>
                            <div class="form-group col-md-4"></div>
                            <div class="form-group col-md-2">
                                {!! Form::label ('rezervasyon_yetiskin_pax' ,'Yetişkin Sayısı')!!}
                                {!! Form::text('rezervasyon_yetiskin_pax', $value = 1,['data-min'=>'1' , 'data-max'=>'100', 'data-stepinterval'=>'50','data-plugin' => 'TouchSpin', 'class' => 'form-control']) !!}
                            </div>
                            <div class="form-group col-md-2">
                                {!! Form::label ('rezervasyon_cocuk_pax' ,'Çocuk Sayısı')!!}
                                {!! Form::text('rezervasyon_cocuk_pax', $value = 0,['data-min'=>'0' , 'data-max'=>'100', 'data-stepinterval'=>'50','data-plugin' => 'TouchSpin', 'class' => 'form-control']) !!}
                            </div>
                            <div class="form-group col-md-2">
                                {!! Form::label ('rezervasyon_bebek_pax' ,'Bebek Sayısı')!!}
                                {!! Form::text('rezervasyon_bebek_pax', $value = 0,['data-min'=>'0' , 'data-max'=>'100', 'data-stepinterval'=>'50','data-plugin' => 'TouchSpin', 'class' => 'form-control']) !!}
                            </div>
                            <div class="form-group col-md-2">
                                {!! Form::label ('rezervasyon_ucret_pax' ,'Ücretli Ekstra Kişi Sayısı')!!}
                                {!! Form::text('rezervasyon_ucret_pax', $value = 0,['data-min'=>'0' , 'data-max'=>'100', 'data-stepinterval'=>'50','data-plugin' => 'TouchSpin', 'class' => 'form-control']) !!}
                            </div>
                            <div class="col-md-4"></div>
                            <div class="form-group col-md-4">
                                {!! Form::label ('rezervasyon_adi' ,'Müşteri Adı')!!}
                                {!! Form::text('rezervasyon_adi',null ,['placeholder' => 'Müşteri Adını Giriniz','class' => 'form-control','required']) !!}
                            </div>
                            <div class="form-group col-md-4">
                                {!! Form::label ('rezervasyon_tel' ,'Tel No') !!}
                                {!! Form::text('rezervasyon_tel',null ,['placeholder' => 'Telefon Numarasını Giriniz','class' => 'form-control']) !!}
                            </div>
                            <div class="col-md-4"></div>
                            <div class="form-group col-md-4">
                                    {!! Form::label  ('otel_id' ,'Otel Adı') !!}
                                    {{ Form::select('otel_id',$otel,null,['id'=>'otel','required','class' => 'form-control' , 'required']) }}
                            </div>
                            <div class="form-group col-md-1">
                                {!! Form::label ('rezervasyon_oda_no' ,'Oda No') !!}
                                {!! Form::text('rezervasyon_oda_no',null ,['placeholder' => 'Oda No','class' => 'form-control']) !!}
                            </div>

                            <div class="form-group col-md-3">
                                {!! Form::label ('rezervasyon_no' ,'Bilet No') !!}
                                {!! Form::text('rezervasyon_no',null ,['placeholder' => 'Bilet Numarasını Giriniz','class' => 'form-control','required']) !!}
                            </div>
                            <div class="col-md-4"></div>
                            <div class="form-group col-md-4">
                                <label for="title">Alınış Yeri:</label>
                                <select name="alinis_id" id="alinis" class="form-control" required>

                                    <option value="">Alınış Saati Seçin</option>

                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                {!! Form::label ('rehber_id' ,'Rehber Adı') !!}
                                {{ Form::select('rehber_id',$rehberler, null,['placeholder' => 'Rehber Seç' ,'class' => 'form-control','required']) }}
                            </div>
                            <div class="col-md-8"></div>
                            <div class="col-md-4"></div>
                            <div class="form-group col-md-1">
                                {!! Form::label ('rezervasyon_toplam_satis' ,'Satış Fiyatı') !!}
                                {!! Form::text('rezervasyon_toplam_satis',null ,['class' => 'form-control','required']) !!}
                            </div>
                            <div class="col-md-1">
                                {!! Form::label ('rezervasyon_toplam_satis_doviz' ,'Döviz Türü')!!}
                                {!! Form::select('rezervasyon_toplam_satis_doviz', ['TRY' => 'TRY' , 'EUR'=>'EUR','USD'=>'USD','GBP'=> 'GBP'],'',array('class'=>'form-control')) !!}
                            </div>
                            <div class="form-group col-md-1"></div>
                            <div class="form-group col-md-1">
                                {!! Form::label ('rezervasyon_kapora' ,'Kapora') !!}
                                {!! Form::text('rezervasyon_kapora',null ,['class' => 'form-control','required']) !!}
                            </div>
                            <div class="col-md-1">
                                {!! Form::label ('rezervasyon_kapora' ,'Döviz Türü')!!}
                                {!! Form::select('rezervasyon_kapora_doviz', ['TRY' => 'TRY' , 'EUR'=>'EUR','USD'=>'USD','GBP'=> 'GBP'],'',array('class'=>'form-control')) !!}

                            </div>
                            <div class="form-group col-md-1"></div>
                            <div class="form-group col-md-1">
                                {!! Form::label ('rezervasyon_rest' ,'Rest') !!}
                                {!! Form::text('rezervasyon_rest',null ,['class' => 'form-control','required']) !!}
                            </div>
                            <div class="col-md-1">
                                {!! Form::label ('rezervasyon_rest_doviz' ,'Döviz Türü')!!}
                                {!! Form::select('rezervasyon_rest_doviz', ['TRY' => 'TRY' , 'EUR'=>'EUR','USD'=>'USD','GBP'=> 'GBP'],'',array('class'=>'form-control')) !!}
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


    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.4/js/select2.min.js"></script>

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
    <script>
        $('#datepicker').datepicker({
            format: 'yyyy/mm/dd',
            autoclose: true
        });

    </script>

    <script>
        $("#otel").select2({
        })

    </script>

@stop
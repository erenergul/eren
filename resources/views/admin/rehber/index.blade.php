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
                        {!! Form::open(['method' => 'POST', 'action' => 'RehberlerController@store']) !!}

                        <div class="form-group">
                            {!! Form::label ('rehber_adi' ,'Rehber Adı') !!}
                            {!! Form::text('rehber_adi',null ,['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::submit('Rehber Ekle' , ['class' => 'btn btn-primary']) !!}
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
                    <h3 class="panel-title">Rehberler</h3>
                </header>
                <div class="panel-body">
                    <table class="table table-hover dataTable table-striped w-full" id="dataTable">
                        <thead>
                        <tr>
                            <th>Rehber Adı</th>
                            <th width="150"></th>
                        </tr>
                        </thead>
                        <tbody></tbody>

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
        </div>
    </div>





@endsection

@section('javascript')

    <script type="text/javascript" src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.js"></script>

    <script src="{{asset('adminsrc/global/vendor/datatables.net-bs4/dataTables.bootstrap4.js')}}"></script>

    <script type="text/javascript">

        $(document).ready(function () {
            $('#dataTable').DataTable({
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.10.16/i18n/Turkish.json"
                },
                processing: true,
                serverSide: true,
                ajax: '{{ route('rehber.getir')}}',
                columns: [
                    {data: "rehber_adi", name: "rehber_adi"},
                    {data: 'action', name: 'action', orderable: false, searchable: false}
                ]

            });
        });



    </script>

@endsection
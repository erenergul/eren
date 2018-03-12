@extends('admin.layouts.master')
@section('content')

    <form action="/admin/cari/gonder/{{$id}}" method="post">
        {{ csrf_field() }}

        @foreach ($errors->all() as $error)
            <div class="row">
                <div class="col-sm-12">
                    <div class="alert alert-danger">
                        {{ $error }}
                    </div>
                </div>
            </div>
        @endforeach
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
                <h2>Cari Gönder</h2>
                <hr>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12 col-md-6">
                <div class="form-group row">
                    <label for="carihesap" class="col-4 col-form-label">Hesap Seç</label>
                    <div class="col-8">
                        <select class="form-control" id="carihesap" name="carihesap">
                            @forelse ($ch as $o)
                                <option value="{{ $o->ch_id }}">{{ $o->ch_adi . ' - ' . $o->ch_doviz }}</option>
                            @empty
                                <option>Lütfen Bir Cari Hesap Ekleyin !!</option>
                            @endforelse
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 col-md-3">
                <div class="form-group row">
                    <label for="yetiskin" class="col-6 col-form-label">Yetişkin Fiyat</label>
                    <div class="col-6">
                        <input class="form-control" type="text" value="0" id="yetiskin" name="yetiskin">
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-3">
                <div class="form-group row">
                    <label for="cocuk" class="col-6 col-form-label">Çocuk Fiyat</label>
                    <div class="col-6">
                        <input class="form-control" type="text" value="0" id="cocuk" name="cocuk">
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-3">
                <div class="form-group row">
                    <label for="bebek" class="col-6 col-form-label">Bebek Fiyat</label>
                    <div class="col-6">
                        <input class="form-control" type="text" value="0" id="bebek" name="bebek">
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-3">
                <div class="form-group row">
                    <label for="ucret" class="col-6 col-form-label">Ücret Fiyat</label>
                    <div class="col-6">
                        <input class="form-control" type="text" value="0" id="ucret" name="ucret">
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12 col-md-12">
                <div class="row">
                    <div class="col-12" style="margin-top: -1rem">
                        <hr>
                    </div>
                    <div class="col-sm-12">
                        <button type="submit" class="btn btn-primary">Cari Gönder</button>
                        <input type="reset" class="btn btn-warning" value="Sıfırla">
                    </div>
                </div>
            </div>
        </div>
    </form>


@endsection

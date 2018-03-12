@extends('admin.layouts.login')

@section('content')

    <!-- Page -->
    <div class="page vertical-align text-center" data-animsition-in="fade-in" data-animsition-out="fade-out">>
        <div class="page-content vertical-align-middle animation-slide-top animation-duration-1">
            <div class="panel">
                <div class="panel-body">
                    <div class="brand">
                        <h2 class="brand-text font-size-18">TurAcenta</h2>
                    </div>

                    <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

                        <div class="form-group form-material floating{{ $errors->has('email') ? ' has-error' : '' }}" data-plugin="formMaterial">

                            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                            <label class="floating-label">E-Mail Adresiniz</label>

                            @if ($errors->has('email'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                            @endif
                        </div>

                        <div class="form-group form-material floating{{ $errors->has('password') ? ' has-error' : '' }}" data-plugin="formMaterial">

                            <input id="password" type="password" class="form-control" name="password" required>

                            <label for="password" class="floating-label">Şifreniz</label>

                            @if ($errors->has('password'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                            @endif

                        </div>

                        <div class="form-group clearfix">
                                <div class="checkbox-custom checkbox-inline checkbox-primary checkbox-lg float-left">
                                    <input type="checkbox" id="inputCheckbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                                    <label for="inputCheckbox"> Beni Hatırla</label>
                                </div>
                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                Parolamı unuttum ?
                            </a>
                        </div>

                        <div class="form-group">

                                <button type="submit" class="btn btn-primary btn-block btn-lg mt-40">
                                    Giriş
                                </button>

                            </div>

                    </form>

                </div>
            </div>

            <footer class="page-copyright page-copyright-inverse">
                <p>TurAcenta Otomasyon Sistemi</p>
                <p>© 2018. All RIGHT RESERVED.</p>
                <div class="social">
                    <a class="btn btn-icon btn-pure" href="javascript:void(0)">
                        <i class="icon bd-twitter" aria-hidden="true"></i>
                    </a>
                    <a class="btn btn-icon btn-pure" href="javascript:void(0)">
                        <i class="icon bd-facebook" aria-hidden="true"></i>
                    </a>
                    <a class="btn btn-icon btn-pure" href="javascript:void(0)">
                        <i class="icon bd-google-plus" aria-hidden="true"></i>
                    </a>
                </div>
            </footer>
        </div>
    </div>

@endsection

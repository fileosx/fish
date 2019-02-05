@extends('layouts.auth')

@section('content')
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <img class="img-responsive login-logo" alt="{{ config('app.name', 'Overview Summit') }}" src="{{ asset('images/login-logo.png') }}">
                @if (session('errorMsg'))
                    <div class="alert alert-revo" role="alert">
                        @lang(session('errorMsg'))
                    </div>
                @endif
                <form method="POST" action="{{ route('login') }}" class="login-form">
                    @csrf
                    <div class="form-group">
                        <div class="input-group {{ $errors->has('email') ? ' is-invalid' : '' }}">
                            <input type="email" name="email" id="email" value="{{ old('email') }}" placeholder="@lang('orange/auth.fields.email')" class="form-control"  autofocus>
                        </div>
                        @if ($errors->has('email'))
                            <span class="invalid-feedback" role="alert">{{ $errors->first('email') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <div class="input-group {{ $errors->has('password') ? ' is-invalid' : '' }}">
                            <input type="password" name="password" id="password" placeholder="@lang('orange/auth.fields.password')" class="form-control" >
                            @if (Route::has('password.request'))
                                <a class="btn btn-link forgot-link" href="{{ route('password.request') }}">
                                    @lang('orange/auth.login.forgotLink')
                                </a>
                            @endif
                        </div>
                        @if ($errors->has('password'))
                            <span class="invalid-feedback" role="alert">{{ $errors->first('password') }}</span>
                        @endif
                    </div>
                    <button type="submit" class="btn btn-revo full">@lang('orange/auth.login.button')</button>
                    <div class="checkbox text-center">
                        <label>
                            <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}> @lang('orange/auth.fields.remember')
                        </label>
                    </div>
                    <a class="btn-simlynk align-center" href="{{ route('register') }}">@lang("orange/auth.login.registerLink")</a>
                </form>
            </div>
        </div>
@endsection
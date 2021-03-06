@extends('layouts.auth')

@section('content')
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <img class="img-responsive login-logo" alt="{{ config('app.name', 'Overview Summit') }}" src="{{ asset('images/login-logo.png') }}">

                <form method="POST" action="{{ route('password.update') }}" class="login-form">
                    @csrf
                    <input type="hidden" name="token" value="{{ $token }}">
                    <div class="form-group">
                        <div class="input-group {{ $errors->has('email') ? ' is-invalid' : '' }}">
                            <input type="email" name="email" id="email" value="{{ $email ?? old('email') }}" placeholder="@lang('orange/auth.fields.email')" class="form-control" autofocus>
                        </div>
                        @if ($errors->has('email'))
                            <span class="invalid-feedback" role="alert">{{ $errors->first('email') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <div class="input-group {{ $errors->has('password') ? ' is-invalid' : '' }}">
                            <input type="password" name="password" id="password" placeholder="@lang('orange/auth.fields.password')" class="form-control">
                        </div>
                        @if ($errors->has('password'))
                            <span class="invalid-feedback" role="alert">{{ $errors->first('password') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <div class="input-group {{ $errors->has('password-confirm') ? ' is-invalid' : '' }}">
                            <input type="password" name="password_confirmation" id="password-confirm" placeholder="@lang('orange/auth.fields.passwordConfirm')" class="form-control">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-revo full">@lang('orange/auth.forgot.resetTitle')</button>
                </form>
            </div>
        </div>
@endsection
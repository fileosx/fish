@extends('layouts.auth')

@section('content')
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <img class="img-responsive login-logo" alt="{{ config('app.name', 'Overview Summit') }}" src="{{ asset('images/login-logo.png') }}">

                @if (session('status'))
                    <div class="alert alert-revo" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('password.email') }}" class="login-form">
                    @csrf
                    <div class="form-group">
                        <div class="input-group {{ $errors->has('email') ? ' is-invalid' : '' }}">
                            <input type="email" name="email" id="email" value="{{ old('email') }}" placeholder="@lang('orange/auth.fields.email')" class="form-control" >
                        </div>
                        @if ($errors->has('email'))
                            <span class="invalid-feedback" role="alert"> {{ $errors->first('email') }} </span>
                        @endif
                    </div>
                    <button type="submit" class="btn btn-revo full">@lang('orange/auth.forgot.button')</button>
                    <a class="btn-simlynk align-center" href="{{ route('login') }}">@lang("orange/auth.login.backLink")</a>
                </form>
            </div>
        </div>
@endsection
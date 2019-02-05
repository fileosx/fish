@extends('layouts.auth')

@section('content')
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <img class="img-responsive login-logo" alt="{{ config('app.name', 'Overview Summit') }}" src="{{ asset('images/login-logo.png') }}">

                @if (session('resent'))
                    <div class="alert alert-revo" role="alert">
                        @lang('orange/auth.register.verifyNotification')
                    </div>
                @endif

                <div class="box-info">
                    <h3>@lang('orange/auth.register.verifyTitle')</h3><br />
                    @lang('orange/auth.register.verifyHint')
                    <br /><br />
                    @lang('orange/auth.register.verifyLinkIntro'), <br /><a href="{{ route('verification.resend') }}" class="btn-simlynk-inline align-center">@lang('orange/auth.register.verifyLinkClick')</a>.<br /><br />
                </div>
            </div>
        </div>
@endsection
@extends('layouts.auth')

@section('content')
        <div class="row">
            <div class="col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1">
                <img class="img-responsive login-logo" alt="{{ config('app.name', 'Overview Summit') }}" src="{{ asset('images/login-logo.png') }}">
                <form method="POST" action="{{ route('register') }}" class="login-form">
                    @csrf

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <div class="input-group {{ $errors->has('enterprise') ? ' is-invalid' : '' }}">
                                    <input type="text" name="enterprise" id="enterprise" value="{{ old('enterprise') }}" placeholder="@lang('orange/auth.fields.enterprise')" class="form-control"  autofocus>
                                </div>
                                @if ($errors->has('enterprise'))
                                    <span class="invalid-feedback" role="alert">{{ $errors->first('enterprise') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group isPicker {{ $errors->has('territory') ? ' is-invalid' : '' }}">
                                <select class="selectpicker" name="territory" id="territory" title="@lang('orange/auth.fields.territory')" >
                                    <option value='CAT' @if (old('territory') == "CAT") {{ 'selected' }} @endif data-content="<span class='hideOnDrop'>@lang('orange/auth.fields.territory'):</span> Cataluña">{{ 'Cataluña' }}</option>
                                    <option value='CAT' @if (old('territory') == "NOR") {{ 'selected' }} @endif data-content="<span class='hideOnDrop'>@lang('orange/auth.fields.territory'):</span> Norte">{{ 'Norte' }}</option>
                                    <option value='CNT' @if (old('territory') == "CNT") {{ 'selected' }} @endif data-content="<span class='hideOnDrop'>@lang('orange/auth.fields.territory'):</span> Centro">{{ 'Centro' }}</option>
                                    <option value='SUR' @if (old('territory') == "SUR") {{ 'selected' }} @endif data-content="<span class='hideOnDrop'>@lang('orange/auth.fields.territory'):</span> Sur">{{ 'Sur' }}</option>
                                </select>

                                @if ($errors->has('territory'))
                                    <span class="invalid-feedback" role="alert">{{ $errors->first('territory') }}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <div class="input-group {{ $errors->has('name') ? ' is-invalid' : '' }}">
                                    <input type="text" name="name" id="name" value="{{ old('name') }}" placeholder="@lang('orange/auth.fields.name')" class="form-control" >
                                </div>
                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">{{ $errors->first('name') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <div class="input-group {{ $errors->has('firstsurname') ? ' is-invalid' : '' }}">
                                    <input type="text" name="firstsurname" id="firstsurname" value="{{ old('firstsurname') }}" placeholder="@lang('orange/auth.fields.surname1')" class="form-control "  >
                                </div>
                                @if ($errors->has('firstsurname'))
                                    <span class="invalid-feedback" role="alert">{{ $errors->first('firstsurname') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <div class="input-group {{ $errors->has('secondsurname') ? ' is-invalid' : '' }}">
                                    <input type="text" name="secondsurname" id="secondsurname" value="{{ old('secondsurname') }}" placeholder="@lang('orange/auth.fields.surname2')" class="form-control"  >
                                </div>
                                @if ($errors->has('secondsurname'))
                                    <span class="invalid-feedback" role="alert">{{ $errors->first('secondsurname') }}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <div class="input-group {{ $errors->has('department') ? ' is-invalid' : '' }}">
                                    <input type="text" name="department" id="department" value="{{ old('department') }}" placeholder="@lang('orange/auth.fields.department')" class="form-control"  >
                                </div>
                                @if ($errors->has('department'))
                                    <span class="invalid-feedback" role="alert">{{ $errors->first('department') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <div class="input-group {{ $errors->has('position') ? ' is-invalid' : '' }}">
                                    <input type="text" name="position" id="position" value="{{ old('position') }}" placeholder="@lang('orange/auth.fields.position')" class="form-control"  >
                                </div>
                                @if ($errors->has('position'))
                                    <span class="invalid-feedback" role="alert">{{ $errors->first('position') }}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <div class="input-group {{ $errors->has('email') ? ' is-invalid' : '' }}">
                                    <input type="email" name="email" id="email" value="{{ old('email') }}" placeholder="@lang('orange/auth.fields.email')" class="form-control"  >
                                </div>
                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">{{ $errors->first('email') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <div class="input-group {{ $errors->has('phone') ? ' is-invalid' : '' }}">
                                    <input type="phone" name="phone" id="phone" value="{{ old('phone') }}" placeholder="@lang('orange/auth.fields.phone')" class="form-control"  >
                                </div>
                                @if ($errors->has('phone'))
                                    <span class="invalid-feedback" role="alert">{{ $errors->first('phone') }}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <div class="input-group {{ $errors->has('password') ? ' is-invalid' : '' }}">
                                    <input type="password" name="password" id="password" placeholder="@lang('orange/auth.fields.password')" class="form-control" >
                                </div>
                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">{{ $errors->first('password') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <div class="input-group {{ $errors->has('password') ? ' is-invalid' : '' }}">
                                    <input type="password" name="password_confirmation" id="password-confirm" placeholder="@lang('orange/auth.fields.passwordConfirm')" class="form-control" >
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <button type="submit" class="btn btn-revo register">@lang('orange/auth.register.button')</button>
                            <a class="btn btn-simlynk align-center" href="{{ route('login') }}">@lang("orange/auth.register.loginLink")</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
@endsection

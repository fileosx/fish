@extends('layouts.app')

@section('content')
    <form method="POST" action="{{ route('lead.store') }}" class="">
        @csrf

        <div id="fullpage">

            <div class="section">
                <div class="touch">
                    <div class="touch-hand"></div>
                    <div class="touch-arrows"></div>
                </div>
                <div class="slide">
                    @if (session('status'))
                        <div class="alert alert-revo" role="alert">
                            @lang(session('status'))
                        </div>
                    @endif
                    <div class="new-lead-wrap"> <h1 class="text-center font-white newLead forms"><img src="{{ asset('images/nuevo-lead.png') }}" /></h1></div>
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-6 col-md-offset-3">
                                <div class="form-group">
                                    <div class="input-group {{ $errors->has('company') ? ' is-invalid' : '' }}">
                                        <input type="text" name="company" id="company" value="{{ old('company') }}" placeholder="@lang('Nombre comercial del local')" class="form-control"  autofocus>
                                    </div>
                                    @if ($errors->has('company'))
                                        <span class="invalid-feedback" role="alert">{{ $errors->first('company') }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <div class="input-group {{ $errors->has('name') ? ' is-invalid' : '' }}">
                                        <input type="text" name="name" id="name" value="{{ old('name') }}" placeholder="@lang('Nombre y apellidos del cliente')" class="form-control" >
                                    </div>
                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback" role="alert">{{ $errors->first('name') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <div class="input-group {{ $errors->has('email') ? ' is-invalid' : '' }}">
                                        <input type="email" name="email" id="email" value="{{ old('email') }}" placeholder="@lang('Email')" class="form-control" >
                                    </div>
                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">{{ $errors->first('email') }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <div class="input-group {{ $errors->has('phone') ? ' is-invalid' : '' }}">
                                        <input type="text" name="phone" id="phone" value="{{ old('phone') }}" placeholder="@lang('Teléfono')" class="form-control" >
                                    </div>
                                    @if ($errors->has('phone'))
                                        <span class="invalid-feedback" role="alert">{{ $errors->first('phone') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <div class="input-group {{ $errors->has('city') ? ' is-invalid' : '' }}">
                                        <input type="text" name="city" id="city" value="{{ old('city') }}" placeholder="@lang('Población')" class="form-control" >
                                    </div>
                                    @if ($errors->has('city'))
                                        <span class="invalid-feedback" role="alert">{{ $errors->first('city') }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group isPicker {{ $errors->has('type') ? ' is-invalid' : '' }}">
                                    <select class="selectpicker" name="type" id="type" title="@lang('Tipología')">
                                        @foreach($lead_types as $type)
                                            <option value='{{$type->type_id}}'
                                                    @if (old('type') == $type->type_id)
                                                    {{ 'selected' }}
                                                    @endif
                                                    data-content="<span class='hideOnDrop'>@lang('Tipología'): </span> {{ $type->type }}"
                                            >
                                                {{ $type->type }}
                                            </option>
                                        @endforeach
                                    </select>

                                    @if ($errors->has('type'))
                                        <span class="invalid-feedback" role="alert">{{ $errors->first('type') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <input type="hidden" name="oldSegment" id="oldSegment" value="{{old('segment')}}" />
                                <div class="form-group isPicker {{ $errors->has('segment') ? ' is-invalid' : '' }}">
                                    <select class="selectpicker" name="segment" id="segment" title ="@lang('Segmentación')"></select>

                                    @if ($errors->has('segment'))
                                        <span class="invalid-feedback" role="alert">{{ $errors->first('segment') }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="slide bool-fields">
                    <div class="container segment-required">
                        <div class="row">
                            <div class="col-sm-6 col-md-offset-3">
                                Debe seleccionarse una tipología y segmentación para poder crear el Lead
                            </div>
                        </div>
                    </div>
                    <div class="container XEF-XS">
                        <div class="row">
                            <div class="col-sm-8">
                                <div class="form-group">
                                    <div class="input-group {{ $errors->has('owner_qty') ? ' is-invalid' : '' }}">
                                        <input type="text" name="owner_qty" id="owner_qty" value="{{ old('owner_qty') }}" placeholder="@lang('¿Cuantos locales tiene el propietario?')" class="form-control" >
                                    </div>
                                    @if ($errors->has('owner_qty'))
                                        <span class="invalid-feedback" role="alert">{{ $errors->first('owner_qty') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <div class="input-group {{ $errors->has('capacity') ? ' is-invalid' : '' }}">
                                        <input type="text" name="capacity" id="capacity" value="{{ old('capacity') }}" placeholder="@lang('Aforo local (carta, no eventos)')" class="form-control" >
                                    </div>
                                    @if ($errors->has('capacity'))
                                        <span class="invalid-feedback" role="alert">{{ $errors->first('capacity') }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-8">
                                <div class="form-group isPicker {{ $errors->has('external_pos') ? ' is-invalid' : '' }}">
                                    <select class="selectpicker" name="external_pos" id="external_pos" title="@lang('¿Ha contactado con central y/o se puede trabajar con tpv externo?')">
                                        @foreach($lead_external_pos as $type)
                                            <option value='{{$type->id}}'
                                                    @if (old('external_pos') == $type->id)
                                                    {{ 'selected' }}
                                                    @endif
                                                    data-content="<span class='hideOnDrop'>@lang('¿Ha contactado con central y/o se puede trabajar con tpv externo?'): </span> {{ $type->name }}"
                                            >
                                                {{ $type->name }}
                                            </option>
                                        @endforeach
                                    </select>

                                    @if ($errors->has('external_pos'))
                                        <span class="invalid-feedback" role="alert">{{ $errors->first('external_pos') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group isPicker {{ $errors->has('pos_type') ? ' is-invalid' : '' }}">
                                    <select class="selectpicker" name="pos_type" id="pos_type" title="@lang('TPV actual')">
                                        @foreach($lead_pos_types as $type)
                                            <option value='{{$type->id}}'
                                                    @if (old('pos_type') == $type->id)
                                                    {{ 'selected' }}
                                                    @endif
                                                    data-content="<span class='hideOnDrop'>@lang('TPV actual'): </span> {{ $type->name }}"
                                            >
                                                {{ $type->name }}
                                            </option>
                                        @endforeach
                                    </select>

                                    @if ($errors->has('pos_type'))
                                        <span class="invalid-feedback" role="alert">{{ $errors->first('pos_type') }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-8">
                                <div class="form-group isPicker {{ $errors->has('screens') ? ' is-invalid' : '' }}">
                                    <select class="selectpicker" name="screens" id="screens" title="@lang('¿Desea trabajar con pantallas en cocina?')">
                                        @foreach($lead_screens as $type)
                                            <option value='{{$type->id}}'
                                                    @if (old('screens') == $type->id)
                                                    {{ 'selected' }}
                                                    @endif
                                                    data-content="<span class='hideOnDrop'>@lang('¿Desea trabajar con pantallas en cocina?'): </span> {{ $type->name }}"
                                            >
                                                {{ $type->name }}
                                            </option>
                                        @endforeach
                                    </select>

                                    @if ($errors->has('screens'))
                                        <span class="invalid-feedback" role="alert">{{ $errors->first('screens') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <div class="input-group {{ $errors->has('screens_qty') ? ' is-invalid' : '' }}">
                                        <input type="text" name="screens_qty" id="screens_qty" value="{{ old('screens_qty') }}" placeholder="@lang('Nº de pantallas')" class="form-control" disabled>
                                    </div>
                                    @if ($errors->has('screens_qty'))
                                        <span class="invalid-feedback" role="alert">{{ $errors->first('screens_qty') }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <div class="input-group {{ $errors->has('critical') ? ' is-invalid' : '' }}">
                                        <input type="text" name="critical" id="critical" value="{{ old('critical') }}" placeholder="@lang('Nº camareros entorno crítico')" class="form-control" >
                                    </div>
                                    @if ($errors->has('critical'))
                                        <span class="invalid-feedback" role="alert">{{ $errors->first('critical') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <div class="input-group {{ $errors->has('cash_register') ? ' is-invalid' : '' }}">
                                        <input type="text" name="cash_register" id="cash_register" value="{{ old('cash_register') }}" placeholder="@lang('Nº de cajas de cobro')" class="form-control" >
                                    </div>
                                    @if ($errors->has('cash_register'))
                                        <span class="invalid-feedback" role="alert">{{ $errors->first('cash_register') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <div class="input-group {{ $errors->has('printers') ? ' is-invalid' : '' }}">
                                        <input type="text" name="printers" id="printers" value="{{ old('printers') }}" placeholder="@lang('Nº de impresoras en cocina')" class="form-control" >
                                    </div>
                                    @if ($errors->has('printers'))
                                        <span class="invalid-feedback" role="alert">{{ $errors->first('printers') }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group isPicker {{ $errors->has('type_general') ? ' is-invalid' : '' }}">
                                    <select class="selectpicker" name="type_general" id="type_general" title="@lang('Tipología general')">
                                        @foreach($lead_xef_types_general as $type)
                                            <option value='{{$type->id}}'
                                                    @if (old('type_general') == $type->id)
                                                    {{ 'selected' }}
                                                    @endif
                                                    data-content="<span class='hideOnDrop'>@lang('Tipología general'): </span> {{ $type->name }}"
                                            >
                                                {{ $type->name }}
                                            </option>
                                        @endforeach
                                    </select>

                                    @if ($errors->has('type_general'))
                                        <span class="invalid-feedback" role="alert">{{ $errors->first('type_general') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group isPicker {{ $errors->has('type_specific') ? ' is-invalid' : '' }}">
                                    <select class="selectpicker" name="type_specific" id="type_specific" title="@lang('Tipología específica')">
                                        @foreach($lead_xef_types_specific as $type)
                                            <option value='{{$type->id}}'
                                                    @if (old('type_specific') == $type->id)
                                                    {{ 'selected' }}
                                                    @endif
                                                    data-content="<span class='hideOnDrop'>@lang('Tipología específica'): </span> {{ $type->name }}"
                                            >
                                                {{ $type->name }}
                                            </option>
                                        @endforeach
                                    </select>

                                    @if ($errors->has('type_specific'))
                                        <span class="invalid-feedback" role="alert">{{ $errors->first('type_specific') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group isPicker {{ $errors->has('franchise') ? ' is-invalid' : '' }}">
                                    <select class="selectpicker" name="franchise" id="franchise" title="@lang('¿Franquicia?')">
                                        @foreach($lead_franchise as $type)
                                            <option value='{{$type->id}}'
                                                    @if (old('franchise') == $type->id)
                                                    {{ 'selected' }}
                                                    @endif
                                                    data-content="<span class='hideOnDrop'>@lang('¿Franquicia?'): </span> {{ $type->name }}"
                                            >
                                                {{ $type->name }}
                                            </option>
                                        @endforeach
                                    </select>

                                    @if ($errors->has('franchise'))
                                        <span class="invalid-feedback" role="alert">{{ $errors->first('franchise') }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="container XEF-MD XEF-LG">
                        <div class="row">
                            <div class="col-sm-9">
                                <div class="form-group isPicker {{ $errors->has('xef_soft_stock') ? ' is-invalid' : '' }}">
                                    <select class="selectpicker" name="xef_soft_stock" id="xef_soft_stock" title="@lang('¿Trabaja con algún software de almacén y compras?')">
                                        @foreach($lead_xef_soft_stock as $type)
                                            <option value='{{$type->id}}'
                                                    @if (old('xef_soft_stock') == $type->id)
                                                    {{ 'selected' }}
                                                    @endif
                                                    data-content="<span class='hideOnDrop'>@lang('¿Trabaja con algún software de almacén y compras?'): </span> {{ $type->name }}"
                                            >
                                                {{ $type->name }}
                                            </option>
                                        @endforeach
                                        <option value='-1' @if (old('xef_soft_stock') == -1) {{ 'selected' }} @endif data-content="<span class='hideOnDrop'>@lang('¿Trabaja con algún software de almacén y compras?'): </span> @lang('Otro')"> @lang('Otro') </option>
                                    </select>

                                    @if ($errors->has('xef_soft_stock'))
                                        <span class="invalid-feedback" role="alert">{{ $errors->first('xef_soft_stock') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <div class="input-group {{ $errors->has('xef_soft_stock_other') ? ' is-invalid' : '' }}">
                                        <input type="text" name="xef_soft_stock_other" id="xef_soft_stock_other" value="{{ old('xef_soft_stock_other') }}" placeholder="@lang('Especificar cual')" class="form-control"
                                               @if (old('xef_soft_stock') != -1)
                                               {{ 'disabled' }}
                                               @endif
                                               >
                                    </div>
                                    @if ($errors->has('xef_soft_stock_other'))
                                        <span class="invalid-feedback" role="alert">{{ $errors->first('xef_soft_stock_other') }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-9">
                                <div class="form-group isPicker {{ $errors->has('xef_soft_staff') ? ' is-invalid' : '' }}">
                                    <select class="selectpicker" name="xef_soft_staff" id="xef_soft_staff" title="@lang('¿Trabaja con algún software de gestión de personal?')">
                                        @foreach($lead_xef_soft_staff as $type)
                                            <option value='{{$type->id}}'
                                                    @if (old('xef_soft_staff') == $type->id)
                                                    {{ 'selected' }}
                                                    @endif
                                                    data-content="<span class='hideOnDrop'>@lang('¿Trabaja con algún software de gestión de personal?'): </span> {{ $type->name }}"
                                            >
                                                {{ $type->name }}
                                            </option>
                                        @endforeach
                                        <option value='-1' @if (old('xef_soft_staff') == -1) {{ 'selected' }} @endif data-content="<span class='hideOnDrop'>@lang('¿Trabaja con algún software de gestión de personal?'): </span> @lang('Otro')"> @lang('Otro') </option>
                                    </select>

                                    @if ($errors->has('xef_soft_staff'))
                                        <span class="invalid-feedback" role="alert">{{ $errors->first('xef_soft_staff') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <div class="input-group {{ $errors->has('xef_soft_staff_other') ? ' is-invalid' : '' }}">
                                        <input type="text" name="xef_soft_staff_other" id="xef_soft_staff_other" value="{{ old('xef_soft_staff_other') }}" placeholder="@lang('Especificar cual')" class="form-control"
                                                @if (old('xef_soft_staff') != -1)
                                                    {{ 'disabled' }}
                                                @endif
                                        >
                                    </div>
                                    @if ($errors->has('xef_soft_staff_other'))
                                        <span class="invalid-feedback" role="alert">{{ $errors->first('xef_soft_staff_other') }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-9">
                                <div class="form-group isPicker {{ $errors->has('xef_soft_book') ? ' is-invalid' : '' }}">
                                    <select class="selectpicker" name="xef_soft_book" id="xef_soft_book" title="@lang('¿Trabaja con algún software de reservas?')">
                                        @foreach($lead_xef_soft_book as $type)
                                            <option value='{{$type->id}}'
                                                    @if (old('xef_soft_book') == $type->id)
                                                    {{ 'selected' }}
                                                    @endif
                                                    data-content="<span class='hideOnDrop'>@lang('¿Trabaja con algún software de reservas?'): </span> {{ $type->name }}"
                                            >
                                                {{ $type->name }}
                                            </option>
                                        @endforeach
                                        <option value='-1' @if (old('xef_soft_book') == -1) {{ 'selected' }} @endif data-content="<span class='hideOnDrop'>@lang('¿Trabaja con algún software de reservas?'): </span> @lang('Otro')"> @lang('Otro') </option>
                                    </select>

                                    @if ($errors->has('xef_soft_book'))
                                        <span class="invalid-feedback" role="alert">{{ $errors->first('xef_soft_book') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <div class="input-group {{ $errors->has('xef_soft_book_other') ? ' is-invalid' : '' }}">
                                        <input type="text" name="xef_soft_book_other" id="xef_soft_book_other" value="{{ old('xef_soft_book_other') }}" placeholder="@lang('Especificar cual')" class="form-control"
                                                @if (old('xef_soft_book') != -1)
                                                {{ 'disabled' }}
                                                @endif
                                        >
                                    </div>
                                    @if ($errors->has('xef_soft_book_other'))
                                        <span class="invalid-feedback" role="alert">{{ $errors->first('xef_soft_book_other') }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-9">
                                <div class="form-group isPicker {{ $errors->has('xef_soft_erp') ? ' is-invalid' : '' }}">
                                    <select class="selectpicker" name="xef_soft_erp" id="xef_soft_erp" title="@lang('¿ERP actual?')">
                                        @foreach($lead_xef_soft_erp as $type)
                                            <option value='{{$type->id}}'
                                                    @if (old('xef_soft_erp') == $type->id)
                                                    {{ 'selected' }}
                                                    @endif
                                                    data-content="<span class='hideOnDrop'>@lang('¿ERP actual?'): </span> {{ $type->name }}"
                                            >
                                                {{ $type->name }}
                                            </option>
                                        @endforeach
                                        <option value='-1' @if (old('xef_soft_erp') == -1) {{ 'selected' }} @endif data-content="<span class='hideOnDrop'>@lang('¿ERP actual?'): </span> @lang('Otro')"> @lang('Otro') </option>
                                    </select>

                                    @if ($errors->has('xef_soft_erp'))
                                        <span class="invalid-feedback" role="alert">{{ $errors->first('xef_soft_erp') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <div class="input-group {{ $errors->has('xef_soft_erp_other') ? ' is-invalid' : '' }}">
                                        <input type="text" name="xef_soft_erp_other" id="xef_soft_erp_other" value="{{ old('xef_soft_erp_other') }}" placeholder="@lang('Especificar cual')" class="form-control"
                                                @if (old('xef_soft_erp') != -1)
                                                    {{ 'disabled' }}
                                                @endif
                                        >
                                    </div>
                                    @if ($errors->has('xef_soft_erp_other'))
                                        <span class="invalid-feedback" role="alert">{{ $errors->first('xef_soft_erp_other') }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="container submitContainer">
                        <div class="row">
                            <div class="col-sm-12">
                                <button type="submit" class="btn btn-revo">@lang('REGISTRAR LEAD')</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>

@endsection

@extends('layouts.app')

@section('content')
    <div id="fullpage">
        <div class="section" style="background: transparent!important">
            <img src="{{ asset('images/doing.png') }}" class="doing-channel">
            <div class="new-lead-wrap">
                <a href="{{route('lead.create')}}">
                    <h1 class="text-center font-white newLead">
                        LEAD
                        <img src="{{ asset('images/nuevo-lead.png') }}" />
                    </h1>
                </a>
            </div>
        </div>
    </div>
@endsection

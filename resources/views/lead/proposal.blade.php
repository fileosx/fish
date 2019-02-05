@extends('layouts.app')

@section('content')
        <div id="fullpage">
            <div class="section">
                <div class="container">
                    <img src="{{ asset('images/revolution.png') }}" class="doing-revolution">
                    <div class="owl-carousel owl-theme">
                        @foreach($proposals as $block)
                            <div class="item">
                                <img src="{{ asset('images/nuevo-lead.png') }}" class="plus" />
                                <div class="product">
                                    <img alt="{{ $block->name }}" src="{{ $block->media }}" />
                                    <div class="product-name">{{ $block->name }}</div>
                                    <div class="product-description">{{ $block->description }}</div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="touch">
                        <div class="touch-hand"></div>
                        <div class="touch-arrows"></div>
                    </div>
                </div>
            </div>
        </div>
@endsection

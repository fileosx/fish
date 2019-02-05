<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    @include("layouts.partials.header.head")
    <body>
        @include("layouts.partials.loaders.preloader")
        <div id="wrap" class="boxed ">
            <div class="grey-bg revo-bg">
                <div class="fixed-content">
                    <div class="header-platform">
                        <div class="orange"></div>
                        <div class="text-platform">
                            <div class="logo-2">
                                <a href="{{ route("home") }}" class="clearfix">
                                    <img src="http://fish.test/images/logo-over.png" class="logo-img" alt="Logo">
                                    Sales Platform
                                </a>
                                <div class="text-sync">Sintonizando el canal</div>
                            </div>
                        </div>
                    </div>
                    <div class="revo-ball"></div>

                </div>
                @include("layouts.partials.header.header")
                @yield("content")
            </div>
        </div>
        @include("layouts.partials.footer.footer-scripts")
    </body>
</html>
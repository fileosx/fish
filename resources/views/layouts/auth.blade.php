<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    @include("layouts.partials.header.head")
    <body class="auth">
        @include("layouts.partials.loaders.preloader")
        <div class="gradient">
            <div class="container login-container">
                @yield("content")
                <footer id="footer" class="text-center">
                    <a href="https://revo.works/es" target="_blank">&copy; REVO SYSTEMS <?=date("Y")?></a>
                </footer>
                @include("layouts.partials.footer.footer-scripts")
            </div>
        </div>
    </body>
</html>
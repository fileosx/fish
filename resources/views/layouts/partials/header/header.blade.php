<header id="nav" class="header header-1 black-header mobile-no-transparent">
    <div class="header-wrapper">
        <div class="container-m-30 clearfix">
            <div class="logo-row">
                <div class="logo-container-2">
                    <div class="logo-2">
                        <a href="index.html" class="clearfix">
                            <img src="{{ asset('images/logo-over.png') }}" class="logo-img" alt="Logo">
                        </a>
                    </div>
                </div>
                <div class="menu-btn-respons-container">
                    <button type="button" class="navbar-toggle btn-navbar collapsed" data-toggle="collapse" data-target="#main-menu .navbar-collapse">
                        <span aria-hidden="true" class="icon_menu hamb-mob-icon"></span>
                    </button>
                </div>
            </div>
        </div>
        <div class="main-menu-container">
            <div class="container-m-30 clearfix">
                <div id="main-menu">
                    <div class="navbar navbar-default" role="navigation">
                        @include("layouts.partials.header.navigation")
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
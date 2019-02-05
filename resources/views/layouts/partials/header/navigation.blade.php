<nav class="collapse collapsing navbar-collapse right-1024">
    <ul class="nav navbar-nav">
        <!--<li>
            <div class="logo-2"  style="margin-right: 20px;">
                <a href="index.html" class="clearfix">
                    <img src="{{ asset('images/logo-over.png') }}" class="logo-img" alt="Logo">
                </a>
            </div>
        </li>-->
        <li class="parent current">
            <a href="{{ route("home") }}" class="smooth-scroll"><div class="main-menu-title">INICIO</div></a>
        </li>
        <li class="parent">
            <a href="#configurar" class="smooth-scroll"><div class="main-menu-title">REVO</div></a>
        </li>
        <li class="parent">
            <a href="#revoxef" class="smooth-scroll"><div class="main-menu-title">CONTACTO</div></a>
        </li>
        <li id="menu-contact-info-big" class="parent megamenu">
            <a href="#contactar"  class="smooth-scroll"><div class="main-menu-title">RECURSOS</div></a>
        </li>
        <li id="menu-contact-info-big" class="parent megamenu">
            <a href="#contactar"  class="smooth-scroll"><div class="main-menu-title">SOPORTE</div></a>
        </li>
        <li id="menu-contact-info-big" class="parent megamenu">
            <a href="{{ route("lead.create") }}"  class="smooth-scroll"><div class="main-menu-title">+LEAD</div></a>
        </li>
        <li id="menu-contact-info-big" class="parent megamenu">
            <a href="#contactar"  class="smooth-scroll"><div class="main-menu-title">CRM</div></a>
        </li>
    </ul>
</nav>
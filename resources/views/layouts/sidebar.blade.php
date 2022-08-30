<aside id="sidebar-wrapper">
    <div class="sidebar-brand">
        <img class="navbar-brand-full app-header-logo" src="{{ asset('images/logo_negro.png') }}" width="45px"
             alt="Infyom Logo">
        <a style="font-size: 1.5em;" href="{{ url('home') }}">SINBA</a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
        <a href="{{ url('/') }}" class="small-sidebar-text">
            <img class="navbar-brand-full" src="{{ asset('img/logo.png') }}" width="45px" alt=""/>
        </a>
    </div>
    <ul class="sidebar-menu">
        @include('layouts.menu')
    </ul>
</aside>

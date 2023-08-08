@php
    function check($route)
    {
        if (Route::current()->uri == $route) {
            return 'active';
        }
    }
@endphp
@php
    function show($route)
    {
        if (Route::current()->uri == $route) {
            return 'menu-open';
        }
    }
@endphp
<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="" class="app-brand-link">
            <div class="bungkus" style="height: 47px">
                <img src="{{ url('public/app') }}/images/politap.png" class="brand-image img-circle elevation-3"style="opacity: .8; height: 100%;">                
            </div>
            <span class="app-brand-text demo menu-text fw-bolder ms-2" style="text-transform: uppercase">SIJALA</span>
        </a>
        <a href="" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>
    <div class="menu-inner-shadow"></div>
    <ul class="menu-inner py-1">
        <!-- Dashboard -->
        <li class="menu-item {{ check('admin/beranda') }}">
            <a href="{{ url('admin/beranda') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Beranda</div>
            </a>
        </li>
        <!-- Layouts -->
        <li class="menu-item {{ check('admin/laboratorium') }} {{ check('admin/alat') }}">
            <a href="" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-layout"></i>
                <div data-i18n="Layouts">Data</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item {{ check('admin/laboratorium') }}">
                    <a href="{{ url('admin/laboratorium') }}" layouts-without-menu.html
                        class="menu-link">
                        <div data-i18n="Without menu">Data Laboratorium</div>
                    </a>
                </li>
            </ul>
            <ul class="menu-sub">
                <li class="menu-item {{ check('admin/alat') }}">
                    <a href="{{ url('admin/alat') }}" layouts-without-menu.html class="menu-link">
                        <div data-i18n="Without menu">Alat</div>
                    </a>
                </li>
            </ul>
        </li>
        <li class="menu-item {{ check('admin/mahasiswa') }} {{ check('admin/admin') }} {{ check('admin/kalab') }}">
            <a href="" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-user"></i>
                <div data-i18n="Layouts">Akses User</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item {{ check('admin/mahasiswa') }}">
                    <a href="{{ url('admin/mahasiswa') }}" layouts-without-menu.html
                        class="menu-link">
                        <div data-i18n="Without menu">Mahasiswa</div>
                    </a>
                </li>
            </ul>
            <ul class="menu-sub">
                <li class="menu-item {{ check('admin/admin') }}">
                    <a href="{{ url('admin/admin') }}" layouts-without-menu.html class="menu-link">
                        <div data-i18n="Without menu">Admin</div>
                    </a>
                </li>
            </ul>
            <ul class="menu-sub">
                <li class="menu-item {{ check('admin/kalab') }}">
                    <a href="{{ url('admin/kalab') }}" layouts-without-menu.html class="menu-link">
                        <div data-i18n="Without menu">Kalab</div>
                    </a>
                </li>
            </ul>
        </li>
        <li class="menu-item {{ check('admin/peminjaman_lab') }} {{ check('admin/peminjaman_alat') }} {{ check('admin/keluhan') }}">
            <a href="" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-clipboard"></i>
                <div data-i18n="Layouts">Peminjaman</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item  {{ check('admin/peminjaman_lab') }}">
                    <a href="{{ url('admin/peminjaman_lab') }}" layouts-without-menu.html
                        class="menu-link">
                        <div data-i18n="Without menu">Peminjaman Lab</div>
                    </a>
                </li>
            </ul>
            <ul class="menu-sub">
                <li class="menu-item {{ check('admin/peminjaman_alat') }}">
                    <a href="{{ url('admin/peminjaman_alat') }}" layouts-without-menu.html class="menu-link">
                        <div data-i18n="Without menu">Peminjaman Alat</div>
                    </a>
                </li>
            </ul>
            <ul class="menu-sub">
                <li class="menu-item {{ check('admin/keluhan') }}">
                    <a href="{{ url('admin/keluhan') }}" layouts-without-menu.html class="menu-link">
                        <div data-i18n="Without menu">Keluhan</div>
                    </a>
                </li>
            </ul>
        </li>
    </ul>
</aside>

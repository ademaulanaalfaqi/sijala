@php
    function show($route)
    {
        if (Route::current()->uri == $route) {
            return 'active';
        }
    }
@endphp
<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="" class="app-brand-link">
            <div class="bungkus" style="height: 47px">
                <img src="{{ url('public/app') }}/images/politap.png"
                    class="brand-image img-circle elevation-3"style="opacity: .8; height: 100%;">
            </div>
            <span class="app-brand-text demo menu-text fw-bolder ms-2" style="text-transform: uppercase">SIJALA</span>
        </a>
        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>
    <div class="menu-inner-shadow"></div>
    <ul class="menu-inner py-1">
        <!-- Dashboard -->
        <li class="menu-item {{ show('mahasiswa/beranda_mahasiswa') }}">
            <a href="{{ url('mahasiswa/beranda_mahasiswa') }}" class="menu-link ">
                <i class="menu-icon tf-icons fa fa-home"></i>
                <div data-i18n="Analytics">Beranda</div>
            </a>
        </li>
        <!-- Layouts -->
        <li class="menu-item {{ show('mahasiswa/peminjaman_mahasiswa') }}">
            <a href="{{ url('mahasiswa/peminjaman_mahasiswa') }}" layouts-without-menu.html class="menu-link ">
                <i class="menu-icon tf-icons fa fa-desktop"></i>
                <div data-i18n="Without menu">Peminjaman Lab</div>
            </a>
        </li>
        <li class="menu-item {{ show('mahasiswa/peminjaman_alatmahasiswa') }}">
            <a href="{{ url('mahasiswa/peminjaman_alatmahasiswa') }}" layouts-without-menu.html class="menu-link ">
                <i class="menu-icon tf-icons fa fa-computer-mouse"></i>
                <div data-i18n="Without menu">Peminjaman Alat</div>
            </a>
        </li>
        <li class="menu-item {{ show('mahasiswa/keluhan_mahasiswa') }}">
            <a href="{{ url('mahasiswa/keluhan_mahasiswa') }}" layouts-without-menu.html class="menu-link ">
                <i class="menu-icon tf-icons fa fa-comment"></i>
                <div data-i18n="Without menu">Keluhan</div>
            </a>
        </li>
    </ul>
</aside>

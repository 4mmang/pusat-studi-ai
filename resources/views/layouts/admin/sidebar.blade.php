<!-- Sidebar -->
<ul class="navbar-nav sidebar sidebar-dark accordion" style="background-color: #38527E" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ url('/') }}">
        <div class="sidebar-brand-icon rotate-n-0">
            <img src="{{ asset('img/Logo.jpg') }}" style="width: 50px; height: 50px;" class="rounded-circle img-thumbnail"
                alt="">
        </div>
        <div class="sidebar-brand-text mx-2"> Pusat<sup class="text-warning">Studi AI</sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{ Request::is('admin/dashboard') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        menu
    </div>
    <li class="nav-item {{ Request::is('admin/sumber-daya*') ? 'active' : '' }}">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#sumber-daya"
            aria-expanded="true" aria-controls="sumber-daya">
            <i class="fas fa-fw fa-handshake"></i>
            <span>Sumber Daya</span>
        </a>
        <div id="sumber-daya" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item {{ Request::is('admin/sumber-daya/anggota*') ? 'active' : '' }}"
                    href="{{ route('anggota.index') }}">Anggota</a>
                <a class="collapse-item {{ Request::is('admin/sumber-daya/sarana-pra*') ? 'active' : '' }}"
                    href="{{ route('sarana-pra.index') }}">Sarana & Prasarana</a>
            </div>
        </div>
    </li>
    {{-- <li class="nav-item {{ Request::is('admin/jenis/publikasi*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('jenis.publikasi.index') }}">
            <i class="fas fa-fw fa-th-large"></i>
            <span>Jenis Publikasi</span></a>
    </li> --}}
    <li class="nav-item {{ Request::is('admin/data*') ? 'active' : '' }}">
        <a class="nav-link {{ Request::is('admin/data*') ? 'active' : 'collapsed' }}" href="#"
            data-toggle="collapse" data-target="#data" aria-expanded="true" aria-controls="sumber-daya">
            <i class="fas fa-fw fa-database"></i>
            <span>Data</span>
        </a>
        <div id="data" class="collapse {{ Request::is('admin/data*') ? 'show' : '' }}"
            aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item {{ Request::is('admin/data/publikasi*') ? 'active' : '' }}"
                    href="{{ route('publikasi.index') }}">Publikasi</a>
                <a class="collapse-item {{ Request::is('admin/data/penelitian*') ? 'active' : '' }}"
                    href="">Penelitian</a>
                <a class="collapse-item {{ Request::is('admin/data/pengabdian*') ? 'active' : '' }}"
                    href="">Pengabdian</a>
            </div>
        </div>
    </li>
    <li class="nav-item {{ Request::is('admin/artikel*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('artikel.index') }}">
            <i class="fas fa-fw fa-newspaper"></i>
            <span>Artikel</span></a>
    </li>
    <li class="nav-item {{ Request::is('admin/event*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('event.index') }}">
            <i class="fas fa-fw fa-calendar-check"></i>
            <span>Event</span></a>
    </li>
    <hr class="sidebar-divider d-none d-md-block">
    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>
<!-- End of Sidebar -->

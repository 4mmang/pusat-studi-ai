<!-- Sidebar -->
<ul class="navbar-nav sidebar sidebar-dark accordion" style="background-color: #38527E" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ url('/') }}">
        <div class="sidebar-brand-icon rotate-n-0">
            <img src="{{ asset('img/Logo.png') }}" style="width: 50px; height: 50px;" class="rounded-circle img-thumbnail"
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
    @if (Auth::check() && Auth::user()->role === 'superadmin')
        <li class="nav-item {{ Request::is('admin/user*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('user.index') }}">
                <i class="fas fa-fw fa-users"></i>
                <span>Kelola Admin</span></a>
        </li>
    @endif

    @if ((Auth::check() && Auth::user()->role === 'admin') || Auth::user()->role === 'anggota')
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
                        href="{{ route('penelitian.index') }}">Penelitian</a>
                    <a class="collapse-item {{ Request::is('admin/data/pengabdian*') ? 'active' : '' }}"
                        href="{{ route('pengabdian.index') }}">Pengabdian</a>
                </div>
            </div>
        </li>
        <li class="nav-item {{ Request::is('admin/artikel*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('artikel.index') }}">
                <i class="fas fa-fw fa-newspaper"></i>
                <span>Artikel</span></a>
        </li>
    @endif
    @if (Auth::check() && Auth::user()->role === 'admin')
        <li class="nav-item {{ Request::is('admin/unduh-data*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('unduh-data.index') }}">
                <i class="fas fa-fw fa-download"></i>
                <span>Unduh Data</span></a>
        </li>
        <li class="nav-item {{ Request::is('admin/anggota*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('anggota.index') }}">
                <i class="fas fa-fw fa-users"></i>
                <span>Anggota</span></a>
        </li>
        <li class="nav-item {{ Request::is('admin/kelompok-riset*') ? 'active' : '' }}">
            <a class="nav-link {{ Request::is('admin/kelompok-riset*') ? 'active' : 'collapsed' }}" href="#"
                data-toggle="collapse" data-target="#kelompok-riset" aria-expanded="true" aria-controls="sumber-daya">
                <i class="fas fa-fw fa-road"></i>
                <span>Kelompok Riset</span>
            </a>
            <div id="kelompok-riset" class="collapse {{ Request::is('admin/kelompok-riset*') ? 'show' : '' }}"
                aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item {{ Request::is('admin/kelompok-riset/kebencanaan*') ? 'active' : '' }}"
                        href="{{ route('kebencanaan.index') }}">Kebencanaan</a>
                    <a class="collapse-item {{ Request::is('admin/kelompok-riset/kesehatan*') ? 'active' : '' }}"
                        href="{{ route('kesehatan.index') }}">Kesehatan</a>
                    <a class="collapse-item {{ Request::is('admin/kelompok-riset/pertanian*') ? 'active' : '' }}"
                        href="{{ route('pertanian.index') }}">Pertanian Berkelanjutan</a>
                    <a class="collapse-item {{ Request::is('admin/kelompok-riset/transportasi*') ? 'active' : '' }}"
                        href="{{ route('transportasi.index') }}">Transportasi</a>
                    <a class="collapse-item {{ Request::is('admin/kelompok-riset/kebudayaan*') ? 'active' : '' }}"
                        href="{{ route('kebudayaan.index') }}">Antropo & Kebudayaan</a>
                    <a class="collapse-item {{ Request::is('admin/kelompok-riset/smart*') ? 'active' : '' }}"
                        href="{{ route('smart.index') }}">Smart Sistem</a>
                    <a class="collapse-item {{ Request::is('admin/kelompok-riset/algoritma*') ? 'active' : '' }}"
                        href="{{ route('algoritma.index') }}">Algoritma & Komputasi</a>
                    <a class="collapse-item {{ Request::is('admin/kelompok-riset/software*') ? 'active' : '' }}"
                        href="{{ route('software.index') }}">Software Development</a>
                </div>
            </div>
        </li>
        <li class="nav-item {{ Request::is('admin/kontak*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('kontak.index') }}">
                <i class="fas fa-fw fa-phone"></i>
                <span>Kontak</span></a>
        </li>
        {{-- <li class="nav-item {{ Request::is('admin/parnert*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('parnert.index') }}">
                <i class="fas fa-fw fa-handshake"></i>
                <span>Parnert Kampus</span></a>
        </li> --}}
        <li class="nav-item {{ Request::is('admin/dipercaya*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('dipercaya.index') }}">
                <i class="fas fa-fw fa-shield-alt"></i>
                <span>Dipercaya</span></a>
        </li>
        <li class="nav-item {{ Request::is('admin/event*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('event.index') }}">
                <i class="fas fa-fw fa-calendar-check"></i>
                <span>Event</span></a>
        </li>
        <li class="nav-item {{ Request::is('admin/upload-pdf*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('upload-pdf.index') }}">
                <i class="fas fa-fw fa-file-pdf"></i>
                <span>Upload PDF</span></a>
        </li>
    @endif
    <hr class="sidebar-divider d-none d-md-block">
    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>
<!-- End of Sidebar -->

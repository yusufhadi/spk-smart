<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('dashboard') }}">
        <div class="sidebar-brand-icon">
            {{-- <i class="fas fa-laugh-wink"></i> --}}
            <img src="{{ url('img/tvri.png') }}" height="90px" alt="">
        </div>
        {{-- <div class="sidebar-brand-text mx-3">Televisi Republik Indonesia</div> --}}
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Master Data
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('criteria') }}">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Data Kriteria</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('subcriteria') }}">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Data Sub Kriteria</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('alternatif') }}">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Data Alternatif</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('penilaian') }}">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Data Penilaian</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('perhitungan') }}">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Data Perhitungan</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>

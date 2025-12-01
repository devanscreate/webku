<ul class="sidebar-nav" id="sidebar-nav">

    <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('dashboard') }}">
            <i class="bi bi-grid"></i>
            <span>Dashboard</span>
        </a>
    </li>

    @if (Auth::user()->role == 'Admin')
    <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse"
            href="#">
            <i class="bi bi-layout-text-window-reverse"></i><span>Pendaftar</span><i
                class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
            <li>
                <a href="{{ route('pendaftar') }}">
                    <i class="bi bi-circle"></i><span>List Pendaftar</span>
                </a>
            </li>
        </ul>
    </li>
    @endif

    {{-- MENU KHUSUS KEPSEK (Tambahkan Ini) --}}
    @if (Auth::user()->role == 'Kepsek')
    <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#kepsek-nav" data-bs-toggle="collapse" href="#">
            <i class="bi bi-journal-text"></i><span>Laporan</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="kepsek-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
            <li>
                {{-- Pastikan route ini sesuai dengan yang kita buat di web.php --}}
                <a href="{{ route('kepsek.pendaftar') }}">
                    <i class="bi bi-circle"></i><span>Data Pendaftar</span>
                </a>
            </li>
        </ul>
    </li>
    @endif

    @if (Auth::user()->role == 'User')
    <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse"
            href="#">
            <i class="bi bi-layout-text-window-reverse"></i><span>Pendaftaran</span><i
                class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
            <li>
                <a href="{{ route('siswa.status') }}">
                    <i class="bi bi-circle"></i><span>Status</span>
                </a>
            </li>
        </ul>
    </li>
    @endif
</ul>
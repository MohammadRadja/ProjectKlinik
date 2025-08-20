<nav class="sidebar">
    <div class="sidebar__wrap">
        <ul class="main-menu">
            <li class="main-menu__item {{ Request::segment(1) == 'dashboard' ? 'active' : '' }}">
                <a class="main-menu__link" href="{{ route('dashboard') }}">
                    <div class="icon"><img src="{{ asset('images/ic-dashboard.svg') }}" /></div>
                    <span>Dashboard</span>
                </a>
            </li>

            {{-- Role: SuperAdmin --}}
            @if (Auth::user()->role->name == 'SuperAdmin')
            <li class="main-menu__item {{ Request::segment(1) == 'staff' ? 'active' : '' }}">
                <a class="main-menu__link" href="{{ route('staff') }}">
                    <div class="icon"><img src="{{ asset('images/ic-subscribers.svg') }}" /></div>
                    <span>Staff</span>
                </a>
            </li>

            <li class="main-menu__item {{ Request::segment(1) == 'jadwal-dokter' ? 'active' : '' }}">
                <a class="main-menu__link" href="{{ route('jadwal-dokter') }}">
                    <div class="icon"><img src="{{ asset('images/ic-reports.svg') }}" /></div>
                    <span>Jadwal Dokter</span>
                </a>
            </li>

            <li class="main-menu__item {{ Request::segment(1) == 'pasien' ? 'active' : '' }}">
                <a class="main-menu__link" href="{{ route('pasien') }}">
                    <div class="icon"><img src="{{ asset('images/ic-contact.svg') }}" /></div>
                    <span>Pasien</span>
                </a>
            </li>

            <li class="main-menu__item {{ Request::segment(1) == 'pemeriksaan' ? 'active' : '' }}">
                <a class="main-menu__link" href="{{ route('pemeriksaan') }}">
                    <div class="icon"><img src="{{ asset('images/ic-pages.svg') }}" /></div>
                    <span>Pemeriksaan</span>
                </a>
            </li>

            <li class="main-menu__item {{ Request::segment(1) == 'pembayaran' ? 'active' : '' }}">
                <a class="main-menu__link" href="{{ route('pembayaran') }}">
                    <div class="icon"><img src="{{ asset('images/ic-payment.svg') }}" /></div>
                    <span>Pembayaran</span>
                </a>
            </li>

            <li class="main-menu__item {{ Request::segment(1) == 'item' ? 'active' : '' }}">
                <a class="main-menu__link" href="{{ route('item') }}">
                    <div class="icon"><img src="{{ asset('images/ic-item.svg') }}" /></div>
                    <span>Item</span>
                </a>
            </li>
            @endif

            {{-- Role: Dokter --}}
            @if (Auth::user()->role->name == 'Dokter')
            <li class="main-menu__item {{ Request::segment(1) == 'jadwal-dokter' ? 'active' : '' }}">
                <a class="main-menu__link" href="{{ route('jadwal-dokter') }}">
                    <div class="icon"><img src="{{ asset('images/ic-reports.svg') }}" /></div>
                    <span>Jadwal Dokter</span>
                </a>
            </li>

            <li class="main-menu__item {{ Request::segment(1) == 'pasien' ? 'active' : '' }}">
                <a class="main-menu__link" href="{{ route('pasien') }}">
                    <div class="icon"><img src="{{ asset('images/ic-contact.svg') }}" /></div>
                    <span>Pasien</span>
                </a>
            </li>
            <li class="main-menu__item {{ Request::segment(1) == 'pemeriksaan' ? 'active' : '' }}">
                <a class="main-menu__link" href="{{ route('pemeriksaan') }}">
                    <div class="icon"><img src="{{ asset('images/ic-pages.svg') }}" /></div>
                    <span>Pemeriksaan</span>
                </a>
            </li>
            @endif

            {{-- Role: Perawat --}}
            @if (Auth::user()->role->name == 'Perawat')
            <li class="main-menu__item {{ Request::segment(1) == 'jadwal-dokter' ? 'active' : '' }}">
                <a class="main-menu__link" href="{{ route('jadwal-dokter') }}">
                    <div class="icon"><img src="{{ asset('images/ic-reports.svg') }}" /></div>
                    <span>Jadwal Dokter</span>
                </a>
            </li>

            <li class="main-menu__item {{ Request::segment(1) == 'pembayaran' ? 'active' : '' }}">
                <a class="main-menu__link" href="{{ route('pembayaran') }}">
                    <div class="icon"><img src="{{ asset('images/ic-payment.svg') }}" /></div>
                    <span>Pembayaran</span>
                </a>
            </li>

            <li class="main-menu__item {{ Request::segment(1) == 'item' ? 'active' : '' }}">
                <a class="main-menu__link" href="{{ route('item') }}">
                    <div class="icon"><img src="{{ asset('images/ic-item.svg') }}" /></div>
                    <span>Item</span>
                </a>
            </li>
            @endif

            {{-- Menu Umum --}}
            <li class="main-menu__item {{ Request::segment(1) == 'laporan' ? 'active' : '' }}">
                <a class="main-menu__link" href="{{ route('laporan') }}">
                    <div class="icon"><img src="{{ asset('images/ic-settings.svg') }}" /></div>
                    <span>Laporan</span>
                </a>
            </li>

            <li class="main-menu__item {{ Request::segment(1) == 'setting' ? 'active' : '' }}">
                <a class="main-menu__link" href="{{ route('setting') }}">
                    <div class="icon"><img src="{{ asset('images/ic-settings.svg') }}" /></div>
                    <span>Pengaturan</span>
                </a>
            </li>
        </ul>

        {{-- Profil User dan Logout --}}
        <div class="user-snapshot dropdown">
            <div class="user-snapshot__toggle" data-toggle="dropdown">
                <div class="user-snapshot__avatar">
                    <img src="{{ asset('images/avatar.png') }}" alt="Avatar" width="32" height="32" />
                </div>
                <div class="user-snapshot__wrap">
                    <span class="username">{{ Auth::user()->name }}</span>
                    <span class="title">{{ Auth::user()->role->name }}</span>
                </div>
            </div>
            <form action="{{ route('logout') }}" method="POST" id="logout">@csrf</form>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="javascript:;" onclick="$('#logout').submit()">Logout</a>
            </div>
        </div>
    </div>
</nav>
<!-- User Menu Start -->
<div class="user-container d-flex">
    <a href="#" class="d-flex user position-relative" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        @if (auth()->user()->photo)
        <img class="profile mt-3" alt="profile" src="/storage/{{ auth()->user()->photo }}" />
        @else
        <img class="profile mt-3" alt="profile" src="/storage/photo_user/default.png" />
        @endif
        <div class="name"><span class="">Halo,
                <strong>{{ auth()->user()->name }}</strong></span>
            <p class="cta-6 mt-1">{{ auth()->user()->roles }}</p>
        </div>
    </a>
    <div class="dropdown-menu dropdown-menu-end user-menu wide">
        <div class="row mb-0 ms-0 me-0">
            <div class="col-6 ps-1 pe-1">
                <ul class="list-unstyled">
                    <li>
                        <a href="/profile">
                            <i data-acorn-icon="user" class="me-2" data-acorn-size="17"></i>
                            <span class="align-middle">Profile</span>
                        </a>
                    </li>
                    <li>
                        <a href="/auth/create">
                            <i data-acorn-icon="credit-card" class="me-2" data-acorn-size="17"></i>
                            <span class="align-middle">Daftar</span>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="col-6 pe-1 ps-1">
                <ul class="list-unstyled">
                    <li>
                        <a href="/setting">
                            <i data-acorn-icon="gear" class="me-2" data-acorn-size="17"></i>
                            <span class="align-middle">Settings</span>
                        </a>
                    </li>
                    <li>
                        <a href="/logout">
                            <i data-acorn-icon="logout" class="me-2" data-acorn-size="17"></i>
                            <span class="align-middle">Logout</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- User Menu End -->

{{-- <!-- Icons Menu Start -->
<ul class="list-unstyled list-inline text-center menu-icons">
    <li class="list-inline-item">
        <a href="#" id="pinButton" class="pin-button">
            <i data-acorn-icon="lock-on" class="unpin" data-acorn-size="18"></i>
            <i data-acorn-icon="lock-off" class="pin" data-acorn-size="18"></i>
        </a>
    </li>
</ul>
<!-- Icons Menu End --> --}}

<!-- Menu Start -->
<div class="menu-container flex-grow-1">
    <ul id="menu" class="menu">
        <li>
            <a href="/home">
                <i data-acorn-icon="home-garage" class="icon" data-acorn-size="18"></i>
                <span class="label">Dashboards</span>
            </a>
        </li>
        <li>
            <a href="#transaksi">
                <i data-acorn-icon="cart" class="icon" data-acorn-size="18"></i>
                <span class="label">Transaksi</span>
            </a>
            <ul id="transaksi">
                <li>
                    <a href="#penjualan">
                        <span class="label">Penjualan</span>
                    </a>
                    <ul id="penjualan">
                        <li>
                            <a href="/penjualan">
                                <span class="label">Penjualan Cash</span>
                            </a>
                        </li>
                        <li>
                            <a href="/kredit">
                                <span class="label">Penjualan Kredit</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="/pembelian">
                        <span class="label">Pembelian</span>
                    </a>
                </li>
            </ul>
        </li>
        <li>
            <a href="#master">
                <i data-acorn-icon="archive" class="icon" data-acorn-size="18"></i>
                <span class="label">Master</span>
            </a>
            <ul id="master">
                <li>
                    <a href="/consumer">
                        <span class="label">Data Konsumen</span>
                    </a>
                </li>
                <li>
                    <a href="/motor">
                        <span class="label">Data Motor</span>
                    </a>
                </li>
            </ul>
        </li>
        <li>
            <a href="/modal">
                <i data-acorn-icon="dollar" class="icon" data-acorn-size="18"></i>
                <span class="label">Modal</span>
            </a>
        </li>
        <li>
            <a href="#laporan">
                <i data-acorn-icon="print" class="icon" data-acorn-size="18"></i>
                <span class="label">Laporan</span>
            </a>
            <ul id="laporan">
                <li>
                    <a href="/laporanPenjualan">
                        <span class="label">Laporan Penjualan</span>
                    </a>
                </li>
                <li>
                    <a href="/laporanPembelian">
                        <span class="label">Laporan Pembelian</span>
                    </a>
                </li>
            </ul>
        </li>
        <li>
            <a href="/regorderkredit">
                <i data-acorn-icon="edit-square" class="icon" data-acorn-size="18"></i>
                <span class="label">Reg Order Kredit</span>
            </a>
        </li>
    </ul>
</div>
<!-- Menu End -->

<!-- Mobile Buttons Start -->
<div class="mobile-buttons-container">
    <!-- Scrollspy Mobile Button Start -->
    <a href="#" id="scrollSpyButton" class="spy-button" data-bs-toggle="dropdown">
        <i data-acorn-icon="menu-dropdown"></i>
    </a>
    <!-- Scrollspy Mobile Button End -->

    <!-- Scrollspy Mobile Dropdown Start -->
    <div class="dropdown-menu dropdown-menu-end" id="scrollSpyDropdown"></div>
    <!-- Scrollspy Mobile Dropdown End -->

    <!-- Menu Button Start -->
    <a href="#" id="mobileMenuButton" class="menu-button">
        <i data-acorn-icon="menu"></i>
    </a>
    <!-- Menu Button End -->
</div>
<!-- Mobile Buttons End -->
</div>
<div class="nav-shadow"></div>
</div>

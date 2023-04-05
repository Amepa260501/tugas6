<nav class="navbar navbar-expand-lg navbar-dark bg-danger">
    <div class="container">
        <a class="navbar-brand" href="{{ url('home') }}">
            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-houses-fill" viewBox="0 0 16 16"><path d="M7.207 1a1 1 0 0 0-1.414 0L.146 6.646a.5.5 0 0 0 .708.708L1 7.207V12.5A1.5 1.5 0 0 0 2.5 14h.55a2.51 2.51 0 0 1-.05-.5V9.415a1.5 1.5 0 0 1-.56-2.475l5.353-5.354L7.207 1Z"/><path d="M8.793 2a1 1 0 0 1 1.414 0L12 3.793V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v3.293l1.854 1.853a.5.5 0 0 1-.708.708L15 8.207V13.5a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 4 13.5V8.207l-.146.147a.5.5 0 1 1-.708-.708L8.793 2Z"/>
            </svg>
            PWL
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                {{-- Login --}}
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle {{ Request::is('profil', 'login', 'logout') ? 'active' : '' }}" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Login</a>
                    <ul class="dropdown-menu bg-danger">
                        <li>
                            <a class="dropdown-item text-white {{ Request::is('profil') ? 'active bg-dark' : '' }}" href="{{ url('profil') }}">Profil</a>
                        </li>
                        <li>
                            <form action="{{ url('/logout') }}" method="post">
                                @csrf
                                <button type="submit" name="logout" class="dropdown-item text-white {{ Request::is('logout') ? 'active bg-dark' : '' }}">Logout</button>
                            </form>
                        </li>
                    </ul>
                </li>
                {{-- Master --}}
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle {{ Request::is('produk', 'kategori', 'gudang') ? 'active' : '' }}" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Master</a>
                    <ul class="dropdown-menu bg-danger">
                        <li>
                            <a class="dropdown-item text-white {{ Request::is('produk') ? 'active bg-dark' : '' }}" href="{{ url('produk') }}">Produk</a>
                        </li>
                        <li>
                            <a class="dropdown-item text-white {{ Request::is('kategori') ? 'active bg-dark' : '' }}" href="{{ url('kategori') }}">Kategori</a>
                        </li>
                        @can('gudang') 
                        <li>
                            <a class="dropdown-item text-white {{ Request::is('gudang') ? 'active bg-dark' : '' }}" href="{{ url('gudang') }}">Gudang</a>
                        </li>
                        @endcan
                    </ul>
                </li>
                {{-- Transaksi --}}
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle {{ Request::is('tpenjualan', 'tpembelian') ? 'active' : '' }}" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Transaksi</a>
                    <ul class="dropdown-menu bg-danger">
                        <li>
                            <a class="dropdown-item text-white {{ Request::is('tpenjualan') ? 'active bg-dark' : '' }}" href="{{ url('tpenjualan') }}">Penjualan</a>
                        </li>
                        <li>
                            <a class="dropdown-item text-white {{ Request::is('tpembelian') ? 'active bg-dark' : '' }}" href="{{ url('tpembelian') }}">Pembelian</a>
                        </li>
                    </ul>
                </li>
                {{-- Laporan --}}
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle {{ Request::is('stok') ? 'active' : '' }}" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Laporan</a>
                    <ul class="dropdown-menu bg-danger">
                        <li>
                            <a class="dropdown-item text-white {{ Request::is('stok') ? 'active bg-dark' : '' }}" href="{{ url('stok') }}">Stok</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>

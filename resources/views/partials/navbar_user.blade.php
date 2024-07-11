<nav class="site-nav">
    <div class="container">
        <div class="menu-bg-wrap">
            <div class="site-navigation">
            <span href="index.html" class="logo m-0 float-start"><u>SISKOS</u>
            </span>
               
                <ul class="js-clone-nav d-none d-lg-inline-block text-start site-menu float-end">
                    <li class="{{ Request::is('/') ? 'active' : '' }}">
                        <a href="{{ route('home') }}">Home</a>
                    </li>
                    <li class="{{ Request::is('list') ? 'active' : '' }}">
                        <a href="{{ route('list') }}">List Kost</a>
                    </li>
                    <li class="{{ Request::is('transaksi') ? 'active' : '' }}">
                        <a href="{{ route('transaksi') }}">Transaksi</a></li>
                    <li class="nav-item">
                        <a href="{{ route('logout') }}" class="nav-link">
                            <i class="mdi mdi-logout-variant menu-icon"></i>
                            <span class="menu-title">Logout</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>

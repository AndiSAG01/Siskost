<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item sidebar-category">
            <p>Navigation</p>
            <span></span>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('dashboard') }}">
                <i class="mdi mdi-view-quilt menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        <li class="nav-item sidebar-category">
            <p>Components</p>
            <span></span>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.kost.index') }}">
                <i class="mdi mdi-home menu-icon"></i>
                <span class="menu-title">Data Kost</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.costumer.index') }}">
                <i class="mdi mdi-account-multiple menu-icon"></i>
                <span class="menu-title">Data Costumer</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('Transaction.Perbulan') }}">
                <i class="mdi mdi-chart-histogram menu-icon"></i>
                <span class="menu-title">Data Transaksi</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.costumer.laporan') }}">
                <i class="mdi mdi-folder-account menu-icon"></i>
                <span class="menu-title">Laporan Costumer</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('pageslaporanbulanan') }}">
                <i class="mdi mdi-shopping menu-icon"></i>
                <span class="menu-title">Laporan Transaksi</span>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('logout') }}" class="nav-link">
                <i class="mdi mdi-logout-variant menu-icon"></i>
                <span class="menu-title">Logout</span>
            </a>
        </li>
    </ul>
</nav>

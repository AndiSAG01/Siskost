<nav class="navbar col-lg-12 col-12 px-0 py-0 py-lg-4 d-flex flex-row">
    <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
      <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
        <span class="mdi mdi-menu"></span>
      </button>
      @php
      $user = auth()->user();
      @endphp
      
      @if($user->isAdmin == 1)
          <h4 class="font-weight-bold mb-0 d-none d-md-block mt-1">Welcome back, {{ $user->name }}</h4>
      @endif
      <ul class="navbar-nav navbar-nav-right">
        @php
          $tanggal = Carbon\Carbon::now()->format('Y-m-d');
          $bulan = Carbon\Carbon::now()->format('M');
        @endphp
        <li class="nav-item">
          <h4 class="mb-0 font-weight-bold d-none d-xl-block">{{ $bulan }}-{{ $tanggal }}</h4>
        </li>
      </ul>
      <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
        <span class="mdi mdi-menu"></span>
      </button>
    </div>
  </nav>
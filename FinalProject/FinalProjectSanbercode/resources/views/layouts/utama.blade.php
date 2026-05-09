<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title', 'Toko Buku') - SEODash</title>
  <link rel="shortcut icon" type="image/png" href="{{ asset('templates/SEODash-1.0.0/src/assets/images/logos/seodashlogo.png') }}" />
  <link rel="stylesheet" href="{{ asset('templates/SEODash-1.0.0/src/assets/css/styles.min.css') }}" />
</head>
<body>
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed">
    <aside class="left-sidebar">
      <div>
        <div class="brand-logo d-flex align-items-center justify-content-between">
          <a href="{{ route('beranda') }}" class="text-nowrap logo-img">
            <img src="{{ asset('templates/SEODash-1.0.0/src/assets/images/logos/logo-light.svg') }}" alt="" />
          </a>
          <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
            <i class="ti ti-x fs-8"></i>
          </div>
        </div>
        <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
          <ul id="sidebarnav">
            <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-6"></i>
              <span class="hide-menu">Menu Utama</span>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="{{ route('beranda') }}" aria-expanded="false">
                <span>
                  <iconify-icon icon="solar:home-smile-bold-duotone" class="fs-6"></iconify-icon>
                </span>
                <span class="hide-menu">Beranda</span>
              </a>
            </li>
            
            <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-6"></i>
              <span class="hide-menu">Manajemen</span>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="{{ route('kategori.index') }}" aria-expanded="false">
                <span>
                  <iconify-icon icon="solar:layers-minimalistic-bold-duotone" class="fs-6"></iconify-icon>
                </span>
                <span class="hide-menu">Kategori</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="{{ route('buku.index') }}" aria-expanded="false">
                <span>
                  <iconify-icon icon="solar:bookmark-square-minimalistic-bold-duotone" class="fs-6"></iconify-icon>
                </span>
                <span class="hide-menu">Buku</span>
              </a>
            </li>

            @if(auth()->check() && (auth()->user()->isAdmin() || auth()->user()->isStaff()))
            <li class="sidebar-item">
              <a class="sidebar-link" href="{{ route('transaksi.index') }}" aria-expanded="false">
                <span>
                  <iconify-icon icon="solar:file-text-bold-duotone" class="fs-6"></iconify-icon>
                </span>
                <span class="hide-menu">Transaksi</span>
              </a>
            </li>
            @endif

            <li class="nav-small-cap">
              <iconify-icon icon="solar:menu-dots-linear" class="nav-small-cap-icon fs-6"></iconify-icon>
              <span class="hide-menu">Akun</span>
            </li>
            @guest
            <li class="sidebar-item">
              <a class="sidebar-link" href="{{ route('login') }}" aria-expanded="false">
                <span>
                  <iconify-icon icon="solar:login-3-bold-duotone" class="fs-6"></iconify-icon>
                </span>
                <span class="hide-menu">Masuk</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="{{ route('daftar') }}" aria-expanded="false">
                <span>
                  <iconify-icon icon="solar:user-plus-rounded-bold-duotone" class="fs-6"></iconify-icon>
                </span>
                <span class="hide-menu">Daftar</span>
              </a>
            </li>
            @else
            <li class="sidebar-item">
              <a class="sidebar-link" href="{{ route('profil.tampil') }}" aria-expanded="false">
                <span>
                  <iconify-icon icon="solar:user-bold-duotone" class="fs-6"></iconify-icon>
                </span>
                <span class="hide-menu">Profil Saya</span>
              </a>
            </li>
            <li class="sidebar-item">
              <form action="{{ route('keluar') }}" method="POST" id="logout-form" style="display: none;">
                @csrf
              </form>
              <a class="sidebar-link" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" aria-expanded="false">
                <span>
                  <iconify-icon icon="solar:logout-3-bold-duotone" class="fs-6"></iconify-icon>
                </span>
                <span class="hide-menu">Keluar</span>
              </a>
            </li>
            @endguest
          </ul>
        </nav>
      </div>
    </aside>
    <div class="body-wrapper">
      <header class="app-header">
        <nav class="navbar navbar-expand-lg navbar-light">
          <ul class="navbar-nav">
            <li class="nav-item d-block d-xl-none">
              <a class="nav-link sidebartoggler nav-icon-hover" id="headerCollapse" href="javascript:void(0)">
                <i class="ti ti-menu-2"></i>
              </a>
            </li>
          </ul>
          <div class="navbar-collapse justify-content-end px-0" id="navbarNav">
            <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">
              @auth
              <li class="nav-item dropdown">
                <a class="nav-link nav-icon-hover" href="javascript:void(0)" id="drop2" data-bs-toggle="dropdown" aria-expanded="false">
                  <img src="{{ asset('templates/SEODash-1.0.0/src/assets/images/profile/user-1.jpg') }}" alt="" width="35" height="35" class="rounded-circle">
                  <span class="ms-2">{{ auth()->user()->name }}</span>
                </a>
                <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up" aria-labelledby="drop2">
                  <div class="message-body">
                    <a href="{{ route('profil.tampil') }}" class="d-flex align-items-center gap-2 dropdown-item">
                      <i class="ti ti-user fs-6"></i>
                      <p class="mb-0 fs-3">Profil Saya</p>
                    </a>
                    <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="btn btn-outline-primary mx-3 mt-2 d-block">Keluar</a>
                  </div>
                </div>
              </li>
              @endauth
            </ul>
          </div>
        </nav>
      </header>
      <div class="container-fluid">
        @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          {{ session('success') }}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
          {{ session('error') }}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        @yield('content')
      </div>
    </div>
  </div>
  <script src="{{ asset('templates/SEODash-1.0.0/src/assets/libs/jquery/dist/jquery.min.js') }}"></script>
  <script src="{{ asset('templates/SEODash-1.0.0/src/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('templates/SEODash-1.0.0/src/assets/libs/simplebar/dist/simplebar.js') }}"></script>
  <script src="{{ asset('templates/SEODash-1.0.0/src/assets/js/sidebarmenu.js') }}"></script>
  <script src="{{ asset('templates/SEODash-1.0.0/src/assets/js/app.min.js') }}"></script>
  <script src="https://cdn.jsdelivr.net/npm/iconify-icon@1.0.8/dist/iconify-icon.min.js"></script>
  @yield('scripts')
</body>
</html>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Modernize Free</title>
    <link rel="shortcut icon" type="image/png" href="/modern/src/assets/images/logos/favicon.png" />
    <link rel="stylesheet" href="/modern/src/assets/css/styles.min.css" />
</head>

<body>
    <!--  Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">
        <!-- Sidebar Start -->
        <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div>
                <div class="brand-logo d-flex align-items-center justify-content-between">
                    <a href="./index.html" class="text-nowrap logo-img">
                        <img src="/modern/src/assets/images/logos/dark-logo.svg" width="180" alt="" />
                    </a>
                    <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
                        <i class="ti ti-x fs-8"></i>
                    </div>
                </div>
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
                    <ul id="sidebarnav">
                        <li class="nav-small-cap">
                            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                            <span class="hide-menu">Home</span>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link {{ request()->is('home') ? 'active' : '' }}" href="/home"
                                aria-expanded="false">
                                <span>
                                    <i class="ti ti-layout-dashboard"></i>
                                </span>
                                <span class="hide-menu">Beranda</span>
                            </a>
                        </li>
                        <li>
                            @auth
                            <li class="sidebar-item">
                                <a class="sidebar-link dropdown-tonggle {{ request()->is('siswa') ? 'active' : '' }}"
                                    href="/siswa" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    <span>
                                        <i class="ti ti-file-description"></i>
                                    </span>
                                    <span class="hide-menu">Data Siswa</span>
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <li>
                                        <a class="dropdown-item" href="/siswa">Lihat Data Siswa</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="/siswa/create">Tambah Siswa</a>
                                    </li>
                                </ul>

                            </li>
                            </li>
                            <li class="sidebar-item">
                                <a class="sidebar-link dropdown-tonggle {{ request()->is('poli') ? 'active' : '' }}"
                                    href="/siswa" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    <span>
                                        <i class="ti ti-file-description"></i>
                                    </span>
                                    <span class="hide-menu">Data Poli</span>
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <li>
                                        <a class="dropdown-item" href="/poli">Lihat Data Poli</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="/poli/create">Tambah Poli</a>
                                    </li>
                                </ul>

                            </li>
                            <li class="sidebar-item">
                                <a class="sidebar-link {{ request()->is('daftar') ? 'active' : '' }}" href="/daftar"
                                    aria-expanded="false">
                                    <span>
                                        <i class="ti ti-layout-dashboard"></i>
                                    </span>
                                    <span class="hide-menu">Pendaftaran</span>
                                </a>
                            </li>
                        @endauth
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!--  Sidebar End -->
        <!--  Main wrapper -->
        <div class="body-wrapper">
            <!--  Header Start -->
            <header class="app-header">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <ul class="navbar-nav">
                        <li class="nav-item d-block d-xl-none">
                            <a class="nav-link sidebartoggler nav-icon-hover" id="headerCollapse"
                                href="javascript:void(0)">
                                <i class="ti ti-menu-2"></i>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link nav-icon-hover" href="javascript:void(0)">
                                <i class="ti ti-bell-ringing"></i>
                                <div class="notification bg-primary rounded-circle"></div>
                            </a>
                        </li>
                    </ul>
                    <div class="navbar-collapse justify-content-end px-0" id="navbarNav">
                        <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">
                            <li class="nav-item dropdown">
                                <a class="nav-link nav-icon-hover" href="javascript:void(0)" id="drop2"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    <img src="/modern/src/assets/images/profile/user-1.jpg" alt=""
                                        width="35" height="35" class="rounded-circle">
                                </a>
                                <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up"
                                    aria-labelledby="drop2">
                                    <div class="message-body">
                                        <a href="javascript:void(0)"
                                            class="d-flex align-items-center gap-2 dropdown-item">
                                            <i class="ti ti-user fs-6"></i>
                                            <p class="mb-0 fs-3">{{ auth()->user()->nama }}</p>
                                        </a>
                                        <a href="/logout" class="btn btn-outline-primary mx-3 mt-2 d-block">Logout</a>
                                        {{-- <a href="../web" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="btn btn-outline-primary mx-3 mt-2 d-block">
                                            Logout
                                        </a> --}}
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
            </header>
            <!--  Header End -->
            <div class="container-fluid">
                @include('flash::message')
                @yield('content')
            </div>
        </div>
    </div>
    <script src="/modern/src/assets/libs/jquery/dist/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="/modern/src/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="/modern/src/assets/js/sidebarmenu.js"></script>
    <script src="/modern/src/assets/js/app.min.js"></script>
    <script src="/modern/src/assets/libs/simplebar/dist/simplebar.js"></script>
    <script>
        // In your Javascript (external .js resource or <script> tag)
        $(document).ready(function() {
            $('.select2').select2({
                placeholder: function() {
                    $(this).data('placeholder');
                },
                allowClear: true,
                width: 'resolve'  //Mengatur lebar otomatis mengikuti elemen
            });
        });
    </script>
</body>

</html>

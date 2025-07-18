<html
    lang="pt-br">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"/>
    <meta name="robots" content="noindex, nofollow"/>

    <title>Smartfer - Industria</title>

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="../../assets/img/favicon/favicon.ico"/>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com"/>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin/>
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet"/>

    <link rel="stylesheet" href="{{ asset('css/iconify-icons.css') }}"/>
    <link rel="stylesheet" href="{{ asset('css/pickr-themes.css') }}"/>
    <link rel="stylesheet" href="{{ asset('css/core.css') }}"/>
    <link rel="stylesheet" href="{{ asset('css/demo.css') }}"/>
    <link rel="stylesheet" href="{{ asset('css/css/select2.css') }}"/>
    <link rel="stylesheet" href="{{ asset('css/datatables.bootstrap5.css') }}"/>
    <link rel="stylesheet" href="{{ asset('css/responsive.bootstrap5.css') }}"/>
    <link rel="stylesheet" href="{{ asset('css/buttons.bootstrap5.css') }}"/>

    <link rel="stylesheet" href="{{ asset('css/flag-icons.css') }}"/>
    <link rel="stylesheet" href="{{ asset('css/apex-charts.css') }}"/>
    <script src="{{ asset('js/helpers.js') }}"></script>
    <script src="{{ asset('js/template-customizer.js') }}"></script>
    <script src="{{ asset('js/config.js') }}"></script>
</head>
<body>

<!-- Layout wrapper -->
<div class="layout-wrapper layout-content-navbar  ">
    <div class="layout-container">
        @include('administrativo.layout.menu')

        <!-- Layout container -->
        <div class="layout-page">
            <!-- Navbar -->
            <nav
                class="layout-navbar container-xxl navbar-detached navbar navbar-expand-xl align-items-center bg-navbar-theme"
                id="layout-navbar">
                <div class="layout-menu-toggle navbar-nav align-items-xl-center me-4 me-xl-0   d-xl-none ">
                    <a class="nav-item nav-link px-0 me-xl-6" href="javascript:void(0)">
                        <i class="icon-base bx bx-menu icon-md"></i>
                    </a>
                </div>

                <div class="navbar-nav-right d-flex align-items-center justify-content-end" id="navbar-collapse">

                    <!-- Search -->
                    <div class="navbar-nav align-items-center">
                        <div class="nav-item navbar-search-wrapper mb-0">
                            <a class="nav-item nav-link search-toggler px-0" href="javascript:void(0);">
                                <span class="d-inline-block text-body-secondary fw-normal" id="autocomplete"></span>
                            </a>
                        </div>
                    </div>

                    <!-- /Search -->
                    <ul class="navbar-nav flex-row align-items-center ms-md-auto">
                        <!-- Style Switcher -->
                        <li class="nav-item dropdown me-2 me-xl-0">
                            <a class="nav-link dropdown-toggle hide-arrow" id="nav-theme" href="javascript:void(0);"
                               data-bs-toggle="dropdown">
                                <i class="icon-base bx bx-sun icon-md theme-icon-active"></i>
                                <span class="d-none ms-2" id="nav-theme-text">Toggle theme</span>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="nav-theme-text">
                                <li>
                                    <button type="button" class="dropdown-item align-items-center active"
                                            data-bs-theme-value="light" aria-pressed="false">
                                        <span><i class="icon-base bx bx-sun icon-md me-3"
                                                 data-icon="sun"></i>Light</span>
                                    </button>
                                </li>
                                <li>
                                    <button type="button" class="dropdown-item align-items-center"
                                            data-bs-theme-value="dark" aria-pressed="true">
                                        <span><i class="icon-base bx bx-moon icon-md me-3"
                                                 data-icon="moon"></i>Dark</span>
                                    </button>
                                </li>
                            </ul>
                        </li>
                        <!-- / Style Switcher-->

                        <!-- User -->
                        <li class="nav-item navbar-dropdown dropdown-user dropdown">
                            <a class="nav-link dropdown-toggle hide-arrow p-0" href="javascript:void(0);"
                               data-bs-toggle="dropdown">
                                <div class="avatar avatar-online">
                                    <img src="{{ asset('img/avatars/1.png') }}" alt class="rounded-circle"/>
                                </div>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li>
                                    <a class="dropdown-item" href="pages-account-settings-account.html">
                                        <div class="d-flex">
                                            <div class="flex-shrink-0 me-3">
                                                <div class="avatar avatar-online">
                                                    <img src="{{ asset('img/avatars/1.png') }}" alt
                                                         class="w-px-40 h-auto rounded-circle"/>
                                                </div>
                                            </div>
                                            <div class="flex-grow-1">
                                                <h6 class="mb-0">John Doe</h6>
                                                <small class="text-body-secondary">Admin</small>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <div class="dropdown-divider my-1"></div>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="pages-profile-user.html"> <i
                                            class="icon-base bx bx-user icon-md me-3"></i><span>Meu Perfil</span> </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="pages-account-settings-account.html"> <i
                                            class="icon-base bx bx-cog icon-md me-3"></i><span>Configurações</span> </a>
                                </li>
                                <li>
                                    <div class="dropdown-divider my-1"></div>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="auth-login-cover.html" target="_blank"> <i
                                            class="icon-base bx bx-power-off icon-md me-3"></i><span>Sair</span> </a>
                                </li>
                            </ul>
                        </li>
                        <!--/ User -->
                    </ul>
                </div>
            </nav>
            <!-- / Navbar -->

            @include('administrativo.usuarios.list')

        </div>

        <!-- Overlay -->
        <div class="layout-overlay layout-menu-toggle"></div>

        <!-- Drag Target Area To SlideIn Menu On Small Screens -->
        <div class="drag-target"></div>

    </div>
    <!-- / Layout wrapper -->

    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="{{ asset('js/popper.js') }}"></script>
    <script src="{{ asset('js/bootstrap.js') }}"></script>
    <script src="{{ asset('js/select2.js') }}"></script>
    <script src="{{ asset('js/datatables-bootstrap5.js') }}"></script>
    <script src="{{ asset('js/autocomplete-js.js') }}"></script>
    <script src="{{ asset('js/pickr.js') }}"></script>
    <script src="{{ asset('js/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('js/hammer.js') }}"></script>
    <script src="{{ asset('js/menu.js') }}"></script>

    <!-- Vendors JS -->
    <script src="{{ asset('js/apexcharts.js') }}"></script>

    <!-- Main JS -->

    @include('administrativo.layout.js.main')
    @include('administrativo.layout.js.script')

    <!-- Page JS -->
    @include('administrativo.layout.js.user-list')

    <!-- Page JS -->
    <script src="{{ asset('js/dashboards-analytics.js') }}"></script>

</div>
</body>
</html>

<!-- beautify ignore:end -->


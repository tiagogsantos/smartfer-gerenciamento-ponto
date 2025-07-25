@php use Illuminate\Support\Facades\Auth; @endphp
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
                        <img src="{{ asset($perfil->foto_capa ? 'storage/'. $perfil->foto_capa : 'img/avatar/1.png') }}"
                             alt="Foto do perfil"
                             class="rounded-circle"
                             id="uploadedAvatar"/>
                    </div>
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li>
                        <a class="dropdown-item" href="{{ route('admin.editarfuncionario', ['id' => Auth::user()->id]) }}">
                            <div class="d-flex">
                                <div class="flex-shrink-0 me-3">
                                    <div class="avatar avatar-online">
                                        <img src="{{ asset($perfil->foto_capa ? 'storage/'. $perfil->foto_capa : 'img/avatar/1.png') }}"
                                             alt="Foto do perfil"
                                             class="rounded-circle"
                                             id="uploadedAvatar"/>
                                    </div>
                                </div>
                                <div class="flex-grow-1">
                                    <h6 class="mb-0">{{ Auth::user()->name }}</h6>
                                    <small class="text-body-secondary">{{ Auth::user()->tipo }}</small>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <div class="dropdown-divider my-1"></div>
                    </li>
                    <li>
                        <a class="dropdown-item"
                           href="{{ route('admin.editarfuncionario', ['id' => Auth::user()->id]) }}"> <i
                                class="icon-base bx bx-user icon-md me-3"></i><span>Meu Perfil</span> </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="#"> <i
                                class="icon-base bx bx-cog icon-md me-3"></i><span>Configurações</span> </a>
                    </li>
                    <li>
                        <div class="dropdown-divider my-1"></div>
                    </li>
                    <li>
                        <a class="dropdown-item" href="{{ route('web.logout') }}" target="_blank"> <i
                                class="icon-base bx bx-power-off icon-md me-3"></i><span>Sair</span> </a>
                    </li>
                </ul>
            </li>
            <!--/ User -->
        </ul>
    </div>
</nav>
<!-- / Navbar -->

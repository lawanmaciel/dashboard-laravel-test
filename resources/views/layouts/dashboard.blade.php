<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>DashTest</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>

<body>
    <div id="app">
        <div id="page-container" class="sidebar-o sidebar-dark enable-page-overlay side-scroll page-header-fixed main-content-narrow">
            <nav id="sidebar" aria-label="Main Navigation">
                <div class="content-header">
                    <a class="fw-semibold text-dual" href="{{route('dashboard')}}">
                        <span>DashTest</span>
                    </a>
                </div>

                <div class="js-sidebar-scroll">
                    <div class="content-side">
                        <ul class="nav-main">
                            <li class="nav-main-item">
                                <a class="nav-main-link active" href="{{ route('dashboard') }}">
                                    <i class="nav-main-link-icon si si-speedometer"></i>
                                    <span class="nav-main-link-name">Dashboard</span>
                                </a>
                            </li>
                            @if(Auth::user()->permission_id != 1)
                                <li class="nav-main-heading">ADMINISTRAÇÃO</li>
                                <li class="nav-main-item">
                                    <a class="nav-main-link" href="{{route('dashboard.products')}}">
                                        <i class="nav-main-link-icon far fa-bookmark"></i>
                                        <span class="nav-main-link-name">Produtos</span>
                                    </a>
                                </li>
                                <li class="nav-main-item">
                                    <a class="nav-main-link" href="{{route('dashboard.categories')}}">
                                        <i class="nav-main-link-icon far far fa-bookmark"></i>
                                        <span class="nav-main-link-name">Categorias</span>
                                    </a>
                                </li>
                                <li class="nav-main-item">
                                    <a class="nav-main-link" href="{{route('dashboard.brands')}}">
                                        <i class="nav-main-link-icon far far fa-bookmark"></i>
                                        <span class="nav-main-link-name">Marcas</span>
                                    </a>
                                </li>
                            @else
                            <li class="nav-main-heading">GESTÃO</li>
                                <li class="nav-main-item">
                                    <a class="nav-main-link" href="{{route('dashboard.users')}}">
                                        <i class="nav-main-link-icon far fa-circle-user"></i>
                                        <span class="nav-main-link-name">Usuários</span>
                                    </a>
                                </li>
                                <li class="nav-main-item">
                                    <a class="nav-main-link" href="{{route('dashboard.permissions')}}">
                                        <i class="nav-main-link-icon si si-settings"></i>
                                        <span class="nav-main-link-name">Permissões</span>
                                    </a>
                                </li>
                            @endif
                        </ul>
                    </div>
                </div>
            </nav>

            <header id="page-header">
                <div class="content-header">
                    <div class="d-flex align-items-center">
                    </div>
                    <div class="d-flex align-items-center">
                        <div class="dropdown d-inline-block ms-2">
                            <button type="button" class="btn btn-sm btn-alt-secondary d-flex align-items-center"
                                id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false">
                                <span class="d-none d-sm-inline-block">{{{ Auth::user()->name}}}</span>
                                <i class="fa fa-fw fa-angle-down d-none d-sm-inline-block ms-1 mt-1"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-md dropdown-menu-end p-0 border-0"
                                aria-labelledby="page-header-user-dropdown">
                                <div class="p-3 text-center bg-body-light border-bottom rounded-top">
                                    <p class="mt-2 mb-0 fw-medium">{{{ Auth::user()->name}}}</p>
                                </div>
                                <div role="separator" class="dropdown-divider m-0"></div>
                                <div class="p-2">
                                    <a class="dropdown-item d-flex align-items-center justify-content-between" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>

            <main id="main-container">
                {{ $slot }}
            </main>

            <footer id="page-footer" class="bg-body-light">
                <div class="content py-3">
                    <div class="row fs-sm">
                        <div class="col-sm-6 order-sm-2 py-1 text-center text-sm-end">
                            Feito com <i class="fa fa-heart text-danger"></i> e <i class="fa-solid fa-mug-saucer text-warning"></i> por <a class="fw-semibold"
                                href="https://www.linkedin.com/in/lawanmaciel" target="_blank">Lawan Maciel</a>
                        </div>
                        <div class="col-sm-6 order-sm-1 py-1 text-center text-sm-start">
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    @livewireScripts
    <script
  src="https://code.jquery.com/jquery-3.6.1.min.js"
  integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ="
  crossorigin="anonymous"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    @stack('js')
</body>
</html>

<link rel="stylesheet" href="{{ asset('sidebar-template/dist/style.css') }}">
<link rel="stylesheet" href="{{ asset('css/admin.css') }}">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Dosis:wght@200;300;400;500&display=swap" rel="stylesheet">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Rubik:wght@300;400;500;600&display=swap" rel="stylesheet">
<div class="header">
    <div class="profile">
        {{-- <a class="nav-link expand" data-widget="fullscreen" href="#" role="button">
            <i class="fas fa-expand"></i>
        </a> --}}
        <button type="submit modal-dropdown" onclick="dropdown()">
            <i class="fas fa-user-circle"></i>
                <span>
                    Olá, seja bem vindo <strong>{{ Auth::user()->name }}</strong>!
                </span>
            <i class="fas fa-chevron-down"></i>
            {{-- @if ($data['avatar'] == null) --}}

            {{-- @elseif(session()->get('tipo') == "facebook")
                <div class="avatar-img" style="background-image: url('{{ session()->get('avatar') }}')"></div>
            @else
                <div class="avatar-img" style="background-image: url('data:image/{{$data['ext_img']}};base64,{{$data['avatar']}}')"></div>
            @endif --}}
        </button>
       
        
        <div class="modal-dropdown2">
            <div class="titulo-profile">
                <i class="far fa-envelope"></i>
                {{ Auth::user()->email }}
            </div>

            <div class="linha-vertical">
                <span></span>
                <span></span>
            </div>
           
            <a href="{{ route('admin.usuarios') }}">
                <i class="far fa-user-circle"></i>
                Perfil
            </a>
            <a href="{{ route('admin.usuarios') }}">
                <i class="fas fa-cog"></i>
                Configurações
            </a>
            <a href="{{ route('logout') }}">
                <i class="fas fa-sign-out-alt"></i>
                Sair
            </a>
        </div>

    </div>
</div>
<div class="page-wrapper chiller-theme toggled">
    <nav id="sidebar" class="sidebar-wrapper">
        <div class="sidebar-content">
        <!-- sidebar-header  -->
        
        <!-- sidebar-search  -->
        <div class="sidebar-search">
            <li>
                <div class="d-flex form-pesquisa">
                    <div class="logo">
                        <img src="{{ asset('img/logo_barber.png') }}" alt="" srcset="">
                    </div>
                </div>
            </li>
        </div>
        <div class="sidebar-menu">
            <ul>
                <li>
                    <a href="{{ route('admin') }}">
                        <span>
                            <i class="fas fa-home"></i>Home
                        </span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.usuarios') }}">
                        <span>
                            <i class="fas fa-users-cog"></i>Usuários
                        </span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.clientes') }}">
                        <span>
                            <i class="fas fa-user-friends"></i>Clientes
                        </span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.servicos') }}">
                        <span>
                            <i class="far fa-list-alt"></i>Serviços
                        </span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.agendamentos') }}">
                        <span>
                            <i class="far fa-calendar-alt"></i>Agendamentos
                        </span>
                    </a>
                </li>
                {{-- <li class="sidebar-dropdown li-a">
                    <a>
                        <i class="fas fa-user-friends"></i><span>Elementos</span>
                    </a>
                    <div class="sidebar-submenu">
                        <ul>
                            <li>
                                <a href="#">
                                    teste
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    teste
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    teste
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    teste
                                </a>
                            </li>
                                
                        </ul>
                    </div>
                </li> --}}
            </ul>
        </div>
        <!-- sidebar-menu  -->
        </div>
    </nav>
</div>
<script src="{{ asset('js/jquery.js') }}"></script>
<script src="{{ asset('sidebar-template/dist/script.js') }}"></script>
<script src="{{ asset('js/Fullscreen.js') }}"></script>
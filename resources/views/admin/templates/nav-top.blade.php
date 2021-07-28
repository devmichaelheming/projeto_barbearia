{{-- MENU DE NAVEGAÇÃO --}}
<nav>
    <div class="header">
          
        <div class="profile">

            <button type="submit modal-dropdown" onclick="dropdown()">
                <i class="fas fa-chevron-down"></i>
                    Olá, seja bem vindo {{ Auth::user()->name }}!
                <div class="avatar-img" style="background-image: url('{{ asset('img/user2.png') }}')"></div>
            </button>
            
            <div class="modal-dropdown2">
                <div class="header-modal-dropdown2">
                    {{ Auth::user()->email }}
                </div>
                <a href="{{ route('admin.usuarios') }}">
                    <i class="far fa-address-card"></i>
                    Meu dados
                </a>
                <a href="{{ route('logout') }}">
                    <i class="fas fa-sign-out-alt"></i>
                    Sair
                </a>
            </div>

        </div>
    </div>
</nav>
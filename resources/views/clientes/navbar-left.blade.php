<div class="menu-left">
    <div class="logo-menu">
        <a href="{{ route('index') }}">
            <img src="{{ asset('img/logo.png') }}">
        </a>
    </div>
    <ul>
        <a href="{{ route('page.clientes') }}">
            <li>Meus dados</li>
        </a>
        <a href="{{ route('endereco.index') }}">
            <li>Endereço</li>
        </a>
        <a href="#">
            <li>Compras</li>
        </a>
        <a href="#">
            <li>Vendas</li>
        </a>
        <a href="#">
            <li>Notificações</li>
        </a>
        <a href="#">
            <li>Favoritos</li>
        </a>
    </ul>
    <div class="lado-direito">
        <ul>
            <a href="{{ route('page.clientes') }}">
                <li>Meus dados</li>
            </a>
            <a href="{{ route('endereco.index') }}">
                <li>Endereço</li>
            </a>
            <a href="#">
                <li>Compras</li>
            </a>
            <a href="#">
                <li>Vendas</li>
            </a>
            <a href="#">
                <li>Notificações</li>
            </a>
            <a href="#">
                <li>Favoritos</li>
            </a>
        </ul>
    </div>
    <button class="btn-responsive">
        <span></span>
        <span></span>
        <span></span>
    </button>
    
</div>
<script src="{{ asset('js/jquery.js') }}"></script>
<script src="{{ asset('css/bootstrap/js/bootstrap.js') }}"></script>
<script src="{{ asset('js/popper.js') }}"></script>
<script src="{{ asset('dropdown/js/custom.js') }}"></script>

<script>
    $(document).ready(function(){
        // $(window).scroll(function(){
        //     if (this.scrollY > 80) {
        //         $("nav").addClass("sticky");
        //         $(".categorias span").addClass("sticky-font");
        //     } else {
        //         $("nav").removeClass("sticky");
        //         $(".categorias span").removeClass("sticky-font");
        //     }
        // });
        $('.menu-left button').click(function (){
            $(this).toggleClass("active")
            $(".lado-direito").toggleClass("active")
        });
    });
</script>
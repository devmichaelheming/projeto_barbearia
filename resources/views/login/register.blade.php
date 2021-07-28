<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>LOGIN</title>
    {{-- LINKS CSS --}}
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap/css/bootstrap.css') }}">
    {{-- ICONS --}}
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
    {{-- FONTS --}}
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,600" rel="stylesheet" type="text/css">
</head>
<body>
    {{-- <nav>
        <div class="logo">
            <img src="{{ asset('img/logo.png') }}">
        </div>  
    </nav> --}}
    <div class="topo-login"></div>
    
    <div class="login-register">
        
        <form method="POST" action="{{ route('save.register') }}" autocomplete="off">
            @csrf
            <div class="header-login">
                <a href="{{ route('index') }}">
                    <img src="{{ asset('img/logo.png') }}">
                </a>
                <div class="title">CADASTRAR</div>
                <div class="linha-vertical"><span></span></div>
                <div class="conteudo-register">
                    <div class="bloco1">
                        <div class="group-register">
                            <div class="group">      
                                <input type="text" name="name" id="name" class="name" required>
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label>Nome</label>
                            </div>
                        </div>
                        <div class="group-register">
                            <div class="group">      
                                <input type="email" name="email" id="email" class="email" required>
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label>E-Mail</label>
                            </div>
                        </div>
                    </div>
                    <div class="bloco2">
                         <div class="group-register">
                            <div class="group">      
                                <input type="text" name="telefone" id="telefone" class="telefone" required>
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label>Telefone</label>
                            </div>
                        </div>
                         <div class="group-register">
                            <div class="group">      
                                <input type="text" name="cpf" id="cpf" class="cpf" required>
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label>Cpf</label>
                            </div>
                        </div>
                    </div>
                     <div class="bloco2">
                         <div class="group-register">
                            <div class="group">      
                                <input type="text" name="usuario" id="usuario" class="usuario" required>
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label>Usuário</label>
                            </div>
                        </div>
                         <div class="group-register">
                            <div class="group">      
                                <input type="password" name="password" id="password" class="password" required>
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label>Senha</label>
                            </div>
                        </div>
                    </div>

                </div>

                @if (session('mensagem'))
                    <div class="sacefull">
                        <div class="alert alert-success">
                            <span>
                                <i class="far fa-check-circle" style="padding-right:0.5rem;"></i>
                                {{ session('mensagem') }}
                            </span>
                            <div class="alert-close">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true"><i class="fas fa-times"></i></span>
                                </button>
                            </div>
                        </div>
                    </div>
                @elseif(session('invalido'))
                    <div class="alert alert-danger">
                        <span>
                            <i class="far fa-check-circle" style="padding-right:0.5rem;"></i>
                            {{ session('invalido') }}
                        </span>
                        <div class="alert-close">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true"><i class="fas fa-times"></i></span>
                            </button>
                        </div>
                    </div>
                @endif

                <div class="button-register">
                    <button type="submit">CADASTRAR</button>
                </div>
                 
                <div class="info-login">
                    <div class="title-info">
                        Ja é cadastrado ?
                    </div>
                    <a href="{{ route('index.login') }}">
                        <span>Logue-se aqui!</span>
                    </a>
                    {{-- <div class="more-login">
                        <div class="title-more">OUTROS MEIOS DE LOGIN</div>
                        <div class="bloco-more-items">
                            <a href="{{ route('login.facebook') }}">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <a href="{{ route('login.google') }}">
                                <i class="fab fa-google-plus-g"></i>
                            </a>
                        </div>
                    </div> --}}
                </div>
            </div>
        </form>
    </div>
    
    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="{{ asset('css/bootstrap/js/bootstrap.js') }}"></script>
    <script src="{{ asset('js/popper.js') }}"></script>
    <script src="{{ asset('mask/dist/jquery.mask.js')}}"></script>
    <script>
        
    var options_cpf = {
		onKeyPress: function (cpf, ev, el, op) {
			var masks = ['000.000.000-00'],
				mask = (cpf.length > 14) ? masks[1] : masks[0];
			el.mask(mask, op);
		}
	};
	
	$('#cpf').mask('000.000.000-00', options_cpf);
        
    var options_telefone = {
		onKeyPress: function (cpf, ev, el, op) {
			var masks = ['(00)0.0000-0000'],
				mask = (cpf.length > 15) ? masks[1] : masks[0];
			el.mask(mask, op);
		}
	};
	
	$('#telefone').mask('(00)0.0000-0000', options_telefone);

    </script>
</body>
</html>
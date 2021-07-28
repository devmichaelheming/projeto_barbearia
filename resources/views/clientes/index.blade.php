<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PÁGINA CLIENTES</title>
    {{-- LINKS CSS --}}
    <link rel="stylesheet" href="{{ asset('css/clientes.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('dropdown/css/custom.css') }}">
    {{-- ICONS --}}
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
    {{-- FONTS --}}
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,600" rel="stylesheet" type="text/css">
</head>
<body>
    <div class="topo-dash"></div>
    
    <div class="container-dash">
        <div class="dash-clientes">
           
            <div class="body-dash">
                @include('clientes.navbar-left')
                 <div class="conteudo-dash">
                     @include('clientes.modal')
                    <div class="body">
                        <div class="title-body">
                            MEUS DADOS
                        </div>
                        <div class="linha-vertical" style="padding-bottom: 0;"><span></span></div>
                        <div class="dados">
                            <div class="group-inputs-first">
                                <div class="avatar">
                                    {{-- <label for="avatar">EDITE AQUI SEU AVATAR</label> --}}
                                    @if ($data['avatar'] == null)
                                        <div class="avatar-img" style="background-image: url('{{ asset('img/user2.png') }}')">
                                    @elseif(session()->get('tipo') == "facebook")
                                        <div class="avatar-img" style="background-image: url('{{ session()->get('avatar') }}')">
                                    @else
                                        <div class="avatar-img" style="background-image: url('data:image/{{$data['ext_img']}};base64,{{$data['avatar']}}')">
                                    @endif
                                    
                                    @if (!session()->has('id') == null)
                                        <button type="button" class="botao-editar btn-editar" data-id="{{ url('avatar/') }}/{{ session()->get('id') }}">
                                            <span><i class="far fa-edit"></i></span>
                                        </button>
                                    @endif
                                        
                                    </div>
                                </div>
                                <div class="bloco-input-first">
                                    <label for="name">NOME:</label>
                                    <input type="text" name="name" value="{{ $data['name'] }}" disabled>
                                </div>
                                <div class="bloco-input-first">
                                    <label for="email">E-MAIL:</label>
                                    <input type="text" name="email" value="{{ $data['email'] }}" disabled>
                                </div>
                            </div>
                            @if (isset($data['telefone']) && (isset($data['cpf'])))
                                <div class="group-inputs">
                                    @if (isset($data['telefone']))
                                    <div class="bloco-input">
                                            <label for="telefone">TELEFONE:</label>
                                            <input type="text" name="telefone" value="{{ $data['telefone'] }}" disabled>
                                        </div>  
                                    @endif
                                    @if (isset($data['cpf']))
                                        <div class="bloco-input">
                                            <label for="cpf">CPF:</label>
                                            <input type="text" name="cpf" value="{{ $data['cpf'] }}" disabled>
                                        </div>
                                    @endif
                                </div>
                            @endif
                            @if (isset($data['usuario']) && isset($data['senha']))
                                <div class="group-inputs">
                                    @if (isset($data['usuario']))
                                        <div class="bloco-input">
                                            <label for="usuario">USUARIO:</label>
                                            <input type="text" name="usuario" value="{{ $data['usuario'] }}" disabled>
                                        </div>
                                    @endif
                                    @if (isset($data['senha']))
                                        <div class="bloco-input">
                                            <label for="senha">SENHA:</label>
                                            <input type="text" name="senha" value="{{ $data['senha'] }}" disabled>
                                        </div>
                                    @endif
                                </div>
                            @endif
                        </div>
                    </div>
                 </div>
            </div>
        </div>
    </div>
    <script>
         $(".menu-left ul li").mouseover(function(){
            $(this).css('background', '#5b2d83');
            $(this).css('color', 'white');
            $(this).css('transition', '0.1s linear');
        });
        $(".menu-left ul li").mouseout(function(){
            $(this).css('background', 'white');
            $(this).css('color', 'black');
            $(this).css('transition', '0.1s linear');
        });

        $(".avatar-img").mouseover(function(){
            $(this).find(".fa-edit").css('opacity', '1');
            $(this).find(".fa-edit").css('transition', '0.2s linear');
            $(this).addClass('filter2');
        });
        $(".avatar-img").mouseout(function(){
            $(this).find(".fa-edit").css('opacity', '0');
            $(this).find(".fa-edit").css('transition', '0.2s linear');
            $(this).removeClass('filter2');
        });
        $(document).on('click','.btn-editar', function(e){
			e.preventDefault();
			
			var bodyFormName = $('.modal-body');
			var modalName = $('.modal');
			var id = $(this).data('id')

			console.log(bodyFormName)
			console.log(modalName)
			console.log(id)
			
			$(modalName).modal('show'); 

			$.ajax({
				url: id,
				type: 'get',
				success: function(response){       
					$(bodyFormName).html(response);
				}
			});
			return false;
        });
    </script>
</body>
</html>
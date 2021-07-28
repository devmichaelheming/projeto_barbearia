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
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
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
                     @include('clientes.endereco.modal')
                    <div class="body">
                        <div class="endereco-geral">
                            <div class="title-body-endereco">
                                <span>
                                    MEUS ENDEREÇOS
                                    <div class="linha-vertical" style="padding-bottom: 0;"><span></span></div>
                                </span>
                                <div class="dados-endereco">
                                    <button type="button" class="button-cadastrar btn-cadastrar" data-id="{{ url('page/clientes/endereco/cadastrar') }}">
                                        <label>Adicionar endereço</label>
                                        <span><i class="fas fa-plus"></i></span>
                                    </button>
                                </div>
                            </div>

                            @if (session('mensagem'))
                                <div class="sacefull" style="width:100%;">
                                    <div class="alert alert-success" style="width:100%;">
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
                                <div class="alert alert-danger" style="width:100%;">
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

                            <div class="table">
                                <table id="table_id" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Estado</th>
                                            <th>Cidade</th>
                                            <th>Bairro</th>
                                            <th>Numero da casa</th>
                                            <th>Endereço</th>
                                            <th>Complemento</th>
                                            <th>Cep</th>
                                            <th>Editar / Remover</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @for ($i = 0; $i < sizeof($endereco); $i++)
                                            <tr>
                                                @isset($endereco[$i]['estado'])
                                                    <td>{{ $endereco[$i]['estado'] }}</td>
                                                @endisset
                                                @isset($endereco[$i]['cidade'])
                                                    <td>{{ $endereco[$i]['cidade'] }}</td>
                                                @endisset
                                                @isset($endereco[$i]['bairro'])
                                                    <td>{{ $endereco[$i]['bairro'] }}</td>
                                                @endisset
                                                @isset($endereco[$i]['numero'])
                                                    <td>{{ $endereco[$i]['numero'] }}</td>
                                                @endisset
                                                @isset($endereco[$i]['endereco'])
                                                    <td>{{ $endereco[$i]['endereco'] }}</td>
                                                @endisset
                                                @isset($endereco[$i]['complemento'])
                                                    <td>{{ $endereco[$i]['complemento'] }}</td>
                                                @endisset
                                                @isset($endereco[$i]['cep'])
                                                    <td>{{ $endereco[$i]['cep'] }}</td>
                                                @endisset
                                                <td>
                                                    <div class="botoes">
                                                        <button type="button" class="botao-editar btn-editar" style="margin-right: 10px;" data-id="{{ url('page/clientes/endereco/editar') }}/{{ $endereco[$i]['id'] }}"><span class="entypo-tools"><i class="fas fa-edit"></i></span></button>
                                                        <button type="button" class="botao-remover" data-id="{{ url('page/clientes/endereco/confirm') }}/{{ $endereco[$i]['id'] }}"><i class="far fa-trash-alt"></i></button>  
                                                    </div>
                                                </td>
                                            </tr>
                                        @endfor
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                 </div>
            </div>
        </div>
    </div>
    
    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="{{ asset('css/bootstrap/js/bootstrap.js') }}"></script>
    <script src="{{ asset('js/popper.js') }}"></script>
    <script src="{{ asset('dropdown/js/custom.js') }}"></script>

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

        // EDITAR CLIENTE
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

        // CADASTRAR CLIENTE
        $(document).on('click','.btn-cadastrar', function(e){
            e.preventDefault();

            var bodyFormName = $('.modal-body-cadastrar');
            var modalName = $('.modal-cadastrar');
            var idc = $(this).data('idc')

            console.log(bodyFormName)
            console.log(modalName)
            console.log(idc)

            $(modalName).modal('show'); 

            $.ajax({
                url: '{{ url('page/clientes/endereco/cadastrar') }}',
                type: 'get',
                success: function(response){
                    console.log(response)        
                    $(bodyFormName).html(response);
                }
            });
            return false;
        });

        // CONFIRMAR REMOVER
        $(document).on('click','.botao-remover', function(e){
            e.preventDefault();

            var bodyFormName = $('.modal-body-confirm');
            var modalName = $('.modal-confirm');
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

        // REMOVER
        $(document).on('click','.btn-remover', function(e){
            e.preventDefault();

            var bodyFormName = $('.modal-body-remover');
            var modalName = $('.modal-remover');
            var modalNamee = $('.modal-confirm');
            var id = $(this).data('id')

            console.log(bodyFormName)
            console.log(modalName)
            console.log(id)

            $(modalName).modal('show'); 

            $.ajax({
                url: id,
                type: 'get',
                success: function(response){
                    $(modalNamee).modal('hide'); 
                    $(bodyFormName).html(response);
                    // location.reload();
                }
            });
            location.reload();
            return true;
        });
    </script>
</body>
</html>
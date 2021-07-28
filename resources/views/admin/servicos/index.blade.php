<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>BARBER EASY - SERVIÇOS</title>
    {{-- LINKS CSS --}}
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('DataTables/datatables.css') }}">
    {{-- <link rel="stylesheet" href="{{ asset('css/login.css') }}"> --}}
    {{-- <link rel="stylesheet" href="{{ asset('glide/dist/css/glide.core.css') }}">
    <link rel="stylesheet" href="{{ asset('glide/dist/css/glide.theme.css') }}"> --}}
    {{-- ICONS --}}
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
    {{-- FONTS --}}
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,600" rel="stylesheet" type="text/css">
</head>

<body>
    @include('admin.templates.nav-left')
    @include('admin.servicos.modal')
    <div class="container-geral">
        <div class="header-container">
            <span>
                <i class="fas fa-toolbox"></i>
                Serviços
            </span>
        </div>
        <div class="body-container">
            
            <div class="title-body">
                <span>
                    Informação dos serviços cadastrados no sistema
                </span>
                <a href="{{ url('/admin/servicos/viewCadastrar') }}" class="button-cadastrar btn-cadastrar">
                    <span>Cadastrar</span>
                </a>
            </div>

            <table id="table_id" class="table table-striped table-bordered">
                
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

                <thead>
                    <tr>
                        <th>SERVIÇO</th>
                        <th>VALOR DO SERVIÇO</th>
                        <th>CRIADO EM</th>
                        <th>EDITAR / REMOVER</th>
                    </tr>
                </thead>
                <tbody>
                    @for ($i = 0; $i < sizeof($servicos); $i++)
                        <tr>
                            @isset($servicos[$i]['nome_servico'])
                            <td>{{ $servicos[$i]['nome_servico'] }}</td>
                            @endisset

                            @isset($servicos[$i]['valor_servico'])
                            <td>R$ {{ $servicos[$i]['valor_servico'] }}</td>
                            @endisset

                            @isset($servicos[$i]['created_at'])
                            <td>{{ date( 'd/m/Y - H:i' , strtotime($servicos[$i]['created_at'])) }}</td>
                            @endisset

                            <td>
                                <div class="botoes">
                                    <a href="{{ url('admin/servicos/editar') }}/{{ $servicos[$i]['id'] }}" class="botao-editar btn-editar" style="margin-right: 10px;">
                                        <span class="entypo-tools"><i class="fas fa-edit"></i></span>
                                    </a>
                                    <button type="button" class="editar btn-confirm" data-id="{{ url('admin/servicos/confirm') }}/{{ $servicos[$i]['id'] }}">
                                        <i class="far fa-trash-alt"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @endfor
                </tbody>
            </table>

        </div>
        <div class="footer-container">
            <span>Copyright - Todos os direitos reservados a barber easy.</span>
        </div>
    </div>
    
    <script src="{{ asset('js/jquery.js') }}" type="text/javascript"></script>
    <script src="{{ asset('css/bootstrap/js/bootstrap.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/popper.js') }}" ></script>
    <script src="{{ asset('DataTables/datatables.js') }}"></script>
    @include('admin.templates.script')
    <script>
        // CONFIRMAR REMOVER

        $(document).on('click','.btn-confirm', function(e){
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
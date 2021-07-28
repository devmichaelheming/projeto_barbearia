<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>BARBER EASY - AGENDAMENTOS</title>
    {{-- LINKS CSS --}}
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('DataTables/datatables.css') }}">
    {{-- ICONS --}}
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
    {{-- FONTS --}}
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,600" rel="stylesheet" type="text/css">
</head>

<body>
    @include('admin.templates.nav-left')
    @include('admin.agendamento.modal')
    <div class="container-geral">
        <div class="header-container">
            <span>
                <i class="far fa-calendar-alt"></i>
                Agendamento
            </span>
        </div>
        <div class="body-container">
            
            <div class="title-body">
                <span>
                    Informação dos clientes agendados no sistema
                </span>
                <a href="{{ url('/admin/agendamentos/viewCadastrar') }}" class="button-cadastrar btn-cadastrar">
                    <span>Agendar cliente</span>
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
                        <th>CLIENTE</th>
                        <th>DATA / HORA</th>
                        <th>VALOR TOTAL</th>
                        <th>VISUALIZAR SERVIÇOS</th>
                        <th>EDITAR / REMOVER</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($agendamentos_array as $key => $agenda)
                        <tr>
                            @isset($agenda->id_cliente)
                                <td>
                                    {{ $agenda->id_cliente }}
                                </td>
                            @endisset

                            @isset($agenda->data)
                                <td>{{ date( 'd/m/Y' , strtotime($agenda->data)) }} - {{ $agenda->hora }}</td>
                            @endisset

                            @isset($agenda->valor_total)
                                <td>R$ {{ $agenda->valor_total }}</td>
                            @endisset

                            @isset($agenda->id)
                                <td>
                                    <div class="botoes">
                                        <button type="button" class="editar btn-editar" data-id="{{ url('admin/agendamentos/vermais') }}/{{ $agenda->id }}">
                                            <span class="entypo-tools"><i class="fas fa-ellipsis-h"></i></span>
                                        </button>
                                    </div>
                                </td>
                            @endisset

                            @isset($agenda->id)
                                <td>
                                    <div class="botoes">
                                        <a href="{{ url('admin/agendamentos/editar') }}/{{ $agenda->id }}" class="botao-editar btn-cadastrar" style="margin-right: 10px;background:transparent;">
                                            <span class="entypo-tools"><i class="fas fa-edit"></i></span>
                                        </a>
                                        <button type="button" class="editar btn-confirm" data-id="{{ url('admin/agendamentos/confirm') }}/{{ $agenda->id }}">
                                            <i class="far fa-trash-alt"></i>
                                        </button>
                                    </div>
                                </td>
                            @endisset
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
    <div class="footer-container">
        <span>Copyright - Todos os direitos reservados a barber easy.</span>
    </div>
    
    <script src="{{ asset('js/jquery.js') }}" type="text/javascript"></script>
    <script src="{{ asset('css/bootstrap/js/bootstrap.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/popper.js') }}" ></script>
    <script src="{{ asset('DataTables/datatables.js') }}"></script>
    @include('admin.templates.script')
    <script>
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

        // $(document).on('click','.btn-cadastrar', function(e){
        //     e.preventDefault();
            
        //     vvar bodyFormName = $('.modal-body-cadastrar');
        //     var modalName = $('.modal-cadastrar');
        //     var id = $(this).data('id')

        //     console.log(bodyFormName)
        //     console.log(modalName)
        //     console.log(id)
            
        //     $(modalName).modal('show'); 

        //     $.ajax({
        //     url: id,
        //     type: 'get',
        //     success: function(response){       
        //         $(bodyFormName).html(response);
        //     }
        //     });
        //     return false;
        // });

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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>BARBER EASY - CADASTRAR ADMINISTRADOR</title>
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
    <div class="conteudo">
        <div class="template">

            <div class="header-form">
                <a href="{{ route('admin.usuarios') }}">
                    <div class="back">
                        <i class="fas fa-arrow-left"></i>
                        <span>VOLTAR</span>
                    </div>
                </a>
                <div class="info">
                    <i class="fas fa-info"></i>
                    <span>CADASTRAR ADMINISTRADOR</span>
                </div>
            </div>

            <form class="form-horizontal" id="form" role="form" method="post" action="{{ route('usuarios.cadastrar')}}" enctype="multipart/form-data" >
                @csrf
                <div class="conteudo-login">
                    <div class="bloco1">
                        <div class="group"> 
                            <label>Usuario</label>     
                            <input type="text" name="name" id="name" class="name" placeholder="Insira aqui o nome de usuário..." required>
                        </div>

                        <div class="group">  
                            <label>E-Mail</label>    
                            <input type="email" name="email" id="email" class="email" placeholder="Insira aqui o seu email..." required>
                        </div>

                        <div class="group">      
                            <label>Senha</label>
                            <input type="password" name="password" id="password" class="password" placeholder="Insira aqui a sua senha..." required>
                        </div>
                    </div>
                    <div class="bloco2">
                        <div class="header-bloco2">
                            <i class="fas fa-user-lock"></i>
                            <span>PERMISSÕES DOS ADMINISTRADORES</span>
                        </div>

                        <div class="permissions">

                            <div class="group-permission">
                                <div class="title-permission">
                                    Permissão dos usuários
                                </div>
                                <div class="form-group clearfix">
                                    <div class="icheck-success d-inline">
                                        <input type="checkbox" name="pvisualizar_usuarios" id="pvisualizar_usuarios">
                                        <label for="pvisualizar_usuarios">
                                            Visualizar usuários
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group clearfix">
                                    <div class="icheck-success d-inline">
                                        <input type="checkbox" name="pcadastrar_usuarios"  id="pcadastrar_usuarios">
                                        <label for="pcadastrar_usuarios">
                                            Cadastrar usuários
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group clearfix">
                                    <div class="icheck-success d-inline">
                                        <input type="checkbox" name="peditar_usuarios"  id="peditar_usuarios">
                                        <label for="peditar_usuarios">
                                            Editar usuários
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group clearfix">
                                    <div class="icheck-success d-inline">
                                        <input type="checkbox" name="pdeletar_usuarios"  id="pdeletar_usuarios">
                                        <label for="pdeletar_usuarios">
                                            Deletar usuários
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="group-permission">
                                <div class="title-permission">
                                    Permissão dos clientes
                                </div>
                                <div class="form-group clearfix">
                                    <div class="icheck-success d-inline">
                                        <input type="checkbox" name="pvisualizar_clientes" id="pvisualizar_clientes">
                                        <label for="pvisualizar_clientes">
                                            Visualizar clientes
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group clearfix">
                                    <div class="icheck-success d-inline">
                                        <input type="checkbox" name="pcadastrar_clientes" id="pcadastrar_clientes">
                                        <label for="pcadastrar_clientes">
                                            Cadastrar clientes
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group clearfix">
                                    <div class="icheck-success d-inline">
                                        <input type="checkbox" name="peditar_clientes" id="peditar_clientes">
                                        <label for="peditar_clientes">
                                            Editar clientes
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group clearfix">
                                    <div class="icheck-success d-inline">
                                        <input type="checkbox" name="pdeletar_clientes" id="pdeletar_clientes">
                                        <label for="pdeletar_clientes">
                                            Deletar clientes
                                        </label>
                                    </div>
                                </div>
                            </div>
                            

                        </div>

                    </div>
                </div>

                <button type="submit" class="button-cadastrar">Cadastrar</button>
            </form>
        </div>
    </div>
    <script src="{{ asset('jquery-validation/dist/jquery.validate.js') }}"></script>
    <script src="{{ asset('mask/dist/jquery.mask.js')}}"></script>
    <script>
        var options_cep = {
            onKeyPress: function (cpf, ev, el, op) {
                var masks = ['00000-000'],
                    mask = (cpf.length > 14) ? masks[1] : masks[0];
                el.mask(mask, op);
            }
        };
        $('#cep').mask('00000-000', options_cep);
        $('form#form').validate({
            rules: {
                name: {
                    required: true
                },
                email: {
                    required: true
                },
                password: {
                    required: true
                },
            }
        })
        function isNumber(evt) {
            evt = (evt) ? evt : window.event;
            var charCode = (evt.which) ? evt.which : evt.keyCode;
            if (charCode > 31 && (charCode < 48 || charCode > 57)) {
                return false;
            }
            return true;
        }
    </script>
</body>
</html>
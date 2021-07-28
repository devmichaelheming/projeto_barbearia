<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>BARBER EASY - CADASTRAR CLIENTE</title>
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
                <a href="{{ route('admin.clientes') }}">
                    <div class="back">
                        <i class="fas fa-arrow-left"></i>
                        <span>VOLTAR</span>
                    </div>
                </a>
                <div class="info">
                    <i class="fas fa-info"></i>
                    <span>CADASTRAR CLIENTE</span>
                </div>
            </div>

            <form class="form-horizontal" id="form" role="form" method="post" action="{{ route('clientes.cadastrar')}}" enctype="multipart/form-data" >
                @csrf
                <div class="conteudo-login">
                    <div class="bloco1">

                        <div class="sessao">
                            <i class="fas fa-user-alt"></i>
                            <span>Informações pessoais</span>
                        </div>

                        <div class="group"> 
                            <label>Nome</label>     
                            <input type="text" name="nome" id="nome" class="nome" placeholder="Nome" required>
                        </div>

                        <div class="group">  
                            <label>Telefone</label>    
                            <input type="text" name="telefone" id="telefone" class="telefone" onkeypress="return isNumber(event)" placeholder="(00)0.0000-0000" required>
                        </div>

                        <div class="group">  
                            <label>Sexo</label>    
                            <select name="sexo" class="sexo" id="sexo">
                                <option value="feminino">Feminino</option>
                                <option value="masculino">Masculino</option>
                            </select>
                        </div>

                        <div class="sessao">
                            <i class="fas fa-user-alt"></i>
                            <span>Endereço</span>
                        </div>
                   
                        <div class="form-group1">
                            <div class="group"> 
                                <label>Endereço</label>     
                                <input type="text" name="endereco" id="endereco" class="endereco" placeholder="Endereço" required>
                            </div>
                            <div class="group"> 
                                <label>Número</label>     
                                <input type="text" name="numero" id="numero" class="numero" onkeypress="return isNumber(event)" placeholder="Número" required>
                            </div>
                        </div>

                        <div class="group">  
                            <label>Bairro</label>    
                            <input type="text" name="bairro" id="bairro" class="bairro" placeholder="Bairro" required>
                        </div>
                        <div class="group">  
                            <label>Descrição (opcional)</label>    
                            <textarea name="descricao" id="descricao" rows="5" placeholder="Insira aqui uma descrição do cliente"></textarea>
                        </div>
                    </div>
                </div>

                <button type="submit" class="button-cadastrar">Cadastrar</button>
            </form>
        </div>
    </div>
    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="{{ asset('jquery-validation/dist/jquery.validate.js') }}"></script>
    <script src="{{ asset('mask/dist/jquery.mask.js')}}"></script>
    <script>
        $('form#form').validate({
            rules: {
                nome: {
                    required: true
                },
                telefone: {
                    required: true
                },
                sexo: {
                    required: true
                },
                endereco: {
                    required: true
                },
                numero: {
                    required: true
                },
                bairro: {
                    required: true
                },

            }
        });
       
        var options_phone = {
            onKeyPress: function (cpf, ev, el, op) {
                var masks = ['(00)0.0000-0000'],
                    mask = (cpf.length > 14) ? masks[1] : masks[0];
                el.mask(mask, op);
            }
        };

        $('#telefone').mask('(00)0.0000-0000', options_phone);

        function isNumber(evt) {
            evt = (evt) ? evt : window.event;
            var charCode = (evt.which) ? evt.which : evt.keyCode;
            if (charCode > 31 && (charCode < 48 || charCode > 57)) {
                return false;
            }
            return true;
        }

        !function(e){e.fn.niceSelect=function(t){function s(t){t.after(e("<div></div>").addClass("nice-select").addClass(t.attr("class")||"").addClass(t.attr("disabled")?"disabled":"").attr("tabindex",t.attr("disabled")?null:"0").html('<span class="current"></span><ul class="list"></ul>'));var s=t.next(),n=t.find("option"),i=t.find("option:selected");s.find(".current").html(i.data("display")||i.text()),n.each(function(t){var n=e(this),i=n.data("display");s.find("ul").append(e("<li></li>").attr("data-value",n.val()).attr("data-display",i||null).addClass("option"+(n.is(":selected")?" selected":"")+(n.is(":disabled")?" disabled":"")).html(n.text()))})}if("string"==typeof t)return"update"==t?this.each(function(){var t=e(this),n=e(this).next(".nice-select"),i=n.hasClass("open");n.length&&(n.remove(),s(t),i&&t.next().trigger("click"))}):"destroy"==t?(this.each(function(){var t=e(this),s=e(this).next(".nice-select");s.length&&(s.remove(),t.css("display",""))}),0==e(".nice-select").length&&e(document).off(".nice_select")):console.log('Method "'+t+'" does not exist.'),this;this.hide(),this.each(function(){var t=e(this);t.next().hasClass("nice-select")||s(t)}),e(document).off(".nice_select"),e(document).on("click.nice_select",".nice-select",function(t){var s=e(this);e(".nice-select").not(s).removeClass("open"),s.toggleClass("open"),s.hasClass("open")?(s.find(".option"),s.find(".focus").removeClass("focus"),s.find(".selected").addClass("focus")):s.focus()}),e(document).on("click.nice_select",function(t){0===e(t.target).closest(".nice-select").length&&e(".nice-select").removeClass("open").find(".option")}),e(document).on("click.nice_select",".nice-select .option:not(.disabled)",function(t){var s=e(this),n=s.closest(".nice-select");n.find(".selected").removeClass("selected"),s.addClass("selected");var i=s.data("display")||s.text();n.find(".current").text(i),n.prev("select").val(s.data("value")).trigger("change")}),e(document).on("keydown.nice_select",".nice-select",function(t){var s=e(this),n=e(s.find(".focus")||s.find(".list .option.selected"));if(32==t.keyCode||13==t.keyCode)return s.hasClass("open")?n.trigger("click"):s.trigger("click"),!1;if(40==t.keyCode){if(s.hasClass("open")){var i=n.nextAll(".option:not(.disabled)").first();i.length>0&&(s.find(".focus").removeClass("focus"),i.addClass("focus"))}else s.trigger("click");return!1}if(38==t.keyCode){if(s.hasClass("open")){var l=n.prevAll(".option:not(.disabled)").first();l.length>0&&(s.find(".focus").removeClass("focus"),l.addClass("focus"))}else s.trigger("click");return!1}if(27==t.keyCode)s.hasClass("open")&&s.trigger("click");else if(9==t.keyCode&&s.hasClass("open"))return!1});var n=document.createElement("a").style;return n.cssText="pointer-events:auto","auto"!==n.pointerEvents&&e("html").addClass("no-csspointerevents"),this}}(jQuery);

        $(document).ready(function() {
            $('.sexo').niceSelect();
        });

    </script>
</body>
</html>

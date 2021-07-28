<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>BARBER EASY - AGENDAR CLIENTE</title>
    {{-- LINKS CSS --}}
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('DataTables/datatables.css') }}">
    <link rel="stylesheet" href="{{ asset('select2/css/select2.css') }}">
    {{-- ICONS --}}
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
    {{-- FONTS --}}
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,600" rel="stylesheet" type="text/css">
</head>
<body>
    <div class="conteudo">
        <div class="template">

            <div class="header-form">
                <a href="{{ route('admin.agendamentos') }}">
                    <div class="back">
                        <i class="fas fa-arrow-left"></i>
                        <span>VOLTAR</span>
                    </div>
                </a>
                <div class="info">
                    <i class="fas fa-info"></i>
                    <span>AGENDAR CLIENTE</span>
                </div>
            </div>

            <form class="form-horizontal" id="form" role="form" autocomplete="off" method="post" action="{{ route('agendamentos.cadastrar')}}" enctype="multipart/form-data" >
                @csrf
                <div class="conteudo-login">
                    <div class="bloco1">

                        <div class="group">  
                            <label>Cliente</label>    
                            <select name="cliente" class="select" id="cliente">
                                @foreach ($clientes as $cliente)
                                    <option value="{{ $cliente['id'] }}">{{ $cliente['nome'] }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="group">  
                            <label>Serviços</label>  
                            <div class="content-select">
                            <select class="select2" name="servico[]" multiple="multiple" required data-placeholder="Selecione o serviço" data-dropdown-css-class="select2-purple" style="width: 100%;">
                                @foreach ($servicos as $servico)
                                    <option value="{{ $servico['id'] }}">{{ $servico['nome_servico'] }}</option>
                                @endforeach
                            </select>
                        </div>
                        </div>

                        <div class="group"> 
                            <label>Horário de atendimento</label>     
                            <input type="datetime-local" name="horarios" id="horarios" min="{{ str_replace(' ', 'T', str_replace('/', '-', date('Y/m/d H:i'))) }}" class="horarios">
                        </div>
                        {{-- <label for="hora-cons">Escolha o horário da consulta (aberto das 12:00 às 18:00): </label>
                        <input id="hora-cons" type="time" name="hora-cons"
                                min="12:00" max="18:00">
                        <span class="validacao"></span> --}}
                    </div>
                </div>

                <button type="submit" class="button-cadastrar">Cadastrar</button>
            </form>
        </div>
    </div>
    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="{{ asset('jquery-validation/dist/jquery.validate.js') }}"></script>
    <script src="{{ asset('mask/dist/jquery.mask.js')}}"></script>
    <script src="{{ asset('select2/js/select2.full.min.js') }}"></script>
    <script>
        
        $('.select2').select2()

        jQuery.extend(jQuery.validator.messages, {
            required: "Este campo é obrigatório.",
            remote: "Please fix this field.",
            email: "Please enter a valid email address.",
            url: "Please enter a valid URL.",
            date: "Please enter a valid date.",
            dateISO: "Please enter a valid date (ISO).",
            number: "Please enter a valid number.",
            digits: "Please enter only digits.",
            creditcard: "Please enter a valid credit card number.",
            equalTo: "Please enter the same value again.",
            accept: "Please enter a value with a valid extension.",
            maxlength: jQuery.validator.format("Please enter no more than {0} characters."),
            minlength: jQuery.validator.format("Please enter at least {0} characters."),
            rangelength: jQuery.validator.format("Please enter a value between {0} and {1} characters long."),
            range: jQuery.validator.format("Please enter a value between {0} and {1}."),
            max: jQuery.validator.format("Please enter a value less than or equal to {0}."),
            min: jQuery.validator.format("Insira um data e hora maior que {0}.")
        });
        
        $('form#form').validate({
            rules: {
                horarios: {
                    required: true
                },
                servico: {
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
            $('.select').niceSelect();
        });
        
    </script>
</body>
</html>

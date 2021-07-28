<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>DASHBOARD - PRINCIPAL</title>
    {{-- LINKS CSS --}}
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('DataTables/datatables.css') }}">
    <link rel="stylesheet" href="{{ asset('agenda/assets/css/style.css') }}">
    {{-- <link rel="stylesheet" href="{{ asset('fullcalendar/main.css') }}"> --}}
    {{-- <link rel="stylesheet" href="{{ asset('glide/dist/css/glide.core.css') }}">
    <link rel="stylesheet" href="{{ asset('glide/dist/css/glide.theme.css') }}"> --}}
    {{-- ICONS --}}
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
    {{-- FONTS --}}
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,600" rel="stylesheet" type="text/css">
      <script>document.getElementsByTagName("html")[0].className += " js";</script>
</head>

<body>
  @include('admin.usuarios.modal')
  @include('admin.templates.nav-left')

    <div class="container-geral">
        <div class="inicial">

            <!-- Content Wrapper. Contains page content -->
            {{-- <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Calendar</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Calendar</li>
                        </ol>
                    </div>
                    </div>
                </div><!-- /.container-fluid -->
                </section>

                <!-- Main content -->
                <section class="content">
                <div class="container-fluid">
                    <div class="row">
                    <div class="col-md-3" style="display:none;">
                        <div class="sticky-top mb-3">
                        <div class="card">
                            <div class="card-header">
                            <h4 class="card-title">Draggable Events</h4>
                            </div>
                            <div class="card-body">
                            <!-- the events -->
                            <div id="external-events">
                                <div class="external-event bg-success">Lunch</div>
                                <div class="external-event bg-warning">Go home</div>
                                <div class="external-event bg-info">Do homework</div>
                                <div class="external-event bg-primary">Work on UI design</div>
                                <div class="external-event bg-danger">Sleep tight</div>
                                <div class="checkbox">
                                <label for="drop-remove">
                                    <input type="checkbox" id="drop-remove">
                                    remove after drop
                                </label>
                                </div>
                            </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                        <div class="card">
                            <div class="card-header">
                            <h3 class="card-title">Create Event</h3>
                            </div>
                            <div class="card-body">
                            <div class="btn-group" style="width: 100%; margin-bottom: 10px;">
                                <ul class="fc-color-picker" id="color-chooser">
                                <li><a class="text-primary" href="#"><i class="fas fa-square"></i></a></li>
                                <li><a class="text-warning" href="#"><i class="fas fa-square"></i></a></li>
                                <li><a class="text-success" href="#"><i class="fas fa-square"></i></a></li>
                                <li><a class="text-danger" href="#"><i class="fas fa-square"></i></a></li>
                                <li><a class="text-muted" href="#"><i class="fas fa-square"></i></a></li>
                                </ul>
                            </div>
                            <!-- /btn-group -->
                            <div class="input-group">
                                <input id="new-event" type="text" class="form-control" placeholder="Event Title">

                                <div class="input-group-append">
                                <button id="add-new-event" type="button" class="btn btn-primary">Add</button>
                                </div>
                                <!-- /btn-group -->
                            </div>
                            <!-- /input-group -->
                            </div>
                        </div>
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-md-12">
                        <div class="card card-primary">
                        <div class="card-body p-0">
                            <!-- THE CALENDAR -->
                            <div id="calendar"></div>
                        </div>
                        <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div><!-- /.container-fluid -->
                </section>
                <!-- /.content -->
            </div> --}}

          <div class="cd-schedule cd-schedule--loading margin-top-lg margin-bottom-lg js-cd-schedule">
            <div class="cd-schedule__timeline">
              <ul>
                <li><span>08:00</span></li>
                <li><span>08:30</span></li>
                <li><span>09:00</span></li>
                <li><span>09:30</span></li>
                <li><span>10:00</span></li>
                <li><span>10:30</span></li>
                <li><span>11:00</span></li>
                <li><span>11:30</span></li>
                <li><span>12:00</span></li>
                <li><span>12:30</span></li>
                <li><span>13:00</span></li>
                <li><span>13:30</span></li>
                <li><span>14:00</span></li>
                <li><span>14:30</span></li>
                <li><span>15:00</span></li>
                <li><span>15:30</span></li>
                <li><span>16:00</span></li>
                <li><span>16:30</span></li>
                <li><span>17:00</span></li>
                <li><span>17:30</span></li>
                <li><span>18:00</span></li>
              </ul>
            </div> <!-- .cd-schedule__timeline -->
          
            <div class="cd-schedule__events">
              <ul>
                  <li class="cd-schedule__group">
                    <div class="cd-schedule__top-info"><span>Segunda-Feira</span></div>
                    <ul>
                      @if (isset($agendamento[0]))
                        @foreach ($agendamento as $item)
                          @if ($item->dia == 'Segunda-Feira')
                            <li class="cd-schedule__event">
                              <a data-start="{{ $item['hora'] }}" data-id="{{ $item['id'] }}" data-content="{{ $item['id_cliente'] }}" data-event="event-1" href="#0">
                                <em class="cd-schedule__name">{{ $item['id_cliente'] }}</em>
                              </a>
                            </li>
                          @endif
                        @endforeach
                      @endif
                    </ul>
                  </li>
              
                  <li class="cd-schedule__group">
                    <div class="cd-schedule__top-info"><span>Terça-Feira</span></div>
            
                    <ul>
                      @if (isset($agendamento[0]))
                      @foreach ($agendamento as $item)
                        @if ($item->dia == 'Terça-Feira')
                          <li class="cd-schedule__event">
                            <a data-start="{{ $item['hora'] }}"  data-content="event-rowing-workout" data-event="event-2" href="#0">
                              <em class="cd-schedule__name">{{ $item['id_cliente'] }}</em>
                            </a>
                          </li>
                        @endif
                      @endforeach
                      @endif
                    </ul>
                  </li>
                 
                  <li class="cd-schedule__group">
                    <div class="cd-schedule__top-info"><span>Quarta-Feira</span></div>
                    <ul>
                      @if (isset($agendamento[0]))
                      @foreach ($agendamento as $item)
                        @if ($item->dia == 'Quarta-Feira')
                          <li class="cd-schedule__event">
                            <a data-start="{{ $item['hora'] }}" data-content="event-restorative-yoga" data-id="{{ $item['id'] }}" data-event="event-4" href="#0">
                              <em class="cd-schedule__name">{{ $item['id_cliente'] }}</em>
                            </a>
                          </li>
                        @endif
                      @endforeach
                      @endif
                    </ul>
                  </li>
            
                  <li class="cd-schedule__group">
                    <div class="cd-schedule__top-info"><span>Quinta-Feira</span></div>
        
                    <ul>
                      @if (isset($agendamento[0]))
                      @if ($item->dia == 'Quinta-Feira')
                        <li class="cd-schedule__event">
                          <a data-start="{{ $item['hora'] }}" data-content="event-restorative-yoga" data-id="{{ $item['id'] }}" data-content="event-abs-circuit" data-event="event-1" href="#0">
                            <em class="cd-schedule__name">{{ $item['id_cliente'] }}</em>
                          </a>
                        </li>
                      @endif
                      @endif
                    </ul>

                  </li>
            
                  <li class="cd-schedule__group">
                    <div class="cd-schedule__top-info"><span>Sexta-Feira</span></div>
            
                    <ul>
                      @if (isset($agendamento[0]))
                        @if ($item->dia == 'Sexta-Feira')
                          <li class="cd-schedule__event">
                            <a data-start="{{ $item['hora'] }}" data-id="{{ $item['id'] }}" data-content="event-rowing-workout" data-event="event-2" href="#0">
                              <em class="cd-schedule__name">{{ $item['id_cliente'] }}</em>
                            </a>
                          </li>
                        @endif
                      @endif
                    </ul>
                  </li>
            
                  <li class="cd-schedule__group">
                    <div class="cd-schedule__top-info"><span>Sábado</span></div>
            
                    <ul>
                      @if (isset($agendamento[0]))
                       @if ($item->dia == 'Sábado')
                        <li class="cd-schedule__event">
                          <a data-start="{{ $item['hora'] }}" data-id="{{ $item['id'] }}" data-content="event-rowing-workout" data-event="event-2" href="#0">
                            <em class="cd-schedule__name">{{ $item['id_cliente'] }}</em>
                          </a>
                        </li>
                      @endif
                      @endif
                    </ul>
                  </li>

                </ul>
            </div>
          
            <div class="cd-schedule-modal">
              <header class="cd-schedule-modal__header">
                <div class="cd-schedule-modal__content">
                  <span class="cd-schedule-modal__date"></span>
                  <h3 class="cd-schedule-modal__name"></h3>
                </div>

                <div class="cd-schedule-modal__header-bg"></div>
              </header>

              <div class="cd-schedule-modal__body">
                <div class="cd-schedule-modal__event-info">
                  <div class="cd-schedule-modal__id"></div>
                  <script>
                    let teste = $('.cd-schedule-modal__id').val()
                    console.log('teste');
                  </script>
                  Cliente agendado para
                  
                </div>
                <div class="cd-schedule-modal__body-bg"></div>
              </div>

              <a href="#0" class="cd-schedule-modal__close text-replace">Close</a>
            </div>
          
            <div class="cd-schedule__cover-layer"></div>
          </div>

            {{-- <img src="{{ asset('img/logo.png') }}"> --}}
        </div>
    </div>
    <div class="footer-container">
      <span>Copyright - Todos os direitos reservados a barber easy.</span>
    </div>
    
    <script src="{{ asset('js/jquery.js') }}" type="text/javascript"></script>
    <script src="{{ asset('css/bootstrap/js/bootstrap.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/popper.js') }}" ></script>
    <script src="{{ asset('DataTables/datatables.js') }}"></script>
    <script src="{{ asset('agenda/assets/js/util.js') }}"></script>
    <script src="{{ asset('agenda/assets/js/main.js') }}"></script>
    {{-- <script src="{{ asset('moment/moment.min.js') }}"></script>
    <script src="{{ asset('fullcalendar/main.js') }}"></script> --}}
    @include('admin.templates.script')
    <script>
      
      // $.notify({
      //   // options
      //   icon: 'glyphicon glyphicon-warning-sign',
      //   title: 'Bootstrap notify',
      //   message: 'Turning standard Bootstrap alerts into "notify" like notifications',
      //   url: 'https://github.com/mouse0270/bootstrap-notify',
      //   target: '_blank'
      // },{
      //   // settings
      //   element: 'body',
      //   position: null,
      //   type: "info",
      //   allow_dismiss: true,
      //   newest_on_top: false,
      //   showProgressbar: false,
      //   placement: {
      //     from: "top",
      //     align: "right"
      //   },
      //   offset: 20,
      //   spacing: 10,
      //   z_index: 1031,
      //   delay: 5000,
      //   timer: 1000,
      //   url_target: '_blank',
      //   mouse_over: null,
      //   animate: {
      //     enter: 'animated fadeInDown',
      //     exit: 'animated fadeOutUp'
      //   },
      //   onShow: null,
      //   onShown: null,
      //   onClose: null,
      //   onClosed: null,
      //   icon_type: 'class',
      //   template: '<div data-notify="container" class="col-xs-11 col-sm-3 alert alert-{0}" role="alert">' +
      //     '<button type="button" aria-hidden="true" class="close" data-notify="dismiss">×</button>' +
      //     '<span data-notify="icon"></span> ' +
      //     '<span data-notify="title">{1}</span> ' +
      //     '<span data-notify="message">{2}</span>' +
      //     '<div class="progress" data-notify="progressbar">' +
      //       '<div class="progress-bar progress-bar-{0}" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>' +
      //     '</div>' +
      //     '<a href="{3}" target="{4}" data-notify="url"></a>' +
      //   '</div>' 
      // });
    </script>
</body>

</html>
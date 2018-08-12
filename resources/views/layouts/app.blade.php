<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title',config('app.name'))</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.min.css')}}">
    <!-- Font Awesome -->
    <link rel="stylesheet" type="text/css" href="{{asset('css/font-awesome.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" type="text/css" href="{{asset('css/AdminLTE.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/glyphicons.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('plugins/datatables/dataTables.bootstrap.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('plugins/datatables/extensions/Responsive/css/dataTables.responsive.css')}}">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{asset('css/_all-skins.min.css')}}">

    <!-- Datepicker Files -->
    <link rel="stylesheet" href="{{asset('plugins/jquery_datepicker/jquery-ui.css')}}">

    <!-- TimePicker -->
    <link rel="stylesheet" href="{{ asset('plugins/timePicker/jquery.timepicker.min.css') }}">

    <!-- Fileinput -->
    <link rel="stylesheet" href="{{ asset('plugins/fileinput/css/fileinput.min.css') }}">

    <!-- lightbox -->
    <link rel="stylesheet" href="{{ asset('plugins/lightbox/ekko-lightbox.css') }}">

    <link rel="stylesheet" href="{{ asset('plugins/highchart/code/highcharts.css') }}">

    <!-- estilos propios de css -->
    <link rel="stylesheet" href="{{asset('css/ep.css')}}">

  	<style type="text/css">
	    .perfil{
			  position: relative;
			  background: #fff;
			  border: 1px solid #f4f4f4;
			  padding: 20px;
			  margin: 10px 25px;
			}
	  </style>
  </head>
  <body class="hold-transition skin-red sidebar-mini">
    <div class="wrapper">
      <header class="main-header">
        <!-- Logo -->
        <a href="{{route('dashboard')}}" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini">
          	<!-- <img class="img-responsive" src="{{ asset('img/logo_blanco.png') }}" alt="Logo" style="height:30px;margin:10px 0 0 10px"> -->
            IP
          </span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>Inmuebles Peru</b></span>
        </a>

        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Navegación</span>
          </a>
          <!-- Navbar Right Menu -->
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- Messages: style can be found in dropdown.less-->
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <span class="">{{ Auth::user()->name }} &nbsp;&nbsp;</span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <p>
                      DESCRIPCCION
                    </p>
                  </li>

                  <!-- Menu Footer-->
                  <li class="user-footer">
                  	<div class="pull-left">
                  		<a href="{{route('perfil')}}" class="btn btn-flat btn-default"><i class="fa fa-user-circle" aria-hidden="true"></i> Perfil</a>
                  	</div>

                   	<div class="pull-right">
                      <form id="logout-form" action="{{ route('logout') }}" method="POST">
                        {{ csrf_field() }}
                        <button class="btn btn-flat btn-default" type="submit"><i class="fa fa-sign-out" aria-hidden="true"></i> Salir</button>
                      </form>
                    </div>
                  </li>
                </ul>
              </li>
            </ul>
          </div>
        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">

            <li class="treeview">
              <a href="#">
                <i class="fa fa-users"></i>
                <span>Usuarios</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="{{ route('users.index') }}"><i class="fa fa-circle-o"></i>Ver usuarios</a></li>
                <li><a href="{{ route('users.create') }}"><i class="fa fa-circle-o"></i>Agregar usuario</a></li>
                <li><a href="{{ route('redes.index') }}"><i class="fa fa-circle-o"></i>Grupos</a></li>
              </ul>
            </li>

            <!-- Prospectos -->
            <li class="treeview">
              <a href="#">
                <i class="fa fa-list-alt"></i>
                <span>Prospecto</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="{{ route('prospectos.create') }}"><i class="fa fa-circle-o"></i> Nuevo Prospecto</a></li>
                <li><a href="{{ route('prospectos.index') }}"><i class="fa fa-circle-o"></i> Ver Prospectos</a></li>
                <li><a href=""><i class="fa fa-circle-o"></i> Reporte</a></li>
              </ul>
            </li>

            <!-- requerimiento -->
            <li class="treeview">
              <a href="#">
                <i class="fa fa-list-alt"></i>
                <span>Requerimientos</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href=""><i class="fa fa-circle-o"></i> Nuevo rquerimiento</a></li>
                <li><a href=""><i class="fa fa-circle-o"></i> Ver requerimientos</a></li>
                <li><a href=""><i class="fa fa-circle-o"></i> Reporte</a></li>
              </ul>
            </li>

            <!-- futuros clientes -->
            <li class="treeview">
              <a href="#">
                <i class="fa fa-list-alt"></i>
                <span>Futuros clientes</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href=""><i class="fa fa-circle-o"></i> Listado</a></li>
                <li><a href=""><i class="fa fa-circle-o"></i> Reporte</a></li>
              </ul>
            </li>

          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>

      <!--Contenido-->
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Main content -->
        <section class="content-header">
          <h1>
            @yield('header')
          </h1>
          @yield('breadcrumb')
        </section>
        <!-- Main content -->
        <section class="content">
        	@yield('content')
        </section>
      </div><!-- /.content-wrapper -->
      <!--Fin-Contenido-->
      <footer class="main-footer">
        <strong>Copyright &copy; 2016-{{date('Y')}} </strong> All rights reserved.
      </footer>
    </div><!-- .wrapper <-->
    <!-- jQuery 2.1.4 -->
    <script type="text/javascript" src="{{asset('js/jQuery-2.1.4.min.js')}}"></script>
    <!-- Bootstrap 3.3.5 -->
    <script type="text/javascript" src="{{asset('js/bootstrap.min.js')}}"></script>
    <!-- AdminLTE App -->
    <script type="text/javascript" src="{{asset('js/app.min.js')}}"></script>
    <!-- Data table -->
    <script type="text/javascript" src="{{asset('plugins/datatables/jquery.dataTables.min.js')}}"></script>

    <script type="text/javascript" src="{{asset('plugins/datatables/dataTables.bootstrap.js')}}"></script>

    <script type="text/javascript" src="{{ asset('plugins/datatables/extensions/Responsive/js/dataTables.responsive.js')}}"></script>

    <script src="{{ asset('plugins/jquery_datepicker/jquery-ui.js') }}"></script>

    <script src="{{ asset('plugins/timePicker/jquery.timepicker.min.js') }}"></script>

    <!-- fileinput -->
    <script src="{{ asset('plugins/fileinput/js/fileinput.min.js') }}"></script>
    <script src="{{ asset('plugins/fileinput/themes/fa/theme.js') }}"></script>

    <!-- lighbox -->
    <script src="{{ asset('plugins/lightbox/ekko-lightbox.js') }}"></script>

    <!-- numeric -->
    <script src="{{ asset('plugins/numeric.js') }}"></script>

    <!-- highchart -->
    <script src="{{ asset('plugins/highchart/code/highcharts.js') }}"></script>
    <script src="{{ asset('plugins/highchart/code/exporting.js') }}"></script>

    <script type="text/javascript">
      $(document).ready(function(){
      	//Eliminar alertas que no contengan la clase alert-important luego de 7seg
      	$('div.alert').not('.alert-important').delay(7000).slideUp(300);

      	//activar Datatable
        $('.data-table').DataTable({
          responsive: true,
          language: {
          	url:'{{asset("plugins/datatables/spanish.json")}}'
          }
        });
      })

      // datapicker español
       	$.datepicker.regional['es'] = {
  			 closeText: 'Cerrar',
  			 prevText: '< Ant',
  			 nextText: 'Sig >',
  			 currentText: 'Hoy',
  			 monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
  			 monthNamesShort: ['Ene','Feb','Mar','Abr', 'May','Jun','Jul','Ago','Sep', 'Oct','Nov','Dic'],
  			 dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
  			 dayNamesShort: ['Dom','Lun','Mar','Mié','Juv','Vie','Sáb'],
  			 dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sá'],
  			 weekHeader: 'Sm',
  			 dateFormat: 'dd/mm/yy',
  			 firstDay: 1,
  			 isRTL: false,
  			 showMonthAfterYear: false,
  			 yearSuffix: ''
			 };
			 $.datepicker.setDefaults($.datepicker.regional['es']);

  		$(function () {
  			$(".fecha").datepicker();
  		});

  		$('.timepicker').timepicker({
  		    timeFormat: 'HH:mm p',
  		    interval: 30,
  		    minTime: '0',
  		    maxTime: '23:30pm',
  		    defaultTime: '00:00',
  		    startTime: '12:00',
  		    dynamic: true,
  		    dropdown: true,
  		    scrollbar: true
  		});

      $("#file_input").fileinput({
        'showUpload':false,
        'previewFileType':'any'
      });

      // desde hasta
      $( function() {
        var dateFormat = "dd/mm/yyyy",
          from = $( "#from" )
            .datepicker({
              defaultDate: "+1w",
              changeMonth: true,
              numberOfMonths: 1,
              showButtonPanel: true,
              showAnim: 'slideDown'
            })
            .on( "change", function() {
              to.datepicker( "option", "minDate", getDate( this ) );
            }),
          to = $( "#to" ).datepicker({
            defaultDate: "+1w",
            changeMonth: true,
            showButtonPanel: true,
            numberOfMonths: 1,
            showAnim: 'slideDown'
          })
          .on( "change", function() {
            from.datepicker( "option", "maxDate", getDate( this ) );
          });

        function getDate( element ) {
          var date;
          try {
            date = $.datepicker.parseDate( dateFormat, element.value );
          } catch( error ) {
            date = null;
          }

          return date;
        }
      } );

    </script>

    @yield('script')
  </body>
</html>

<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <title>Admin</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{ route('secretaria.home') }}" class="nav-link">Home</a> <!-- href="{{ route('welcome') }}" -->
      </li>
    </ul>
    <!-- SEARCH FORM 
    <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form>-->
    <div class="collapse navbar-collapse" id="app-navbar-collapse">
      <ul class="nav navbar-nav">
          &nbsp;
      </ul>
    </div>
    <ul class="nav navbar-nav navbar-right">
    @if (Auth::guard('usuario')->check())
    
    <!--<ul class="nav-item d-none d-sm-inline-block">
        <li class="nav-item d-none d-sm-inline-block">
            <a href="{{ route('admin.home') }}">Menu</a> 
        </li>
    </ul>-->
    <ul class="nav-item d-none d-sm-inline-block">
        <li class="nav-item d-none d-sm-inline-block">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                {{ Auth::user()->nombre }}
            </a>
            <ul class="dropdown-menu" role="menu">
                  <li>
                      <a href="{{ route('cambiar.password') }}">  
                        Cambiar contraseña
                      </a>
                      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                          {{ csrf_field() }}
                      </form>
                      </li>
                  <li>
                  <a href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                      document.getElementById('logout-form').submit();">
                    Logout
                  </a>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                  </form>
                </li>
            </ul>
        </li>
    </ul>
    @else
        <li><a href="{{ route('welcome') }}" >Home</a></li>
      <li><a href="{{ route('usuario.login') }}">Login</a></li>
      <!--<li><a href="{{ route('register') }}">Register</a></li>--> <!--este aun no y no aqui--->
    @endif
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link"> <!-- href="{{ route('welcome') }}" -->
      <img src="dist/img/AdminLTELogo.png"
           alt="AdminLTE Logo"
           class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">SystemController</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      

      <!-- Sidebar Menu -->
      <nav class="mt-2">

        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class-->
               <!--with font-awesome or any other icon font library -->
                <li class="nav-item has-treeview">
                  <a href="{{ url('/reporteAuxAsistencia') }}" class="nav-link"> <!-- class="btn btn-dark" -->
                    <i class="nav-icon fas fa-copy"></i>
                        <p>Reporte de asistencias</p>
                  </a>
                </li>
                <li class="nav-item has-treeview">
                  <a href="{{ url('/reporteAuxDpaUti') }}" class="nav-link"> <!-- class="btn btn-dark" -->
                    <i class="nav-icon fas fa-copy"></i>
                        <p>Reporte para DPA</p>
                  </a>
                </li>
                <li class="nav-item has-treeview">
                  <a href="{{ url('/reporteAuxResumen') }}" class="nav-link"> <!-- class="btn btn-dark" -->
                    <i class="nav-icon fas fa-copy"></i>
                        <p>Reporte Resumen</p>
                  </a>
                </li>

        </ul>
    
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
      </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col">
          </div>
          <!-- /.col -->
          <div class="col-md-12">
            <div class="card">
              <div class="card-body">
              <!-- drowbox -->
        
                <!-- formulario -->
                @yield('content')
              </div>
            </div>
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 1.0.0
    </div>
    <strong>Copyright &copy; 2-2020 <a href="#">TalosDev</a>.</strong> System Controller.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>

<script type="text/javascript">
{{-- ajax Form Add Post--}}
  $(document).on('click','.create-modal', function() {
    $('#create').modal('show');
    $('.form-horizontal').show();
    $('.modal-title').text('Add Post');
  });
  $("#add").click(function() {
    $.ajax({
      type: 'POST',
      url: 'addPost',
      data: {
        '_token': $('input[name=_token]').val(),
        'contenido': $('textarea[name=contenido]').val(),
        'observacion': $('textarea[name=observacion]').val()
      },
      success: function(data){
        if ((data.errors)) {
          $('.error').removeClass('hidden');
          $('.error').text(data.errors.contenido);
          $('.error').text(data.errors.observacion);
        } else {
          $('.error').remove();
          $('#table').append("<tr class='post" + data.id + "'>"+
          "<td>" + data.id + "</td>"+
          "<td>" + data.created_at + "</td>"+
         
          "<td>" + data.contenido + "</td>"+
          "<td>" + data.observacion + "</td>"+
          
          "<td><button class='show-modal btn btn-info btn-sm' data-id='" + data.id + "' data-contenido='" + data.contenido + "' data-observacion='" + data.observacion + "'><span class='fa fa-eye'></span></button>'" +"</tr>");
        }
      },
    });
    $('#contenido').val('');
    $('#observacion').val('');
  });



  // Show function
  $(document).on('click', '.show-modal', function() {
  $('#show').modal('show');
  $('#i').text($(this).data('id'));
  $('#ti').text($(this).data('contenido'));
  $('#by').text($(this).data('observacion'));
  $('.modal-title').text('Informe de Clase Virtual');
  });


</script>

</body>
</html>

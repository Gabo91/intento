<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Sistem Controller</title>
  <meta content="" name="descriptison">
  <meta content="" name="keywords">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
  

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Muli:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/venobox/venobox.css" rel="stylesheet">
  <link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header">
    <div class="container d-flex">

      <div class="logo mr-auto"><nav class="navbar navbar-light bg-light">
        <a class="navbar-brand" href="#">
          <img src="assets/img/logo.png" width="30" height="30" class="d-inline-block align-top" alt="" loading="lazy">
          System Controller
        </a>
      </nav>
      </div>

      <nav class="nav-menu d-none d-lg-block">
        <ul>
          <!--<li class="active"><a href="{{ route('welcome') }}">Home</a></li>
          <li><a href="/usuario/login">Login</a></li>-->
          <!--<li><a href="usuario">prueba</a></li>-->
           
          @if (Auth::guard('usuario')->check())
              <li>
                <a class="text-warning">No olvide cerrar su sesion</a>
              </li>
              <li>
                <a href="{{ route('usuario.dashboard') }}">Menu</a>
              </li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                    Usuario <span class="caret"></span>
                </a>
                  <ul class="dropdown-menu" role="menu">
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
              
          @else
              <li class="active"><a href="{{ route('welcome') }}">Home</a></li>
              <li> <a href="{{ url('/usuario/login') }}">Login</a></li>
              <!--<li> <a href="{{ url('/register') }}">Prueba</a></li> ELIMINAR LUEGO-->
          @endif      

        </ul>
      </nav><!-- .nav-menu -->

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero">
    <div id="heroCarousel" class="carousel slide carousel-fade" data-ride="carousel">

      <div class="carousel-inner" role="listbox">

        <!-- Slide 1 -->
        <div class="carousel-item active" style="background-image: url(assets/img/slide/tis3.png);">
          <div class="container">
            <div class="carousel-content animated fadeInUp">
              <h2>Bienvenido</h2>
              <p>Al Sitio Web de Docentes, Autoridades Academicas y Auxiliares de Laboratorio de la Universidad Mayor de San Simon, sitio reponsable del Control de Asistencia y Avance de Materia</p>
            </div>
          </div>
        </div>

        <!-- Slide 2 -->
        <div class="carousel-item" style="background-image: url(assets/img/slide/tis2.png);">
          <div class="container">
            <div class="carousel-content animated fadeInUp">
              <h2>Sistema Web</h2>
              <p>La version 1.0 del sistema contiene</p>
              <p>Control de Asistencia</p>
              <p>Control de Avance de materia</p>
              <p>Cronograma Academico</p>
            </div>
          </div>
        </div>

        <!-- Slide 3 -->
        <div class="carousel-item" style="background-image: url(assets/img/slide/tis5.jpg);">
          <div class="container">
            <div class="carousel-content animated fadeInUp">
              <h2>Introduccion</h2>
              <p>La información para que sea realmente útil a los usuarios, debe ser significativa, completa.Los estudiantes de la Materia de TIS2-2020 ha estado trabajando para que estos requisitos sean cumplidos de la mejor manera posible</p>
            </div>
          </div>
        </div>

      </div>

      <a class="carousel-control-prev" href="#heroCarousel" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon bx bx-left-arrow" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>

      <a class="carousel-control-next" href="#heroCarousel" role="button" data-slide="next">
        <span class="carousel-control-next-icon bx bx-right-arrow" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>

      <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

    </div>
  </section><!-- End Hero -->


  <!-- ======= Footer ======= -->
  <footer id="footer">

    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Enlaces Unidades UMSS</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Sitio Oficial de la UMSS</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Escuela Universitaria de Posgrado</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Relaciones Internacionales y Convenios</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Dirección de Interacción Social Universitaria</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">DICyT</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">DPA</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Centro de Estudios de Población</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">CESU</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">CLAS</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">OyM</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Facultades UMSS</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="http://www.fcyt.umss.edu.bo/">Ciencias y Tecnología</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Ciencias Económicas</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Medicina</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Ciencias Jurídicas y Polít.</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Agronomía</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Cs. Bioquímicas y Farmac.</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Arquitectura</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Odontología</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Humanidades y Cs. Educ.</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Escuela Forestal ESFOR</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">IPU</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Ciencias Sociales-FACSO</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Otras Universidades</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">U. Mayor de San Andrés</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">U. Mayor de San Francisco Xavier</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">U. Autónoma Gabriel Rene Moreno</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">U. Técnica de Oruro</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">U. Tomás Frias</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">U. Juan Misael Saracho</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">U. Autónoma del Beni "José Ballivián"</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">U. Amazónica de Pando</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">U. Pública de El Alto</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Otros Enlaces</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="http://websis.umss.edu.bo">WEBSIS</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="http://sagaa.fcyt.umss.edu.bo">Sistema Saaga</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="http://www.cs.umss.edu.bo">Departamento de Sistemas y Informatica</a></li>

            </ul>
          </div>
        </div>
      </div>
    </div>

    <div class="container d-md-flex py-4">

      <div class="mr-md-auto text-center text-md-left">
        <div class="copyright">
          TalosDev&copy; 2020 Copyright <strong><span>System Controller</span></strong>. All Rights Reserved
        </div>
        <div class="credits">
          Sitio oficial <a href="http://www.umss.edu.bo/" , href="">UMSS</a>
        </div>
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/jquery/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/jquery.easing/jquery.easing.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/jquery-sticky/jquery.sticky.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/venobox/venobox.min.js"></script>
  <script src="assets/vendor/waypoints/jquery.waypoints.min.js"></script>
  <script src="assets/vendor/owl.carousel/owl.carousel.min.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>

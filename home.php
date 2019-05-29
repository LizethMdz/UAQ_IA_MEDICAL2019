<?php
  require_once('includes/load.php');
  if (!$session->isUserLoggedIn(true)) { redirect('index.php', false);}

  $user = current_user();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Sistema Experto</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    

    <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">
    
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">

    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/ionicons.min.css">

    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.timepicker.css">

    
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/icomoon.css">
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>
    
  <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
      <a class="navbar-brand" href="index.php">MediCare.</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="oi oi-menu"></span> Menu
      </button>

      <div class="collapse navbar-collapse" id="ftco-nav">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active"><a href="index.php" class="nav-link">Inicio</a></li>
          
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle"  id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Diagnósticos</a>
              <div class="dropdown-menu" aria-labelledby="dropdown04">
                <a class="dropdown-item" href="diag-precargado.php">Diagnóstico Precargado</a>
                <a class="dropdown-item" href="diag-general.php">Diagnóstico General</a>
                <a class="dropdown-item" href="diag-especifico.php">Diagnóstico Específico</a>
              </div>
          </li>
          <li class="nav-item"><a href="acerca.php" class="nav-link">Acerca de</a></li>
          <li class="nav-item"><a href="autores.php" class="nav-link">Autores</a></li>
       
          <?php  if ($session->isUserLoggedIn(true)): ?>  
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle"  id="user-data" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
             Dra. <?php echo utf8_encode(ucfirst($user['nom_medico'])); ?>
            </a>
              <div class="dropdown-menu" aria-labelledby="user-data">
                <a class="dropdown-item" href="perfil.php?id=<?php echo (int)$user['id_medico'];?>"> Mi perfil</a>
                <a class="dropdown-item" href="logout.php">Cerrrar Sesión</a>
              </div>
          </li>
          <?php endif;?>
            
        </ul>
      </div>
    </div>
  </nav>
    <!-- END nav -->
    
    <!-- <div class="js-fullheight"> -->
    <div class="hero-wrap js-fullheight">
      <div class="overlay"></div>
      <div id="particles-js"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center" data-scrollax-parent="true">
          <div class="col-md-6 ftco-animate text-center" data-scrollax=" properties: { translateY: '70%' }">
            <h1 class="mb-4" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Diagnóstico de enfermedades <strong>Gastrointestinales</strong> Aplicando Lógica Difusa</h1>
            <p data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><a href="#diagnosticos" class="btn btn-primary btn-outline-white px-5 py-3">Empezar</a></p>
          </div>
        </div>
      </div>
    </div>
    
    <div class="bg-light">
    <section class="ftco-section-featured ftco-animate">
      <div class="container-fluid" data-scrollax-parent="true">
        <div class="row no-gutters d-flex align-items-center" data-scrollax=" properties: { translateY: '-30%'}">
          
          <div class="col-md-12">
            <div class="row no-gutters">
              <div class="col-md-12">
                <div class="row no-gutters d-flex align-items-end">



              <div class="col-md-12">
                <div class="row no-gutters d-flex align-items-start">
                  <div class="col-md-4">
                    <a href="#" class="featured-img" style="cursor:context-menu;">
                      <div class="text-1 px-2 d-flex align-items-center">
                        <h3 class="text-light">Infecciones en<br><span class="tag">Estómago</span></h3>
                      </div>
                      <img src="images/intro/stomach-cancer.png" class="img-fluid" alt="">
                      
                    </a>
                  </div>
                  <div class="col-md-4">
                    <a href="#" style="cursor:context-menu;" class="featured-img">
                      <div class="text-1 p-4 d-flex align-items-center">
                        <h3 class="text-light">Infecciones a través de <br><span class="tag">Bacterias y Virus</span></h3>
                      </div>
                      <img src="images/intro/bacteria.png" class="img-fluid" alt="">
                      
                    </a>
                  </div>

                  <div class="col-md-4">
                    <a href="#" class="featured-img" style="cursor:context-menu;">
                      <div class="text-1 p-4 d-flex align-items-center">
                        <h3 class="text-light">Infecciones en los<br><span class="tag">Intestinos</span></h3>
                      </div>
                      <img src="images/intro/intestine.png" class="img-fluid" alt="">
                      
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>


        </div>
        <div class="row mt-5 d-flex justify-content-center">
       
          <div class="col-md-8 text-center heading-section ftco-animate">
          <h2 class="mb-4">BIENVENIDA </h2>
          <?php  if ($session->isUserLoggedIn(true)): ?>  
          <h2 class="mb-4"> Dra. <?php echo utf8_encode(ucfirst($user['nom_medico'])); ?></h2>
          <?php endif;?>
            <p style="font-size:26px;">
              De acuerdo con el IMSS (Instituto Mexicano del Seguro Social), entre los síntomas más comunes
               de las enfermedades <b>gastrointestinales</b> están la <b>diarrea</b>  y su consiguiente <b>deshidratación</b> ,
                la cual, si no se atiende, puede convertirse en un
               problema mortal especialmente en el caso de los <b>niños y los adultos mayores.</b>
            </p>
          </div>
        </div>
      </div>
    </section>
    </div>
    
    <section class="ftco-section">
      <div class="container">
        <div class="row no-gutters justify-content-center mb-5 pb-5">
          <div class="col-md-7 text-center heading-section ftco-animate">
            <span class="subheading">DIAGNÓSTICOS</span>
            <h2 class="mb-4">Con este tipo de herramientas puedes determinar si tu paciente 
                está padeciendo una enfermedad, mediante un diagnóstico rápido.
            </h2>

          </div>
        </div>
        <div class="row"  id="diagnosticos">
        <span class="subheading text-center">TIPOS DE DIAGNÓSTICOS</span>
          <div class="block-3 d-md-flex ftco-animate" data-scrollax-parent="true">
            <a href="diag-general.php" class="image" style="background-image: url('images/work-1.jpg'); " data-scrollax=" properties: { translateY: '-20%'}">
            </a>
            <div class="text">
              <h4 class="subheading">Diagnóstico General</h4>
              <h2 class="heading"><a href="diag-general.php">A través de los síntomas</a></h2>
              <p>Se realiza un procedimiento por el cual se identifica una enfermedad. En términos de la 
                práctica médica, el diagnóstico es un juicio clínico sobre el estado psicofísico de una persona; 
                representa una manifestación en respuesta a una demanda para determinar tal estado.</p>
              <p><a href="diag-general.php" class="btn btn-primary px-4">Iniciar</a></p>
            </div>
          </div>
          <div class="block-3 d-md-flex ftco-animate" data-scrollax-parent="true">
            <a href="diag-especifico.php" class="image image-2 order-2" style="background-image: url('images/diagnosticos/1.jpg');" data-scrollax=" properties: { translateY: '-20%'}"></a>
            <div class="text order-1">
              <h4 class="subheading">Diagnóstico Específico</h4>
              <h2 class="heading"><a href="diag-especifico.php">Se capturan los síntomas
                y las enfermedades a comparar.
              </a></h2>
              <p>Se toman 2 o más enfermedades de la lista para determinar si hay
                un grado de coincidencia con alguna enfermedad o no.</p>
              <p><a href="diag-especifico.php" class="btn btn-primary px-4">Iniciar</a></p>
            </div>
          </div>

          <div class="block-3 d-md-flex ftco-animate" data-scrollax-parent="true">
            <a href="diag-precargado.php" class="image" style="background-image: url('images/diagnosticos/2.jpg'); " data-scrollax=" properties: { translateY: '-20%'}">
            </a>
            <div class="text">
              <h4 class="subheading">Diagnóstico Precargado</h4>
              <h2 class="heading"><a href="diag-precargado.php">Se enlistan las enfermedades</a></h2>
              <p>Y muestran su descripción en conjunto con los síntomás más comunes. Así como un posible tratamiento.</p>
              <p><a href="diag-precargado.php" class="btn btn-primary px-4">Iniciar</a></p>
            </div>
          </div>

        </div>
      
      </div>
    </section>

    <footer class="ftco-footer ftco-bg-dark ftco-section">
      <div class="container">
        <div class="row mb-5">
          <div class="col-md">
            <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">MediCare.</h2>
              <p>Universidad Autónoma de Querétaro.</p>
              <p>Facultad de Informática.</p>
            </div>
          </div>
          <div class="col-md">
            <div class="ftco-footer-widget mb-4 ml-5">
              <h2 class="ftco-heading-2">Enlaces</h2>
              <ul class="list-unstyled">
                <li><a href="#" class="py-2 d-block">Home</a></li>
                <li><a href="#" class="py-2 d-block">Diagnósticos</a></li>
                <li><a href="#" class="py-2 d-block">Acerca de </a></li>
              </ul>
            </div>
          </div>
          <div class="col-md">
             <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">Información de Contacto</h2>
              <ul class="list-unstyled">
                <li><a href="#" class="py-2 d-block">Av. de las Ciencias S/N</a></li>
                <li><a href="#" class="py-2 d-block">+ 1235 2355 98</a></li>
                <li><a href="#" class="py-2 d-block">http://www.uaq.mx/informatica</a></li>
                <li><a href="#" class="py-2 d-block">visitanos@hotmail.com</a></li>
              </ul>
            </div>
          </div>
          <div class="col-md">
            <div class="ftco-footer-widget mb-4">
              <ul class="ftco-footer-social list-unstyled float-md-left float-lft">
                <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
              </ul>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 text-center">

            <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This page is made with <i class="icon-heart" aria-hidden="true"></i> by <a href="" target="_blank"> University' Students</a>
  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
          </div>
        </div>
      </div>
    </footer>
    
  

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


  <script src="js/jquery.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/jquery.waypoints.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/jquery.animateNumber.min.js"></script>
  <script src="js/bootstrap-datepicker.js"></script>
  <script src="js/particles.min.js"></script>
  <script src="js/particle.js"></script>
  <script src="js/scrollax.min.js"></script>

  <script src="js/google-map.js"></script>
  <script src="js/main.js"></script>
    
  </body>
</html>
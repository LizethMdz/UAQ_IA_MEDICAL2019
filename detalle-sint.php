<?php 

  require_once('includes/load.php'); 
  if (!$session->isUserLoggedIn(true)) { redirect('index.php', false);}

  $user = current_user();
  ?>

  <?php   
    $id_enf = $_GET['id'];
    $enfermedades_sint_trat = join_illness_has_symptoms_and_tratamientos_id_table($id_enf);
    $enfermedades = join_illness_medication_id_table($id_enf);

  ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Enfermedad</title>
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
        <a class="navbar-brand" href="home.php">MediCare.</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="oi oi-menu"></span> Menu
        </button>

        <div class="collapse navbar-collapse" id="ftco-nav">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active"><a href="home.php" class="nav-link">Inicio</a></li>
            <li class="nav-item"><a href="acerca.php" class="nav-link">Acerca de</a></li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle"  id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Diagnósticos</a>
                <div class="dropdown-menu" aria-labelledby="dropdown04">
                  <a class="dropdown-item" href="services.html">Diagnóstico Precargado</a>
                  <a class="dropdown-item" href="portfolio-single.html">Diagnóstico General</a>
                  <a class="dropdown-item" href="portfolio-single.html">Diagnóstico Específico</a>
                </div>
            </li>
            <li class="nav-item"><a href="autores.php" class="nav-link">Autores</a></li>
            <!-- <li class="nav-item cta"><a href="contact.html" class="nav-link"><span>Get in touch</span></a></li> -->
            <?php  if ($session->isUserLoggedIn(true)): ?>  
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle"  id="user-data" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
             Dra. <?php echo utf8_encode(ucfirst($user['nom_medico'])); ?>
            </a>
              <div class="dropdown-menu" aria-labelledby="user-data">
                <a class="dropdown-item" href="logout.php">Cerrrar Sesión</a>
              </div>
          </li>
          <?php endif;?>
          </ul>
        </div>
      </div>
    </nav>
    <!-- END nav -->
    
    <div class="hero-wrap js-fullheight">
      <div class="overlay"></div>
      <div id="particles-js"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center" data-scrollax-parent="true">
          <div class="col-md-6 ftco-animate text-center" data-scrollax=" properties: { translateY: '70%' }">
            <p class="breadcrumbs" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><span class="mr-2"><a href="home.php">Inicio</a></span> <span>DETALLE</span></p>
            <?php foreach ($enfermedades as $enfermedad): ?>
            <h1 class="mb-3 bread" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><?php echo  utf8_encode($enfermedad['nombenf']); ?></h1>
            <?php endforeach; ?>
          </div>
        </div>
      </div>
    </div>
    
    <section class="ftco-section contact-section ftco-degree-bg">
      <div class="container bg-white">
        <div class="row mb-4">
          <?php foreach ($enfermedades as $enfermedad): ?>
          <div class="col-md-12 mb-4">
            <h2 class="h1"><?php echo  remove_junk(utf8_encode($enfermedad['nombenf'])); ?></h2>
          </div>
          <div class="w-100"></div>
          <div class="col-md-12">
            <p><span>Origen:  </span><?php echo utf8_encode($enfermedad['origenenf']); ?> </p>
          </div>

          <?php endforeach; ?>

        </div>
        <div class="row block-9">
          <div class="col-md-6 pr-md-5">
            <ul class="list-group">
                <li class="list-group-item active">Síntomas: </li>
                <?php foreach ($enfermedades_sint_trat as $enfermedad_s_t): ?>
                <?php if($enfermedad_s_t['valor'] > 0): ?>
                <li class="list-group-item d-flex justify-content-between align-items-center"><?php echo remove_junk (utf8_encode($enfermedad_s_t['sintoma'])); ?>
                <span class="badge badge-primary badge-pill text-white"><?php echo remove_junk($enfermedad_s_t['valor'] * 100); ?> %</span>
                <?php endif; ?>
              </li>
                <?php endforeach; ?>
              </ul>
          
          </div>

          <div class="col-md-6">
          <?php foreach ($enfermedades as $enfermedad): ?>
            <img src="images/enfermedades/<?php echo remove_junk($enfermedad['imgenf']); ?>" width="auto" height="250">
            <?php endforeach; ?>
          </div>
        </div>

        <div class="row mt-5">
        <div class="col-md-12">
            <p><span>Tratamiento:  </span><?php echo utf8_encode($enfermedad['tratamiento']); ?> </p>
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
              <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
            </div>
          </div>
          <div class="col-md">
            <div class="ftco-footer-widget mb-4 ml-5">
              <h2 class="ftco-heading-2">Enlaces</h2>
              <ul class="list-unstyled">
                <li><a href="#" class="py-2 d-block">Diagnóstico Específico</a></li>
                <li><a href="#" class="py-2 d-block">Diagnóstico General</a></li>
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
  <!-- <script src="js/jquery.timepicker.min.js"></script> -->
  <script src="js/particles.min.js"></script>
  <script src="js/particle.js"></script>
  <script src="js/scrollax.min.js"></script>
  <!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script> -->
  <script src="js/google-map.js"></script>
  <script src="js/main.js"></script>
    
  </body>
</html>
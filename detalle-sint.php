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
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
  </head>
  <body>
    
    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
      <div class="container">
      <i class="fas fa-briefcase-medical navbar-brand text-white"></i>
        <a class="navbar-brand" href="home.php">MediCare.</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="oi oi-menu"></span> Menu
        </button>

        <div class="collapse navbar-collapse" id="ftco-nav">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active"><a href="home.php" class="nav-link">Inicio</a></li>
            
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
            <!-- <li class="nav-item cta"><a href="contact.html" class="nav-link"><span>Get in touch</span></a></li> -->
            <?php  if ($session->isUserLoggedIn(true)): ?>  
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle"  id="user-data" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
             Dra. <?php echo utf8_encode(ucfirst($user['nom_medico'])); ?>
            </a>
              <div class="dropdown-menu" aria-labelledby="user-data">
              <a class="dropdown-item" href="perfil.php">Mi perfil</a>
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
    

    <?php require_once("layout/footer.php"); ?>
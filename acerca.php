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
    <link rel="stylesheet" href="css/card.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
  </head>
  <body>
    
  <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
    <i class="fas fa-briefcase-medical navbar-brand text-white"></i>
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
    
    <!-- <div class="js-fullheight"> -->
    <div class="hero-wrap js-fullheight">
      <div class="overlay"></div>
      <div id="particles-js"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center" data-scrollax-parent="true">
          <div class="col-md-6 ftco-animate text-center" data-scrollax=" properties: { translateY: '70%' }">
          <p class="breadcrumbs" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><span class="mr-2"><a href="home.php">Inicio</a></span> <span>Acerca de</span></p>
            <h1 class="mb-4" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Información <strong>fue consultda de</strong></h1>
            <p data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><a href="#investigacion" class="btn btn-primary btn-outline-white px-5 py-3">Seguir leyendo</a></p>
          </div>
        </div>
      </div>
    </div>
    
   

    <section class="ftco-section testimony-section bg-light"  id="investigacion">
      <div class="container">
        <div class="row justify-content-center mb-5 pb-5">
          <div class="col-md-7 text-center heading-section ftco-animate">
            <span class="subheading">FUENTES PARA LA INVESTIGACIÓN</span>
            <h2 class="mb-4">Se tomaron en cuenta varias referencias</h2>
            <p>Desde una supervición de las enfermedades y síntomas por parte
              de la doctora que actualmente está en la Facultad de Informática. Así
              como, la consulta en páginas informativas para este tipo de enfermedades.
            </p>
          </div>
        </div>
        <div class="row ftco-animate">
          <div class="col-md-4">
                <div class='card-wrapper'>
                    <div class='card-info' data-toggle-class='flipped'>
                        <div class='card-front'>
                        <div class='layer'>
                            <h1 class="text-white">Consulta No. 1</h1>
                            <div class='corner'></div>
                            <div class='corner'></div>
                            <div class='corner'></div>
                            <div class='corner'></div>
                        </div>
                        </div>
                        <div class='card-back'>
                        <div class='layer'>
                            <div class='top'>
                            <h2>Dra. de la Facultad de Informática</h2>
                            </div>
                            <div class='bottom'>
                            <!-- <h3>
                                Teléfono:
                                <a href='#'>+44 7542 20 33 83</a>
                            </h3> -->
                            <!-- <h3>
                                Email:
                                <a href='#'>lmenus@lmen.us</a>
                            </h3> -->
                            <h3>
                                Escuela:
                                <a href='https://www.uaq.mx/' target='_blank'>Univerdidad Autónoma de Querétaro</a>
                            </h3>
                            <h3>
                                Facultad:
                                <a href='#' target='_blank'>Facultad de Informática</a>
                            </h3>
                            </div>
                        </div>
                        </div>
                    </div>
                    </div>
          </div>
          <div class="col-md-4">

            <div class="card text-white bg-primary mb-3" style="max-width: 30rem;">
            
                <div class="card-header">Consulta No. 2</div>
                <div class="card bg-light px-3 py-3">
                <img src="https://i.onmeda.de/nav/logo-es.png" class="card-img-top" alt="onmeda">
                </div>
                <div class="card-body">
                    <h5 class="card-title">Onmeda.es</h5>
                    <p class="card-text">
                    El portal de salud Onmeda fue creado en Alemania en 1997 (entonces todavía con el nombre Medicine Worldwide)
                     por médicos del Hospital Charité de Berlín y científicos del Instituto Max Planck. 
                     En la actualidad Onmeda es una de las webs de información de salud líderes de Alemania. 
                     Las altas exigencias de calidad y nuestra oferta de textos médicos en Internet son la razón por la que Onmeda tiene una gran 
                    aceptación entre los pacientes, las personas que se interesan por la salud, los médicos y los periodistas.    
                </p>
                    <a class="text-white" href="https://www.onmeda.es/enfermedades_gastrointestinales/patologias.html">Enlace</a>
                </div>
            </div>

          </div>

          <div class="col-md-4">

            <div class="card text-white bg-primary mb-3" style="max-width: 30rem;">
           
                <div class="card-header">Consulta No. 3</div>
                <div class="card bg-light px-3 py-3">
                 <img src="https://medlineplus.gov/images/m_logo_sp.png" class="card-img-top" alt="medlineplus">
                 </div>
                <div class="card-body">
                    <h5 class="card-title">MedlinePlus</h5>
                    <p class="card-text">MedlinePlus en español es el sitio web de los Institutos Nacionales de la 
                        Salud para pacientes, familiares y amigos. Producida por la Biblioteca Nacional de Medicina de los
                         Estados Unidos, la biblioteca médica más grande del mundo, 
                        MedlinePlus le brinda información sobre enfermedades, afecciones y bienestar en un lenguaje fácil de leer.</p>
                    <a href="https://medlineplus.gov/spanish/ency/article/007447.htm" class="text-white">Enlace</a>
                </div>
            </div>

          </div>
        </div>
      </div>
    </section>
    
   
    <?php require_once("layout/footer.php"); ?>
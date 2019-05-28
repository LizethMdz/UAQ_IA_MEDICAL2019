<?php
  require_once('includes/load.php');
  if (!$session->isUserLoggedIn(true)) { redirect('index.php', false);}

  $user = current_user();
?>

<?php
  $user_id = (int)$_GET['id'];
  if(empty($user_id)):
    redirect('home.php',false);
  else:
    $user_p = find_by_id('medicos',$user_id);
  endif;
?>

<?php 

    if(isset($_POST['enviar'])){

        $req_fields = array('c-new','c-old','id' );
        validate_fields($req_fields);

        if($_POST['c-old'] !== current_user()['pass_medico'] ){
        $session->msg('d', "Tu antigua contraseña no coincide");
        redirect("perfil.php?id=1", false);
        }

        if(empty($errors)){


                $id = (int)$_POST['id'];
                $new = remove_junk($db->escape($_POST['c-new']));
                $sql = "UPDATE medicos SET pass_medico ='{$new}' WHERE id_medico='{$db->escape($id)}'";
                $result = $db->query($sql);
                    if($result && $db->affected_rows() === 1):
                    $session->logout();
                    $session->msg('s',"Inicia sesión con tu nueva contraseña.");
                    redirect('index.php', false);
                    else:
                    $session->msg('d',' Lo siento, actualización falló.');
                    redirect('perfil.php?id=1', false);
                    endif;
        } else {
            $session->msg("d", $errors);
            redirect('perfil.php?id=1',false);
        }
    }
?>


<?php
 //update user other info
  if(isset($_POST['save'])){
    $req_fields = array('username','name', 'phone', 'especial');
    validate_fields($req_fields);

    // if($_POST['c-old'] !== current_user()['pass_medico'] ){
    //     $session->msg('d', "Tu antigua contraseña no coincide");
    //     redirect('perfil.php', false);
    // }

    if(empty($errors)){
        $id = (int)$_SESSION['user_id'];
        $name = remove_junk($db->escape($_POST['name']));
        $username = remove_junk($db->escape($_POST['username']));
        $tel = remove_junk($db->escape($_POST['phone']));
        $espe = remove_junk($db->escape($_POST['especial']));
        // $new = remove_junk($db->escape($_POST['c-new']));
            $sql = "UPDATE medicos SET nom_medico ='{$name}', username_medico ='{$username}', tel_medico ='{$tel}', titulo_medico ='{$espe}' WHERE id_medico='{$id}'";
        $result = $db->query($sql);
          if($result && $db->affected_rows() === 1){
            $session->msg('s',"Cuenta actualizada. ");
            redirect('perfil.php?id=1', false);
          } else {
            $session->msg('d',' Lo siento, actualización falló.');
            redirect('perfil.php?id=1', false);
          }
    } else {
      $session->msg("d", $errors);
      redirect('perfil.php?id=1',false);
    }
  }
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
          <p class="breadcrumbs" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><span class="mr-2"><a href="home.php">Inicio</a></span> <span>Perfil</span></p>
            <h1 class="mb-4" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Tu Perfil <strong></strong></h1>
            <p data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><a href="#perfil" class="btn btn-primary btn-outline-white px-5 py-3">Configurar</a></p>
          </div>
        </div>
      </div>
    </div>




    <section class="ftco-section contact-section ftco-degree-bg" id="perfil">
      <div class="container bg-light">

   
        <div class="row block-9">

          <div class="col-md-12 mb-4">
            <?php echo display_msg($msg); ?>
          </div>

          <div class="col-md-6 pr-md-5">
            <form method="post" action="perfil.php?id=<?php echo (int)$user_p['id_medico'];?>">
              <div class="form-group">
                  <p>Nombre de Usuario</p>
                <input type="text" class="form-control" name="username" value="<?php echo remove_junk($user_p['username_medico']); ?>">
              </div>
              <div class="form-group">
                <p>Nombre</p>
                <input type="text" class="form-control" name="name" value="<?php echo remove_junk(utf8_encode(ucwords($user_p['nom_medico']))); ?>">
              </div>

              <div class="form-group">
                <p>Teléfono</p>
                <input type="text" class="form-control" name="phone" value="<?php echo remove_junk(utf8_encode(ucwords($user_p['tel_medico']))); ?>">
              </div>

              <div class="form-group">
                <p>Especialidad</p>
                <input type="text" class="form-control" name="especial" value="<?php echo remove_junk(utf8_encode(ucwords($user_p['titulo_medico']))); ?>">
              </div>

              <div class="form-group">
                <input type="submit" value="Modificar" name="save" class="btn btn-primary py-3 px-5">
              </div>

            </form>
             
            
           
          
          </div>
         
          <div class="col-md-6">
           <form method="post" action="perfil.php?id=<?php echo (int)$user_p['id_medico'];?>">
              <div class="form-group">
                <p>Contraseña Actual</p>
                <input type="text" class="form-control" name="c-old" placeholder="Contraseña">
              </div>

              <div class="form-group">
                <p>Contraseña Nueva</p>
                <input type="text" class="form-control" name="c-new" placeholder="Nueva Contraseña">
              </div>

              <input type="hidden" name="id" value="<?php echo (int)$user['id_medico'];?>">
             
              <div class="form-group">
                <input type="submit" value="Modificar" name="enviar" class="btn btn-primary py-3 px-5">
              </div>
            </form>
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
  <!-- <script src="js/jquery.timepicker.min.js"></script> -->
  <script src="js/particles.min.js"></script>
  <script src="js/particle.js"></script>
  <script src="js/scrollax.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="js/google-map.js"></script>
  <script src="js/main.js"></script>
  <script src="js/card.js"></script>
    
  </body>
</html>


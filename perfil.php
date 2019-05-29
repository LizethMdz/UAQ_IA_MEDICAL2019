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
    //update user image from profile 
    if(isset($_POST['submit'])) {
    $photo = new Media();
    $user_id = (int)$_POST['user_id'];
    $photo->upload($_FILES['file_upload']);
    if($photo->process_user($user_id)){
        $session->msg('s','La foto fue subida al servidor.');
            redirect('perfil.php?id=1');
        } else{
        $session->msg('d',join($photo->errors));
         redirect('perfil.php?id=1');
        }
    }
?>



<?php
 //update user other info
  if(isset($_POST['save'])){
    $req_fields = array('username','name', 'phone', 'especial');
    validate_fields($req_fields);

    if(empty($errors)){
        $id = (int)$_SESSION['user_id'];
        $name = remove_junk($db->escape($_POST['name']));
        $username = remove_junk($db->escape($_POST['username']));
        $tel = remove_junk($db->escape($_POST['phone']));
        $espe = remove_junk($db->escape($_POST['especial']));
        
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
    <link rel="shortcut icon" href="Mc.ico" type="image/x-icon">

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
            <h2>Edita los campos de tu perfil</h2>
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


        <div class="row">
          <div class="card-title">
              <h5 class="text-center">Perfil</h5>
              <hr>
                <div class="text-center">
                    <div class="round-img">
                        <a href="#"><img class="rounded-circle" src="images/intro/<?php echo $user['image_medico'];?>" width="200" height="200"></a>
                    </div>
                </div>  

                <form method="POST" action="perfil.php?id=<?php echo (int)$user_p['id_medico'];?>"  enctype="multipart/form-data">
                    <div class="row form-group">
                        <div class="col col-md-6 col-sm-2"><label for="file-input" class=" form-control-label">Archivo</label></div>
                        <div class="col-md-6 col-sm-5"><input type="file" id="file-input" multiple="multiple" name="file_upload" class="form-control-file"></div>
                    </div>
                    

                    <div>
                    <input type="hidden" name="user_id" value="<?php echo $user['id_medico'];?>">
                        <button type="submit" class="btn btn-info btn-block" name="submit">
                            <i class="fa fa-save"></i>&nbsp;
                            <span id="payment-button-amount">Actualizar</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
      </div>
    </section>
    
    <?php require_once("layout/footer.php"); ?>

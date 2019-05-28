<?php
  ob_start();
  require_once('includes/load.php');
  if($session->isUserLoggedIn(true)) { redirect('home.php', false);}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
</head>
<body>

<?php echo display_msg($msg); ?>

    <div class="wrapper">
  <div class="login-text">
    <button class="cta"><i class="fas fa-chevron-down fa-1x"></i></button>
    <div class="text">
      <a href="">Bienvenido! :)</a>
      <hr>
      <br>
      <form action="p_auth.php" method="POST">
        <input type="text" placeholder="Nombre de usuario" name="username">
              <br>
              <input type="password" placeholder="Password" name="password">
              <br>
              <button type="submit" class="login-btn">Iniciar Sesión</button>

      </form>
     
    </div>
  </div>
  <div class="call-text">
    <h1>Sistema de Diagnóstico de enfermedades<span> Gastrointestinales</span></h1>
  </div>

</div>

<script>
        var cta = document.querySelector(".cta");
        var check = 0;

        cta.addEventListener('click', function(e){
            var text = e.target.nextElementSibling;
            var loginText = e.target.parentElement;
            text.classList.toggle('show-hide');
            loginText.classList.toggle('expand');
            if(check == 0)
            {
                cta.innerHTML = "<i class=\"fas fa-chevron-up\"></i>";
                check++;
            }
            else
            {
                cta.innerHTML = "<i class=\"fas fa-chevron-down\"></i>";
                check = 0;
            }
        })
</script>

</body>
</html>
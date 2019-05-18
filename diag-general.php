<?php 
  require_once('includes/load.php'); ?>

  <?php   

    /** Retorna los valores de cada sintoma por id */
    $sintomas =  join_dictinct_symptoms_table();
    /** Retorna cada sintoma ordenado alfabeticamente */
    $sintomas2 =  join_dictinct_symptoms_table2();

  ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Diagnóstico General</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Work+Sans:100,200,300,400,700,800" rel="stylesheet">

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
       <link rel="stylesheet" href="css/main.css">
        <link rel="stylesheet" href="css/style.css">


    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
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
          <li class="nav-item active"><a href="index.php" class="nav-link">Home</a></li>
          <li class="nav-item"><a href="#" class="nav-link">Acerca de</a></li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle"  id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Diagnósticos</a>
              <div class="dropdown-menu" aria-labelledby="dropdown04">
                <a class="dropdown-item" href="diag-precargado.php">Diagnóstico Precargado</a>
                <a class="dropdown-item" href="diag-general.php">Diagnóstico General</a>
                <a class="dropdown-item" href="diag-especifico.php">Diagnóstico Específico</a>
              </div>
          </li>
          <li class="nav-item"><a href="blog.html" class="nav-link">Autores</a></li>
          <!-- <li class="nav-item"><a href="contact.html" class="nav-link">Contact</a></li> -->
          <li class="nav-item cta"><a href="contact.html" class="nav-link"><span>Empieza ya</span></a></li>
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
            <p class="breadcrumbs" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><span class="mr-2"><a href="index.html">Home</a></span> <span class="mr-2"><a href="diag-general.php">Diagnóstico General</a></span></p>
            <h1 class="mb-3 bread" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Diágnostico General</h1>
          </div>
        </div>
      </div>
    </div>

    <!-- SECTION  Mostrar síntomas ordenados alfabéticamente -->
    
    <section class="ftco-section">
      <div class="container">
        <div class="row justify-content-center mb-5 pb-5">
          <div class="col-md-6 text-center heading-section ftco-animate">
            <span class="subheading">EVALUACIÓN</span>
            <h2 class="mb-4">Selecciona los sintomás que padezcas</h2>
            <p>Selecciona como te sientes</p>
          </div>
        </div>
        <div class="row">

        <div class="col-md-4 item-name ">
            <ul class="list-group list-group-flush">
                <li class="list-group-item active text-center">¿Qué sintomas presentas? </li>
                <?php foreach ($sintomas2 as $sintoma2): ?>

                  <li class="list-group-item d-flex justify-content-between align-items-center sinto mt-3">
                    <p><?php echo remove_junk($sintoma2['nombsintoma']); ?></p>
                  </li>
                  <?php endforeach; ?>
            </ul>
        </div>



<!-- SECTION Muestra los radio buttons con el valor que tiene en la base de datos 
      de cada sintoma -->
      <?php $a_names_radiobtn = []; ?>
        <div class="col-md-8 pr-md-5">
            <ul class="list-group list-group-flush">
            <form method="GET" action="evaluacion_p.php">
                <li class="list-group-item active text-center">¿Cómo te sientes? </li>
               

                <div class="row">
                  <?php foreach ($sintomas as $sintoma): ?>
                 <ul class="list-group-flush">
                     <li class="list-group-item range-btn  align-items-center mt-2">
                     <div class="col-md-12 icons-health">
                        <img class="img-feelings" src="https://image.flaticon.com/icons/svg/1742/1742336.svg" alt="">
                        <img class="img-feelings" src="https://image.flaticon.com/icons/svg/1742/1742375.svg" alt="">
                        <img class="img-feelings" src="https://image.flaticon.com/icons/svg/1742/1742464.svg" alt="">
                        <img class="img-feelings" src="https://image.flaticon.com/icons/svg/1742/1742491.svg" alt="">
                        
                      </div>
                          <label for="range" class="ml-5 mt-1 text-center">
                                <input type="range" name="valSintomas[]" id="range" min="0" max="1" step="0.01" value="0" onchange="cambiar(this.value, <?php echo $sintoma['id_enf_sint'];?>)" oninput="cambiar(this.value, <?php echo $sintoma['id_enf_sint'];?>)"><h4 class="text-center txt-range"  id="<?php echo $sintoma['id_enf_sint'];?>">0%</h4>
                          </label>
                     </li>
                 </ul>                
                 <?php endforeach; ?>
                  </div>

                <li class="list-group-item text-center">
                  <button id="btnValidar" class="btn btn-primary" type="submit">Evaluar</button>
                </li>  
                </form>

              </ul>

        </div>
      </div>
    </section>

    <div>

    <!-- NOTE  Verificacion del llenado-->
    <!-- <pre>
      <?php //var_dump($a_names_radiobtn) ?>
    </pre> -->

    </div>

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
  <script src="js/jquery.timepicker.min.js"></script>
  <script src="js/particles.min.js"></script>
  <script src="js/particle.js"></script>
  <script src="js/scrollax.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="js/google-map.js"></script>
  <script src="js/main.js"></script>

  <!-- REVIEW Agregar el script para la generacion de un arreglo de los checkbox -->
  <!-- REVIEW Agregar el script para la generacion de un arreglo de los radio buttons -->

  <script type="text/javascript">

function cambiar(rango, h){
        //alert(rango);
        document.getElementById(h).innerHTML = Math.round((rango*100) * 100) / 100  + "%";
}

//   var n = 'choice';
//   var name =<?php echo json_encode($a_names_radiobtn);  ?> ;

//   $(function() {

//         $("#btnValidar").click(function() {
//           var sinto = new Array();
//           for(a = 0; a < name.length; a++){
//             var f = n.concat(name[a]);
//             //console.log("input[name='"+f+" ']");
//             if (typeof a !== 'undefined'){
              
//               if(!$("input[name='"+ f + "']").is(':checked')){
//                   //alert('Asegurate que todos los campos esten marcados');
//                 }else{
//                   var sal = $("input[name='"+ f + "']:checked").val();
//                   sinto.push(sal);
//                   alert(sinto);
//                 }
//             }

//             //console.log(sinto);


//           }

//          // console.log(sint);

//           $.ajax({
//               type: "GET",
//                   url: "evaluacion_p.php",
//                   data: {
//                     sintomas: sinto
//                   },//capturo array     
//                   success: function(data){
//                     //console.log(data);
//                   },
//                   error: function(data) {
//                     alert('error');
//                   }
//               });


//         });

// });

  </script>



    
  </body>
</html>
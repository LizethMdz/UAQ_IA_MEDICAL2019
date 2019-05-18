<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <script src="jquery.min.js"></script>
  <title>Icon Hover Animations Transition</title>

<!-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous"> -->
  
<!-- <link rel="stylesheet" href="main.css"> -->
</head>

<body>

  <style>
    body {
  margin: 0;
  padding: 0;
}

ul {
  margin: 0;
  padding: 0;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  display: flex;
}

ul li {
  list-style: none;
  position: relative;
  width: 70px;
  height: 70px;
  background: #fff;
  margin: 0 20px;
  border: 2px solid #fff;
  box-sizing: border-box;
  border-radius: 50%;
  transition: 0.5s;
  cursor: pointer;
}

ul li .far {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  font-size: 48px;
  color: #ea4c89;
  transition: 0.5s;
}

ul li:before {
  content: "";
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background: #ea4c89;
  border-radius: 50%;
  transform: scale(1);
  transition: 0.5s;
  opacity: 0;
}

ul li:hover .far {
  color: #fff;
}

ul li:hover:before {
  opacity: 1;
  transform: scale(0.8);
}

ul li:after {
  content: "";
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background: transparent;
  border-radius: 50%;
  transform: scale(0);
  transition: 0.5s;
  opacity: 0;
  border: 2px dashed #ea4c89;
  box-sizing: border-box;
}

ul li:hover:after {
  opacity: 1;
  animation: animate 10s linear infinite;
}

.radio-button {
  cursor: pointer;
  padding-right: 25px;
}
input[type=radio] {
    box-sizing: border-box;
    padding: 0;
}

input {
    font-size: 1rem;
    line-height: 1.5;
    padding: 11px 23px;
    border: 1px solid #90A4AE;
    border-radius: 0;
    outline: 0;
    background-color: transparent;
}

.radio-button__input {
    opacity: 0;
    position: absolute;
}

.radio-button__control {
    position: relative;
    display: inline-block;
    width: 20px;
    height: 20px;
    left: -25px;
    bottom: -20px;
    margin-right: 12px;
    vertical-align: middle;
    background-color: inherit;
    color: #ea4c89;
    border: 2px solid #90A4AE;
    border-radius: 24px;
}

.radio-button__input:checked+.radio-button__control:after {
    content: "";
    display: block;
    position: absolute;
    top: 5px;
    left: 5px;
    width: 10px;
    height: 10px;
    background-color: #ea4c89;
    border-radius: 12px;
}

.radio-button__input:checked+.radio-button__control {
    border-color: #ea4c89;
}

.radio-button__control {
  transform: scale(0.75);
}


@keyframes animate {
  0% {
    transform: scale(0.92) rotate(0deg);
  }
  100% {
    transform: scale(0.92) rotate(360deg);
  }
}

  </style>

  <form method="GET">

  <ul>
    <li>
      <a href="#">
        <i class="far fa-smile" ></i>
      </a>
        <label class="radio-button">
        <input type="radio" class="radio-button__input" id="choice1-1" name="choice1" value="0.00"> Ausencia
        <span class="radio-button__control"></span>
    </li>
    <li>
      <a href="#">
        <i class="far fa-flushed"></i>
      </a>
    <label class="radio-button">
    <input type="radio" class="radio-button__input" id="choice1-1" name="choice1" 
    value="0.30"> Leve
    <span class="radio-button__control"></span>
    </li>
    <li>
      <a href="#">
        <i class="far fa-frown-open"></i>
      </a>
    <label class="radio-button">
    <input type="radio" class="radio-button__input" id="choice1-1" name="choice1"
    value="0.50"> Medio
    <span class="radio-button__control"></span>
    </li>
    <li>
      <a href="#">
        <i class="far fa-tired" aria-hidden="true"></i>
      </a>
        <label class="radio-button">
        <input type="radio" class="radio-button__input" id="choice1-1" name="choice1"
        value="0.70"> Critico
        <span class="radio-button__control"></span>
    </li>
    <li>
      <a href="#">
        <i class="far fa-dizzy" aria-hidden="true"></i>
      </a>
        <label class="radio-button">
        <input type="radio" class="radio-button__input" id="choice1-1" name="choice1"
        value="0.90"> Grave
        <span class="radio-button__control"></span>
    </li>
    
  </ul>

  <button type="submit">
    Evaluar
  </button>

  </form>

  <br><br><br>

  <form action="salida.php" method="GET">
  <fieldset id="enfermedades">
    <legend>Elige las enfermedades que quieres comparar</legend>
     Apendicitis <input type="checkbox" name="hola[]" value="Apendicitis">
    Colitis  <input type="checkbox" name="hola[]" value="Colitis"> 
    Dolor Estomacal  <input type="checkbox" name="hola[]" value="Dolor">
  </fieldset>
   Escribe <input type="text" name="kk">
  <button type="submit" id="enviar">Enviar</button>
  </form>
  <script type="text/javascript">


  $(function() {
    $('#enviar').click(function() {
        var enfer = new Array();
 
        $('input[name="hola[]"]').each(function() {
              if($(this).is(':checked')){
                enfer.push($(this).val());
              
          }
            //enfer.push($(this).val());
        });
 
        //alert(enfer);    
      // $.ajax({
      // type: "GET",
      //     url: "salida.php",
      //     data: {
      //       enfer: enfer
      //     },//capturo array     
      //     success: function(data){
      //       //alert('success');
      //     },
      //     error: function(data) {
      //       alert('error');
      //     }
      // });
    });



});





  </script>
<br>
  id seleccionado <span id="arr"></span>
  <br>
  id seleccionado<span id="str"></span>

</body>

</html>
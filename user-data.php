<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Icon Hover Animations Transition</title>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

  <script src="pruebas/jquery.min.js"></script>
</head>

<body>

  <form method="GET" action="salida.php">

  <ul>
    <li>

        <label class="">
        <input type="radio" class="radio-" id="choice1-1" name="choice1" value="0.00"> 
        <span class="radio-button__control"></span>
        <span class="radio-button__label">Ausencia</span>
  </label>
    </li>
    <li>

    <label class="">
    <input type="radio" class="radio-" id="choice1-1" name="choice1" 
    value="0.30"> 
    <span class="radio-button__control"></span>
    <span class="radio-button__label">Leve</span>
  </label>
    </li>
    <li>

    <label class="">
    <input type="radio" class="radio-" id="choice1-1" name="choice1"
    value="0.50">
    <span class="radio-button__control"></span>
    <span class="radio-button__label">Medio</span>
    </label>
    </li>
    <li>

        <label class="">
        <input type="radio" class="radio-" id="choice1-1" name="choice1"
        value="0.70"> 
        <span class="radio-button__control"></span>
        <span class="radio-button__label">Critico</span>
        </label>
    </li>
    <li>

        <label class="">
        <input type="radio" class="radio-" id="choice1-1" name="choice1"
        value="0.90"> 
        <span class="radio-button__control"></span>
        <span class="radio-button__label">Grave</span>
        </label>
    </li>


    
  </ul>

  <ul>
    <li>
    <input type="radio" class="" id="choice1-2" name="choice2"
        value="0.80"> 
    </li>
    <input type="radio" class="" id="choice1-2" name="choice2"
        value="0.90"> 
    </li>
  </ul>

  <ul>
    <li>
    <input type="radio" class="" id="choice1-3" name="choice3"
        value="0.6"> 
    </li>
    <input type="radio" class="" id="choice1-2" name="choice3"
        value="0.50"> 
    </li>
  </ul>
  <?php $valor = array(1, 2, 3);?>
  <button type="submit" id="btnValidar">
    Evaluar
  </button>

  </form>
<script>
  var n = 'choice';
  var name =<?php echo json_encode($valor);  ?> ;

  $(function() {

$("#btnValidar").click(function() {
  var sinto = new Array();
  for(a = 0; a < name.length; a++){
    var f = n.concat(name[a]);
     //console.log("input[name='"+f+" ']");
     if (typeof a !== 'undefined'){
       
       if(!$("input[name='"+ f + "']").is(':checked')){
          //alert('Asegurate que todos los campos esten marcados');
        }else{
          var sal = $("input[name='"+ f + "']:checked").val();
          sinto.push(sal);
        }
     }

     console.log(sinto);


  }

  //console.log(sint);

  $.ajax({
      type: "GET",
          url: "salida.php",
          data: {
            sintomas: sinto
          },//capturo array     
          success: function(data){
            console.log(data);
          },
          error: function(data) {
            alert('error');
          }
      });


});

});
</script>

</body>

</html>
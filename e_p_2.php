<?php 
 require_once('includes/load.php'); 
 if (!$session->isUserLoggedIn(true)) { redirect('index.php', false);}

 $user = current_user();


$puntuaciones = values_each_symptom_by_illness_table();
$sintomas =  join_dictinct_symptoms_table();

/**
 * Array obtained from the user's GET 
 * */
$sintomasPaciente = $_GET['valSintomas'];
$enferEvaluar = $_GET['disease'];


echo "<pre>";
var_dump($sintomasPaciente);
echo "</pre>";

echo "<pre>";
var_dump($enferEvaluar);
echo "</pre>";

/**
 * Obtaining the punctuation of each
 *symptom in conjunction with your illness
 * from database
  NOTE  insertar las demás enfermedades
  
 */

$a_patron = []; //Recibirá los valores de los patrones de la BD por enfermedad
$a_div_patron = [];
for ($i=0; $i < sizeof($enferEvaluar) ; $i++) { 
    $clave = $enferEvaluar[$i];
    foreach ($puntuaciones as $key ) { //Recorre cada posicion de la consulta a la BD
        $valor = $key[$clave];
        if( $valor <= 1){
            array_push($a_patron, $valor); //Almacena cada puntiacion enfermedad - sintoma
        }
    }
}

//A vector that contains all the symptom patterns for sickness
$a_div_patron = array_chunk($a_patron, SINTOMAS);

/** TODO  Realiza la Union entre las enfermedades 
 *  echo "[ Pos: " . $i . "," . $j ." - ". $patron_div[$i] [$j] . "]"; */

$columnas = sizeof($sintomasPaciente);
$filas = sizeof($a_div_patron);

$aux=0;
$mayor = $a_div_patron[0][0];
$union_enfer = [];

for ($s = 0; $s < $columnas; $s++){ //Recorre 9
    $aux = 0;
    for ($u=0; $u < $filas ; $u++) {  //Recorre 2
        //echo "[ Pos: " . $a_div_patron[$u] [$s] . "]" ;
        if($a_div_patron[$u][$s] >=  $aux){
          
            $mayor = $a_div_patron[$u][$s];
            $aux = $mayor;

            }
        }
        array_push($union_enfer,$aux);
       // echo $aux;
       // echo "<br>";
}

echo "<pre>";
var_dump($union_enfer);
echo "</pre>";
echo "<br>";


/** TODO Se realiza la intersección del los sintomas del usuario en conjunto con 
 * la union de las enfermedades
 */

$interseccion_enf_arruser = interseccion($sintomasPaciente, $union_enfer);

echo "<pre>";
var_dump($interseccion_enf_arruser);
echo "</pre>";
echo "<br>";
$enf_comprobada = umbral_v2($interseccion_enf_arruser);



/** Diagnóstico Final */

  if($enf_comprobada == "coincide"){
    for ($i=0; $i <sizeof($enferEvaluar) ; $i++) { 

        $consultas =  join_illness_medication_name_table($enferEvaluar[$i]);
        foreach ($consultas as $key) {
          $nombre =  utf8_encode($key['nombenf']);
          $imagen =  remove_junk($key['imgenf']);
          $origen = utf8_encode($key['origenenf']);
          $trata = utf8_encode( $key['tratamiento']);

          echo $nombre;
          echo $imagen;
          echo $origen;
          echo $trata;
          echo "<br>";
    
        }
    }
  }else{
      echo "Lo siento :/ El grado de confiabilidad entre los sintomas elegidos y los valores
      de las enfermedades que fueron comparados no fue suficiente como
      para decir que posees alguna de ellas.";
  }

 ?>
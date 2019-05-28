<?php 
 require_once('includes/load.php'); 
 if (!$session->isUserLoggedIn(true)) { redirect('index.php', false);}

 $user = current_user();


$puntuaciones = values_each_symptom_by_illness_table();
$sintomas =  join_dictinct_symptoms_table();

/**
 * Array obtained from the user's GET 
 * */
$sintomasPaciente = $_POST['valSintomas'];
$enferEvaluar = $_POST['disease'];


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


echo "<pre>";
var_dump($a_div_patron);
echo "</pre>";
echo "<br>";

/** TODO  Realiza la Union entre las enfermedades 
 *  echo "[ Pos: " . $i . "," . $j ." - ". $patron_div[$i] [$j] . "]"; */

//Efectua la operacion
$interseccion_enf_arruser = interseccion_v2($a_div_patron, $sintomasPaciente);

//Array final incluye la salida de la interseccion más el grado de confiabilidad
// por enfermedad

$interseccion_e_u_div = array_chunk($interseccion_enf_arruser, SINTOMAS + 1);


// Obtener los grados de confiabilidad de cada enfermedad
$a_grados = [];

for ($m=0; $m < sizeof($interseccion_e_u_div); $m++) { 

    for ($h=0; $h < SINTOMAS + 1 ; $h++) { 
        
        if ( $m == $m and $h == SINTOMAS) {
        
            $temp = $interseccion_e_u_div[$m][$h];
            array_push($a_grados, $temp, $enferEvaluar[$m]);
            
        }

    }
}

/** Diagnóstico Final */
$resDiagnostico = Diagnostico($a_grados);
$gradoCoincidencia = umbral_v2($resDiagnostico);



echo "<pre>";
var_dump($interseccion_enf_arruser);
echo "</pre>";
echo "<br>";

echo "<pre>";
var_dump($a_grados);
echo "</pre>";
echo "<br>";

echo $gradoCoincidencia;

echo "<br>";



/** Diagnóstico Final */

  if($gradoCoincidencia == $resDiagnostico[1]){
  

        $consultas =  join_illness_medication_name_table($gradoCoincidencia);
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
    
  }else{
      echo "Lo siento :/ El grado de confiabilidad entre los sintomas elegidos y los valores
      de las enfermedades que fueron comparados no fue suficiente como
      para decir que posees alguna de ellas.";
  }

 ?>
<?php 
 require_once('includes/load.php'); 

$puntuaciones = values_each_symptom_by_illness_table();
$sintomas =  join_dictinct_symptoms_table();


/** SECTION Verificacion de las entradas */


/**
 * Obtaining the punctuation of each
 *symptom in conjunction with your illness
 * from database
  NOTE  insertar las demás enfermedades
  
 */

$a_enf = [APENDICITIS, COLITIS];
$a_patron = []; //Recibirá los valores de los patrones de la BD por enfermedad
$a_div_patron = [];
for ($i=0; $i < sizeof($a_enf) ; $i++) { 
    $clave = $a_enf[$i];
    foreach ($puntuaciones as $key ) { //Recorre cada posicion de la consulta a la BD
        $valor = $key[$clave];
        if( $valor < 1){
            array_push($a_patron, $valor); //Almacena cada puntiacion enfermedad - sintoma
        }
    }
}

//A vector that contains all the symptom patterns for sickness
$a_div_patron = array_chunk($a_patron, SINTOMAS);
// Array obtained from the user's GET 
$user_ = ['0.00','0.90','0.70','0.30','0.30','0.70','0.30','0.30','0.00'];

echo "<pre>";
var_dump($a_div_patron);
echo "</pre>";
echo "<br>";

/** TODO  Realiza la Union entre las enfermedades 
 *  echo "[ Pos: " . $i . "," . $j ." - ". $patron_div[$i] [$j] . "]"; */

$columnas = sizeof($user_);
$filas = sizeof($a_div_patron);

$aux=0;
$mayor = $a_div_patron[0][0];
$union_enfer = [];

for ($s = 0; $s < $columnas; $s++){ //Recorre 9
    $aux = 0;
    for ($u=0; $u < $filas ; $u++) {  //Recorre 2
        echo "[ Pos: " . $a_div_patron[$u] [$s] . "]" ;
        if($a_div_patron[$u][$s] >=  $aux){
          
            $mayor = $a_div_patron[$u][$s];
            $aux = $mayor;

            }
        }
        array_push($union_enfer,$aux);
        echo $aux;
        echo "<br>";
}

echo "<pre>";
var_dump($union_enfer);
echo "</pre>";
echo "<br>";

/** TODO Se realiza la intersección del los sintomas del usuario en conjunto con 
 * la union de las enfermedades
 */

$interseccion_enf_arruser = interseccion($user_, $union_enfer);

echo "<pre>";
var_dump($interseccion_enf_arruser);
echo "</pre>";
echo "<br>";



 ?>


<?php 
 require_once('includes/load.php'); 

$puntuaciones = values_each_symptom_by_illness_table();
$sintomas =  join_dictinct_symptoms_table();

/**
 * Array obtained from the user's GET 
 * */
$array_user = [];


/** SECTION Verificacion de las entradas */
// $choice_1 = $_GET['choice1'];
// if(isset($choice_1)){

//     array_push($array_user, $choice_1);
// }
//     $choice_2 = $_GET['choice2'];
// if(isset($choice_2)){

//     array_push($array_user, $choice_2);
// }
//     $choice_3 = $_GET['choice3'];
// if(isset($choice_3)){

//     array_push($array_user, $choice_3);
// }
//     $choice_4 = $_GET['choice4'];
// if(isset($choice_4)){

//     array_push($array_user, $choice_4);
// }
//     $choice_5 = $_GET['choice5'];
// if(isset($choice_5)){

//     array_push($array_user, $choice_5);
// }
//     $choice_6 = $_GET['choice6'];
// if(isset($choice_6)){

//     array_push($array_user, $choice_6);
// }

// $choice_8 = $_GET['choice8'];
// if(isset($choice_8)){

//     array_push($array_user, $choice_8);
// }

// $choice_9 = $_GET['choice9'];
// if(isset($choice_9)){

//     array_push($array_user, $choice_9);
// }

// $choice_10 = $_GET['choice10'];
// if(isset($choice_10)){

//     array_push($array_user, $choice_10);
// }

/** !SECTION Fin */



/**
 * Obtaining the punctuation of each
 *symptom in conjunction with your illness
  NOTE  insertar las demás enfermedades
  
 */

$a_enf = [APENDICITIS, COLITIS];
$a_patron = []; //Reacibe los valores de los patrones
$a_div_patron = [];
for ($i=0; $i < sizeof($a_enf) ; $i++) { 
    $clave = $a_enf[$i];
    foreach ($puntuaciones as $key ) {
        $valor = $key[$clave];
        if( $valor < 1){
            array_push($a_patron, $valor);
        }
    }
}

// Un vector que contiene todos los patrones de sintomas por enfermedad 
$a_div_patron = array_chunk($a_patron, SINTOMAS);
$user_ = ['0.00','0.90','0.70','0.30','0.30','0.70','0.30','0.30','0.00'];

//Efectua la operacion
$salida = interseccion_v2($a_div_patron, $user_);

//Array final incluye la salida de la interseccion más el grado de confiabilidad
// por enfermedad

$salida_div = array_chunk($salida, SINTOMAS + 1);


/**
 * ANCHOR  USUARIO - PATRON - ENFERMEDAD
 */

echo "<pre>";
var_dump($a_div_patron);
echo "</pre>";
echo "<br>";

echo "<pre>";
var_dump($salida_div);
echo "</pre>";

/**
 NOTE  Verificar el valor del  umbral
 */

// Obtener los grados de confiabilidad de cada enfermedad
$a_grados = [];


for ($m=0; $m < sizeof($salida_div); $m++) { 

    for ($h=0; $h < SINTOMAS + 1 ; $h++) { 
        
        if ( $m == $m and $h == SINTOMAS) {
        
            $temp = $salida_div[$m][$h];
            array_push($a_grados, $temp, $a_enf[$m]);
            
        }

    }
}

// echo "<pre>";
// var_dump($a_grados);
// echo "</pre>";


$consultas;
$data_enfermedades = [];
for ($g=0; $g < sizeof($a_grados); $g++) { 
     
        if ( $g%2 != 0 ) {
            $tmp = $a_grados[$g];
            $consultas =  join_illness_medication_name_table($tmp);
            //echo $a_grados[$g];
            foreach ($consultas as $key) {
                $nombre = $key['nombenf'];
                $imagen = $key['imgenf'];
                $origen = $key['origenenf'];
                $trata = $key['tratamiento'];
                array_push($data_enfermedades, $nombre, $imagen, $origen, $trata);  
            }
        }

}



// echo "<pre>";
// var_dump($data_enfermedades);
// echo "</pre>";

$a_final = array_chunk($data_enfermedades, CANT_COL_T_ENFER);


echo "<table style='border: 1px solid #000;'>";
 
for ($b=0; $b < sizeof($a_final) ; $b++) { 

    echo "<tr>";
    for ($u=0; $u < CANT_COL_T_ENFER ; $u++) { 
        echo "<td>". $a_final[$b][$u] ."</td>";
    }
    echo "</tr>";

}
 
echo "</table>"; 



 ?>


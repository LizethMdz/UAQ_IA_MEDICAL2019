<?php 
 require_once('includes/load.php'); 

if (!$session->isUserLoggedIn(true)) { redirect('index.php', false);}

 $user = current_user();

 $puntuaciones = values_each_symptom_by_illness_table();
$sintomas =  join_dictinct_symptoms_table(); //POR ID

$sintomasPaciente = $_GET['valSintomas'];

echo "<pre>";
var_dump($sintomasPaciente);
echo "</pre>";

/**
 * Obtaining the punctuation of each
 *symptom in conjunction with your illness
  NOTE  insertar las demás enfermedades
  
 */

$a_enf = [SALMONELOSIS, APENDICITIS, CANCERFGASTRICO, PARASITOSIS, DIARREA, DISPEPSIA ,GASTRITIS, GASTROENTERITIS, INTOLACTOSA,CELIAQUIA];


$a_patron = []; //Reacibe los valores de los patrones
$a_div_patron = [];
for ($i=0; $i < sizeof($a_enf) ; $i++) { 
    $clave = $a_enf[$i];
    print( $i);
    foreach ($puntuaciones as $key ) {
        $valor = $key[$clave];
    
        if( $valor <= 1){
            array_push($a_patron, $valor);
        }
    }
}

// Un vector que contiene todos los patrones de sintomas por enfermedad 
$a_div_patron = array_chunk($a_patron, SINTOMAS);
echo "<pre>";
var_dump($a_div_patron);
echo "</pre>";
//Efectua la operacion
$salida = interseccion_v2($a_div_patron, $sintomasPaciente);

//Array final incluye la salida de la interseccion más el grado de confiabilidad
// por enfermedad

$salida_div = array_chunk($salida, SINTOMAS + 1);


// echo "<pre>";
// var_dump($salida_div);
// echo "</pre>";

// Obtener los grados de confiabilidad de cada enfermedad
// $a_grados = [];

// for ($m=0; $m < sizeof($salida_div); $m++) { 

//     for ($h=0; $h < SINTOMAS + 1 ; $h++) { 
        
//         if ( $m == $m and $h == SINTOMAS) {
        
//             $temp = $salida_div[$m][$h];
//             array_push($a_grados, $temp, $a_enf[$m]);
            
//         }

//     }
// }

// echo "<pre>";
// var_dump($a_grados);
// echo "</pre>";

// $resDiagnostico = Diagnostico($a_grados);
// $resEnfermedad = umbral($resDiagnostico);
// if($resEnfermedad){
//     $consultas =  join_illness_medication_name_table($resEnfermedad);
//     echo "<table style='border: 1px solid #000;'>";
//     foreach ($consultas as $key) {
//         $nombre =  utf8_encode($key['nombenf']);
//         $imagen = $key['imgenf'];
//         $origen = utf8_encode($key['origenenf']);
//         $trata = utf8_encode( $key['tratamiento']);

//     echo "<tr>";

//     echo "<td>". $nombre ."</td>";
//     echo "<td>". $imagen."</td>";
//     echo "<td>". $origen ."</td>";
//     echo "<td>". $trata ."</td>";

//     echo "</tr>";

//     }
 
//     echo "</table>"; 

// }else{
//     echo "No se encontro ninguna coincidencia";
// }


// echo "<pre>";
// var_dump($resDiagnostico);
// echo "</pre>";


?>
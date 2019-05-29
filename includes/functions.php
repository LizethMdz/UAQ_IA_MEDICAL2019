<?php  

$errors = array();
    /*--------------------------------------------------------------*/
    /* Function for Remove escapes special
    /* characters in a string for use in an SQL statement
    /*--------------------------------------------------------------*/
        function real_escape($str){
        global $con;
        $escape = mysqli_real_escape_string($con,$str);
        return $escape;
        }
        /*--------------------------------------------------------------*/
        /* Function for Remove html characters
        /*--------------------------------------------------------------*/
        function remove_junk($str){
            $str = nl2br($str);
            $str = htmlspecialchars(strip_tags($str, ENT_QUOTES));
            return $str;
        }

        /*--------------------------------------------------------------*/
        /* Function for redirect
        /*--------------------------------------------------------------*/
        function redirect($url, $permanent = false)
        {
            if (headers_sent() === false)
            {
            header('Location: ' . $url, true, ($permanent === true) ? 301 : 302);
            }

            exit();
        }

          /*--------------------------------------------------------------*/
  /* Function for Uppercase first character
  /*--------------------------------------------------------------*/
  function first_character($str){
    $val = str_replace('-'," ",$str);
    $val = ucfirst($val);
    return $val;
  }
  /*--------------------------------------------------------------*/
/* Function for Checking input fields not empty
/*--------------------------------------------------------------*/
function validate_fields($var){
  global $errors;
  foreach ($var as $field) {
    $val = remove_junk($_POST[$field]);
    if(isset($val) && $val==''){
      $errors = $field ." No puede estar en blanco.";
      return $errors;
    }
  }
}
/*--------------------------------------------------------------*/
/* Function for Display Session Message
   Ex echo displayt_msg($message);
/*--------------------------------------------------------------*/
function display_msg($msg =''){
   $output = array();
   if(!empty($msg)) {
      foreach ($msg as $key => $value) {
         $output  = "<div class=\"alert alert-{$key}\">";
         $output .= "<a href=\"#\" class=\"close\" data-dismiss=\"alert\">&times;</a>";
         $output .= remove_junk(first_character($value));
         $output .= "</div>";
      }
      return $output;
   } else {
     return "" ;
   }
}



    /*---------------------------------------------------------------
     *  Function that returns the percentage of reliability
     ----------------------------------------------------------------*/
    function regla_tres($valor){
        $res = ($valor * PORCENTAJE) / SINTOMAS;
        return $res;
    }

    /*--------------------------------------------------------
     * Function that returns the maximum value
     * among two arrays
    ----------------------------------------------------------*/


    function union($a1, $a2){
        $sUnion = [];
            $tam = sizeof($a1);

            for($i = 0; $i < $tam; $i++){

                if($a1[$i] >= $a2[$i]){
                    
                    $temp = $a1[$i];
                    array_push($sUnion, $temp);
                    }
                else{
                    $temp = $a2[$i];
                    array_push($sUnion, $temp);
                    
                }
            }
            return $sUnion;
    }

        /*--------------------------------------------------------
     * Function that returns the maximum value
     * among two arrays, version 2
    ----------------------------------------------------------*/


    function union_v2($a_div_patron, $user_){
        $salida_operacion = [];
        $umbral = 0;
        for ($i=0; $i < sizeof($a_div_patron); $i++) { 
            for ($j=0; $j < sizeof($user_); $j++) { 
                $gradoC = 0;
                if ($a_div_patron[$i][$j] >= $user_[$j]) {
                    $temp = $a_div_patron[$i][$j];
                    array_push($salida_operacion, $temp);
                    /**
                     NOTE  Verificar el valor del  umbral
                    */

                    if($a_div_patron[$i][$j] == $user_[$j]) { 
                        $umbral = $umbral + 1 ;
                    };
                    $gradoC = regla_tres($umbral);
                   
                }else{
                    $temp = $user_[$j];
                    array_push($salida_operacion, $temp);
                    
                }
            }
            array_push($salida_operacion, $gradoC);
        }
        return $salida_operacion;
    }

    /*--------------------------------------------------------
     * Function that returns the minimum value
     * between two arrays
    ----------------------------------------------------------*/

    function interseccion($a1, $a2){
        $sInterseccion = [];
        $tam = sizeof($a1);
        $gradoC = 0;

        for($i = 0; $i < $tam; $i++){
            if($a1[$i] <= $a2[$i]){
                
                $temp = $a1[$i];
                array_push($sInterseccion, $temp);
                $gradoC +=  $temp;
            }
            else{
                $temp = $a2[$i];
                array_push($sInterseccion, $temp);
                $gradoC +=  $temp;
                
            }
        }
        array_push($sInterseccion, $gradoC);
        return $sInterseccion;
    }


    /*--------------------------------------------------------
     * Function that returns the minimum value
     * between two arrays, version 2
    ----------------------------------------------------------*/

    function interseccion_v2($a_div_patron, $user_){
        $salida_operacion = [];
        for ($i=0; $i < sizeof($a_div_patron); $i++) {  //10
            $gradoC = 0;
            for ($j=0; $j < sizeof($user_); $j++) {  //38
                if ($a_div_patron[$i][$j] <= $user_[$j]) {
                    $temp = $a_div_patron[$i][$j];
                    array_push($salida_operacion, $temp);
                    $gradoC += $temp;
                   
                }else{
                    $temp = $user_[$j];
                    array_push($salida_operacion, $temp);
                    $gradoC += $temp;
                    
                }
            }
            array_push($salida_operacion, $gradoC);
        }
        return $salida_operacion;
    }

    /*--------------------------------------------------------
     * Function that returns the union or 
     * the intersection between two sets
    ----------------------------------------------------------*/



    function operadorConjDif($C1, $C2, $opcion){
        $C3 = 0 ;
        switch ($opcion) {
            case 1:
                # Unión.
                $C3 = union($C1, $C2);
                break;
            
            case 2:
                # Intersección
                $C3 = interseccion($C1, $C2);
                break;
        }

        return $C3;
    }
    /*---------------------------------------------------------------
     * Function that returns the disease with greater coincidence
    -----------------------------------------------------------------*/

    function Diagnostico($arr)
    {
        $aux = 0;
        $pivote = 0;
        $mayor = $arr[0];
        $a_mayor_enfermedad =[];

        for($k = 0; $k < sizeof($arr); $k++){
            
            if($k%2 == 0){
                $aux = $arr[$k];
                if($aux >= $pivote){
                    $mayor = $aux;
                    $pivote = $mayor;
                    $enfermedad = $arr[$k+1];
                }   
            } 
        }

        array_push($a_mayor_enfermedad, $pivote, $enfermedad);

        return $a_mayor_enfermedad;
        
    }

    /**VERSION 1  UMBRAL */

    function umbral($arr){
        $enf_diagnosticada = $arr[1];
        $enf_comprobada = "";
        if($arr[0] >= UMBRAL){
            $enf_comprobada = $enf_diagnosticada;
        }else{
            $enf_comprobada = "No coincide";;
        }

        return $enf_comprobada;
    }

    /**VERSION 2  UMBRAL */

    function umbral_v2($arr){
        
        $enf_diagnosticada = $arr[1];
        $enf_comprobada = "";
        if($arr[0] >= UMB){
            $enf_comprobada = $enf_diagnosticada;
        }else{
            $enf_comprobada = "No coincide";
        }
        return $enf_comprobada;

      }


      /*--------------------------------------------------------------*/
        /* Function for Creting random string
        /*--------------------------------------------------------------*/
        function randString($length = 5)
        {
            $str='';
            $cha = "0123456789abcdefghijklmnopqrstuvwxyz";

            for($x=0; $x<$length; $x++)
            $str .= $cha[mt_rand(0,strlen($cha))];
            return $str;
        }






?>
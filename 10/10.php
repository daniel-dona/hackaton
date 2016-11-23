<?php

function test($in){

    $out = shell_exec("java -jar 10-CajaFuerte.jar 10.in ".$in);
    
    return str_replace("\n", "", $out);
    
}

$digs = array();

for($i = 0; $i < 9; $i++){
    
    $digs[] = 0;
    
}

//print_r($digs);

// Se sabe que para 000000000 ningún caracter es válido!

$res = array();

for($k = 0; $k < 9; $k++){
    
    for($i = 0; $i < 10; $i++){
        
        $digs[$k] = $i;
        
        $key = implode("", $digs);
        
        $por = test($key);
    
        //echo "\n".$por."  ".$key;
        
        if($por != 0){ //Se asume que por defecto, el porcentaje es 0, podría cambiarse por otro dependiendo del porcentaje para 000000000
            
            //echo " ~ OK";
            
            $res[$k] = $i;
            
            $digs[$k] = 0;
            
            break;
            
        } 
        
    }
    
}

file_put_contents("file.out", implode("", $res));

?>

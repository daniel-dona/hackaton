<?php

function orden($b, $a){
    
    $xya = explode(",", $a);
    
    $xyb = explode(",", $b);
    
    if($xya[0] != $xyb[0]){
        
        if($xya[0] > $xyb[0]){
            
            return -1;
            
        }else{
            
            return 1;
            
        }
        
    }else{
        
        if($xya[1] != $xyb[1]){
        
            if($xya[1] > $xyb[1]){
                
                return -1;
                
            }else{
                
                return 1;
                
            }
            
        }else{
            
            return 0;
            
        }
        
    }
    
}
    
    

$in = file_get_contents("12.in");

// Se asume que existe una proyección en 2D de la pelota, es decir, un círculo de radio 5 centrado en 0,0
// Por lo tanto, podemos calcular las posiciones dentro del círculo partiendo de un módulo del vector de la posición menor de 5

$line = explode("\r\n", $in);

foreach($line as $pos){
    
    $xy = explode(",", $pos);
    
    if(@$xy[0]){
    
        $mod = sqrt(($xy[0] * $xy[0])+($xy[1] * $xy[1]));
        
        if($mod > 5){
            
           // echo $pos." fuera\n";
            
        }else{
            
            $dentro[] = $pos;
            
        }
        
    }
    
}

usort($dentro, "orden");

$out = "";

for($i = 0; $i < count($dentro); $i++){
    
    $out .= $dentro[$i]."\n";
    
}

file_put_contents("12.out", $out);

?>

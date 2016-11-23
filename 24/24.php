<?php

function is_cap($char){
    
    $ascii = ord($char);

    if($ascii > 64 && $ascii < 91){
        
        return true;
        
    }else{
        
        if($ascii > 96 && $ascii < 123){
            
            return false;
            
        }else{
            
            return "spec";
            
        }
        
    }
    
}

$in = file_get_contents("24.in");

$lns = explode("\n\n", $in);

print_r($lns);

foreach($lns as $in){
    
    $in = str_split($in);

    $last_cap = false;

    $count_cap = 0;

    $count = 0;

    $buf = "";

    $line = "";

    for($i = 0; $i < count($in); $i++){
        
        //if(is_cap($in[$i]) == "spec"){
        
            if(is_cap($in[$i])){
                
                if($last_cap == false){ //Empieza una secuencia de mayúsculas
                
                    $buf .= $in[$i];
                    
                    $count_cap = 1;
                    
                    $last_cap = true;
                    
                }else{//Continúa una secuencia de mayúsculas
                    
                    $count_cap++;
                    
                    $buf .= $in[$i];
                    
                }
                
            }else{
                
                
                
                if($last_cap == false){//Secuencia de minúsculas
                
                    $count ++;
                    
                    $line .= $in[$i];
                    
                    
                }else{// Finaliza secuencia mayúsculas
                    
                    if($count_cap > 1){
                    
                        $line .= "MAYUS".$buf."MAYUS";
                        
                        $count = $count + $count_cap + 2;
                        
                    }else{
                        
                        $line .= "SHIFT".$buf;
                        
                        $count = $count + $count_cap + 1;
                        
                    }
                    
                    $count_cap = 0;
                    
                    $last_cap = false;
                
                }
                
            }
        
    }

    echo $line;

}

?>

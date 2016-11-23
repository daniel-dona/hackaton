<?php

function is_happy($n, $c){
    
    if($c > 7){
        
        return false; //Bucle infinito
        
    }
    
    $dig = str_split($n);
    
    $res = 0;
    
    for($i = 0; $i < count($dig); $i++){
        
        $res += $dig[$i]*$dig[$i];
        
    }
    
    if($res > 1){
        
        return is_happy($res, ($c+1));
        
    }else{
        
        if($res == 1){
        
            return true;
            
        }
        
    }
    
}

$out = "";

for($i = 1; $i < 200; $i++){
    
    if(gmp_prob_prime($i) && is_happy($i, 0)){

        $out .=  $i." primo feliz\n";
        
    }else{
            
        if(is_happy($i, 0)){
            
            $out .=  $i." feliz\n";
            
        }else{
            
            $out .=  $i." triste\n";
            
        }
        
    }
    
}

file_put_contents("06.out", $out);

?>

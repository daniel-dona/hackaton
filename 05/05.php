<?php

function dec_to_hodor($num){
    
    $out = "";
    
    $num = str_pad(decbin($num), 5, "0", STR_PAD_LEFT);
    
    if($num[0] == 0){
            
        $out .= "h";
            
    }else{
            
        $out .= "H";
        
    }
        
        if($num[1] == 0){
            
            $out .= "o";
            
        }else{
            
            $out .= "O";
            
        }
        
        if($num[2] == 0){
            
            $out .= "d";
            
        }else{
            
            $out .= "D";
            
        }
        
        if($num[3] == 0){
            
            $out .= "o";
            
        }else{
            
            $out .= "O";
            
        }
        
        
        if($num[4] == 0){
            
            $out .= "r";
            
        }else{
            
            $out .= "R";
            
        }
        
    return $out;
        
}

$dic1 = array();

$dic2 = array();


for($i = 1; $i < 27; $i++){
    
    $dic2[] = chr(96+$i);

    $dic1[] = dec_to_hodor($i);
    
}

//$in = "hOdor hODOR hODor hoDor hodor HoDor hOdor hoDoR hodor hoDor hODOR hODOR HodOr HODOR hodor hODor hodoR hODOr hODOr hOdoR HodOR HoDor hoDoR HodOr HodOR hodor hodoR HodOr hoDoR hodor hodOR hODOR hODoR hODoR hOdoR hODOr hoDOR";

$in = file_get_contents("05.in");


// Casos especiales

$dic2[] = "!";
$dic2[] = "?";

$dic1[] = "HODOR";
$dic1[] = "HODOr";

$dic2[] = "";
$dic1[] = " ";

$dic1[] = "hodor";
$dic2[] = " ";


file_put_contents("05.out", str_replace($dic1, $dic2, $in)); 

?>

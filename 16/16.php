<?php

$in = file_get_contents("dump.txt");

$line = explode("\n", $in);

$buf = "";

$by = 0;

for($i = 7; $i < count($line)-1; $i++){
    
    $by++;
    
    if($by > 8){
    
        //echo chr(bindec($buf));
        
        echo $buf;
        
        $buf = "";
        
        $by = 0;
        
    }else{
        
        $buf .= $line[$i][16];
        
    }
    
}

?>

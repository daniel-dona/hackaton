<?php

// Depende de la librería GMP (https://gmplib.org/), php5-gmp en Debian/Linux Mint

$in = file_get_contents("02.in");

$parts = str_split($in, 1);

$count = array_count_values($parts);

arsort($count);

$keys = array_keys($count);

$tot = 0;

$out = "";

for($i = 0; $i < count($count); $i++){
    
    //$out .= $keys[$i];
    
    if(gmp_prob_prime($count[$keys[$i]]) && $keys[$i] != " "){
        
        $out .= $keys[$i]." ".$count[$keys[$i]]." ".(ord($keys[$i])/1000)."€\n";
        
        $tot += $count[$keys[$i]] * (ord($keys[$i])/1000);
        
    }
    
}

$out .= "Coste total: ".(ceil($tot*100)/100)."€\n";

file_put_contents("02.out", $out);

?>

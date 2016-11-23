<?php

$in = str_replace("\n", "", file_get_contents("01.in"));

$out = "";

$a = explode(".", $in);

for($i = count($a); $i > 0; $i--){
    
    $out .= implode(".", array_slice($a, 0, $i))."\n";
    
}

//echo $out;

file_put_contents("01.out", $out);

?>


<?php

$in = file_get_contents("19.in");

$out = json_encode(json_decode($in), JSON_PRETTY_PRINT);

$out = str_replace("    ", "  ", $out);

file_put_contents("19.out",$out);

?>

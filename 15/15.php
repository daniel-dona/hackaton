<?php

$in = str_replace(" ", "", file_get_contents("15.in"));

$line = explode("\n", $in);

$x = strlen($line[0]);
$y = $x;

$gd = imagecreate($x, $y);

$gd2 = imagecreate(512, 512);

$c1 = imagecolorallocate($gd, 255, 255, 255); 
$c0 = imagecolorallocate($gd, 0, 0, 0); 

for ($i = 0; $i < $x; $i++) {
    
    $pix = str_split($line[$i], 1);

    for($k = 0; $k < $y; $k++){
        
        if($pix[$k] == 1){
        
            imagesetpixel($gd, $i, $k, $c0);
            
        }else{
            
            imagesetpixel($gd, $i, $k, $c1);
            
        }
        
    }

}

imagecopyresized($gd2, $gd, 0, 0, 0, 0, 512, 512, $x, $y);
 
imagepng($gd2, "qr.png");

$raw = shell_exec("curl -s 'https://zxing.org/w/decode' -F 'filename=@qr.png'"); //Decodificación del PNG mediante una API web

$a = explode("Parsed Result</td><td><pre>", $raw);

$b = explode("</pre></td>", $a[1]);

file_put_contents("15.out", $b[0]);

?>



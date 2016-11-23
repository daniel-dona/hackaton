<?php


function get_pix($im, $x, $y){
    
    if($x < 0 || $y < 0){
        
        return "black";
        
    }

    $rgb = imagecolorat($im, $x, $y);

    $col = imagecolorsforindex($im, $rgb);
    
    if($col["red"] == 255 && $col["green"] == 0 && $col["blue"] == 0){
        
        return "red";
        
    }
    
    if($col["red"] == 0 && $col["green"] == 0 && $col["blue"] == 255){
        
        return "blue";
        
    }
    
    if($col["red"] == 0 && $col["green"] == 0 && $col["blue"] == 0){
        
        return "black";
        
    }
    
    if($col["red"] == 255 && $col["green"] == 255 && $col["blue"] == 255){
        
        return "white";
        
    }
    
    

}

$startx = 0;
$starty = 1;

$im = imagecreatefrompng("13-input.png");


function step($sx, $sy, $px, $py){
    
    $pos = array();
    
    $im = imagecreatefrompng("13-input.png");

    
    $pos[0] = get_pix($im, $sx-1, $sy); // Left
    $pos[1] = get_pix($im, $sx+1, $sy); //Right
    $pos[2] = get_pix($im, $sx, $sy-1); //Up
    $pos[3] = get_pix($im, $sx, $sy+1); //Down
    
    print_r($pos);
    
    do{
        
        if($pos[$rand] == "white"){
            
            step($
    
    
}


step($startx, $starty, $startx, $starty);

echo get_pix($im, 1, 1)

?>

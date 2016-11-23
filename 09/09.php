<?php

function op($n, $c){
    
    //$out .= $n;
    
    if($n != 1 && $n != 0){
    
        if(($n % 2) == 0){
            
            return op($n / 2, ($c+1));
            
        }else{
            
            return op(($n * 3) + 1, ($c+1));
            
        }
        
    }else{
        
        return $c;
        
    }
    
}

$out = "";

$res = array();

for($i = 0; $i <= 10000; $i++){
    
    /*if($i == 0 || $i == 1){
        
        //$out .= $i."\t1\n";
        
    }else{
        
        //$out .= $i."\t".op($i, 0)."\n";
        
    }*/
    
    @$res[op($i,0)] ++;
    
}

ksort($res);

$keys = array_keys($res);


for($i = 0; $i < count($keys); $i++){
    
    $out .= $keys[$i]."\t".$res[$keys[$i]]."\n";
    
}

file_put_contents("09.out", $out);

?>

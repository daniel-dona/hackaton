<?php

$in = file_get_contents("03.in");

$words = explode("\n", $in);

// API https://es.wikipedia.org/w/api.php?action=query&titles=****&prop=langlinks&lllimit=500&format=json

// ISO codes: inglés (en), alemán (de), lituano (lt) , polaco (pl) y vietnamita (vi).

function get_api($w){
    
    $w = str_replace("\r", "", $w);

    $out = json_decode(file_get_contents("https://es.wikipedia.org/w/api.php?action=query&redirects&titles=".urlencode($w)."&prop=langlinks&list=allredirects&lllimit=500&format=json"), true);
    
    //echo  "https://es.wikipedia.org/w/api.php?action=query&titles=".urlencode($w)."&prop=langlinks&lllimit=500&format=json";
    
    $ret = @array_pop($out["query"]["pages"])["langlinks"];
    
    $lang = array();
    
    if($ret){
        
        for($i = 0; $i < count($ret); $i++){
            
            $lang[$ret[$i]["lang"]] = $ret[$i]["*"];
            
        }
        
        return $lang;
        
    }else{
        
        return false;
        
    }
    
}

$out = "";

for($i = 1; $i < count($words)-1; $i++){
    
    $trans = get_api($words[$i]);
    
    $out .=  "\n".$words[$i]."\n";

    if($trans){

        $out .=  "inglés -> ".(@$trans["en"] ? $trans["en"] : "?" )."\n";
        $out .=  "alemán -> ".(@$trans["de"] ? $trans["de"] : "?" )."\n";
        $out .=  "lituano -> ".(@$trans["lt"] ? $trans["lt"] : "?" )."\n";
        $out .=  "polaco -> ".(@$trans["pl"] ? $trans["pl"] : "?" )."\n";
        $out .=  "vietnamita -> ".(@$trans["vi"] ? $trans["vi"] : "?" )."\n";
        
    }else{
        
        $out .=  "inglés -> ?\n";
        $out .=  "alemán -> ?\n";
        $out .=  "lituano -> ?\n";
        $out .=  "polaco -> ?\n";
        $out .=  "vietnamita -> ?\n";
        
    }
    
    sleep(2); // La API tiene un rate limit y puede devolver errores por hacer peticiones demasiado rápido

}

file_put_contents("03.out", $out);

?>

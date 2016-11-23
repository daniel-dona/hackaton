<?php

require_once 'vendor/autoload.php';
use \Fhaculty\Graph\Graph as Graph;
use \Algorithms\ShortestPath as SP;

$graph = new Graph();

$in = file_get_contents("14.in");

$in_edge = explode("\n", $in);

array_pop($in_edge);

for($i = 0; $i < count($in_edge); $i++){
    
    $in_edge[$i] = explode(", ", $in_edge[$i]);
    
    $in_node[] = $in_edge[$i][0];
    $in_node[] = $in_edge[$i][1];
    
}

$nodes_in = array_values (array_unique($in_node));

$nodes_s = array();

for($i = 0; $i < count($nodes_in); $i++){
    
    $nodes_s[$nodes_in[$i]] = $graph->createVertex($nodes_in[$i]);
    
}

print_r($nodes_in);

for($i = 0; $i < count($in_edge); $i++){

    
    $nodes_s[$in_edge[$i][0]]->createEdgeTo($nodes_s[$in_edge[$i][1]])->setWeight($in_edge[$i][2]+1-1);
    
}

$path = new SP();

die();

?>

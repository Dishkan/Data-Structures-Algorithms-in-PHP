<?php
 class Graph {
     public $numberOfNodes;
     public $adjacentList;

     public function __construct()
     {
         $this->numberOfNodes = 0;
         $this->adjacentList = [];
     }

     public function addVertex($node) {
         $this->adjacentList[$node] = [];
         $this->numberOfNodes++;
     } 

     public function addEdge($node1, $node2) {
         $this->adjacentList[$node1].array_push($node1, $$node2);
         $this->adjacentList[$node2].array_push($node2, $node1);
     } 
 }

$myGraph = new Graph();
$myGraph->addVertex('0');
$myGraph->addVertex('1');
$myGraph->addVertex('2');
$myGraph->addVertex('3');
$myGraph->addVertex('4');
$myGraph->addVertex('5');
$myGraph->addVertex('6');
$myGraph->addEdge('3', '1'); 
$myGraph->addEdge('3', '4'); 
$myGraph->addEdge('4', '2'); 
$myGraph->addEdge('4', '5'); 
$myGraph->addEdge('1', '2'); 
$myGraph->addEdge('1', '0'); 
$myGraph->addEdge('0', '2'); 
$myGraph->addEdge('6', '5');
print_r($myGraph);


?>
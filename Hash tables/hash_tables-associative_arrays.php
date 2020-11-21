<?php
//https://subscription.packtpub.com/book/application_development/9781786463890/2/ch02lvl1sec14/understanding-hash-tables
$ronaldo = [ 
    "name" => "Ronaldo", 
    "country" => "Portugal", 
    "age" => 31, 
    "currentTeam" => "Real Madrid" 
]; 

$messi = [ 
    "name" => "Messi", 
    "country" => "Argentina", 
    "age" => 27, 
    "currentTeam" => "Barcelona" 
]; 

$team = [ 
    "player1" => $ronaldo, 
    "player2" => $messi 
]; 

print_r($team);
echo "<br />";
echo "<br />";
   //$array = array("name" => "Alex", "age" => 22, "student" => true);
   foreach($ronaldo as $k => $v) {
	      echo "$k = $v<br />"; 
   }
?>
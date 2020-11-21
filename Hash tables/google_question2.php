<?php
//https://subscription.packtpub.com/book/application_development/9781786463890/2/ch02lvl1sec14/understanding-hash-tables
//Google Question
//Given an array = [2,5,1,2,3,5,1,2,4]:
//It should return 2

//Given an array = [2,1,1,2,3,5,1,2,4]:
//It should return 1

//Given an array = [2,3,4,5]:
//It should return undefined

//O(n^2)
//Space Complexity - O(1)
 function firstReccuringCharacter($input) {
   echo "Duplicates are ";
   for($i = 0; $i < count($input); $i++){
    for($j = $i + 1; $j < count($input); $j++){
	    if($input[$i] === $input[$j]) {
		  echo $input[$i]. " | ";
		}
   }
}
}
$array = array(2,5,1,2,3,5,1,2,4);
firstReccuringCharacter($array);

echo "<br />";
echo "<br />";

//O(n) - became faster by using hash tables which are key and value
 function firstReccuringCharacter2($input) {
   $array_temp = array();
   echo "Duplicates are ";
   foreach($input as $value) {
    if(!in_array($value, $array_temp)) {
	   $array_temp[] = $value;
	}
    else echo " " .$value. " | ";
   }
}
$array2 = array(2,5,1,2,3,5,1,2,4);
firstReccuringCharacter2($array2);

?>
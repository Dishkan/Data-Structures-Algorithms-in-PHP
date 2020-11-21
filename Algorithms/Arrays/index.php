<?php
 $array1 = array("a", "b", "c");
 $array2 = array("e", "a", "x");

function check($arr1, $arr2){
  for($i=0; $i < count($arr1); $i++){
    for($j=0; $j < count($arr2); $j++){
      if ($arr1[$i] == $arr2[$j]){
        echo "It is equal";
        return true;
        break;
      }
    }
  }
   echo "false";
}

check($array1, $array2);

?>
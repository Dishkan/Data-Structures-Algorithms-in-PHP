<?php
$numbers = array(99, 44, 63, 2, 1, 5, 63, 87, 283, 4, 0);

function selectionSort($array) {
    $length = count($array);
      for($i = 0; $i < $length; $i++) {
    // set current index as minimum
        $min = $i;
        $temp = $array[$i];
      for($j = 0; $j < $length; $j++) { 
        if($array[$j] > $array[$min]) {
    //update minimum if current is lower that what we had previously
         $min = $j;
        }
      }  
       return $array[$i] = $array[$min];
       //returns last sorted element in the list
       $array[$min] = $temp;
    }    
  }
  
 print selectionSort($numbers);

?>
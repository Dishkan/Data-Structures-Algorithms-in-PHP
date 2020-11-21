<?php
$numbers = array(99, 44, 6, 2, 1, 5, 63, 87, 283, 4, 0);

function bubbleSort($array) {
    $length = count($array);
      for ($i = 0; $i < $length; $i++) { 
        if($array[$i] > $array[$i+1]) {
          //Swap the numbers
          $temp = $array[$i];
          $array[$i] = $array[$i+1];
   return $array[$i+1] = $temp;
   //returns first element in the list by comparing it
   //with the next one
        }
      }      
  }
  
 print bubbleSort($numbers);

?>
<?php

 $numbers = array(99, 44, 63, 2, 1, 5, 63, 87, 283, 4, 0);

function quickSort($array, $left, $right) { 
  $pivot = 0;
  $partitionIndex = 0;

  if($left < $right) {
    $pivot = $right;
    $partitionIndex = partition($array, $pivot, $left, $right);
    
    //sort left and right
    quickSort($array, $left, $partitionIndex - 1);
    quickSort($array, $partitionIndex + 1, $right);
  }
  var_dump( $array );
}
   
function partition($array, $pivot, $left, $right){
  $pivotValue = $array[$pivot];
  $partitionIndex = $left;

  for($i = $left; $i < $right; $i++) {
    if($array[$i] < $pivotValue){
      swap($array, $i, $partitionIndex);
      $partitionIndex++;
    }
  }
  swap($array, $right, $partitionIndex);
  return $partitionIndex;
}

function swap($array, $firstIndex, $secondIndex){
    $temp = $array[$firstIndex];
    $array[$firstIndex] = $array[$secondIndex];
    $array[$secondIndex] = $temp;
}

//Select first and last index as 2nd and 3rd parameters
print quickSort($numbers, 0, count($numbers) - 1);

?>
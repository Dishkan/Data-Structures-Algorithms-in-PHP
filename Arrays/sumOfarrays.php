<?php
function hasPairWithSum($arr, $sum){
  for($i =0; $i< count($arr)-1; $i++){
     for($j = $i+1; $j < $arr; $j++){
        if ($arr[$i] + $arr[$j] === $sum)
            return true;
            echo "Success";
     }
  }

  return false;
}
hasPairWithSum([6,4,3,2,1,7], 9);

?>
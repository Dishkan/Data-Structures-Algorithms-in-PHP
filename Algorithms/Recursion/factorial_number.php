<?php
function findFactorialRecursive($number) { 
  if ($number == 0) return 1;
  return $number * findFactorialRecursive($number - 1);
}

function findFactorialIterative($number) {
  $answer = 1;
  for ($i = 2; $i <= $number; $i++) {
    $answer = $answer * $i;
  }
  echo $answer;
}

print findFactorialRecursive(5);

?>
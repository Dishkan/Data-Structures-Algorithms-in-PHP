<?php
$cache = array();
function fibonacciGood($n) {
  global $cache;
  if(array_key_exists($n, $cache)) {
    return $cache[$n];
  }
  else {
    if($n > 1) {
      $result = fibonacciGood($n-1) + fibonacciGood($n-2);
      $cache[$n] = $result;
      return $result;
    }
    return $n;
  }
}

function fibonacciMaster($n) {
  $cache = array(); // it gets reset when it calls again
  if(array_key_exists($n, $cache)) {
    return $cache[$n];
  }
  else {
    if($n > 1) {
      $result = fibonacciMaster($n-1) + fibonacciMaster($n-2);
      $cache[$n] = $result;
      return $result;
    }
    return $n;
  }
}

function fibonacciMaster2($n) {
  $cache = array(0,1); 
    for($i = 2; $i<= $n; $i++) {
     array_push($cache, $cache[$i-1] + $cache[$i-2]);
    }
    print_r($cache);
    echo '<br />';
    return array_pop($cache);
}

echo 'fibonacciGood';
echo '<br />';
print fibonacciGood(6);
echo '<br />';
print fibonacciGood(7);
echo '<br />';
echo 'fibonacciMaster';
echo '<br />';
print fibonacciMaster(6);
echo '<br />';
print fibonacciMaster(7);
echo '<br />';
echo 'fibonacciMaster2';
echo '<br />';
print fibonacciMaster2(6);
echo '<br />';
print fibonacciMaster2(7);


?>
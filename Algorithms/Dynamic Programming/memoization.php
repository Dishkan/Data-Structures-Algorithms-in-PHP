<?php
 $cache = array();
 function addTo100($n) {
   global $cache;
   if(array_key_exists($n, $cache)) {
      return $cache[$n];
   } else {
       return $n + 100;
   }
 }

 print addTo100(5);


?>
<?php
 function reverseStr($str){
   if($str == ''){
     echo "Good bye!";
   }
   if(is_array($str)){
   print_r(array_reverse($str));
   }
   else {
   echo strrev($str);
   }
 }
 $str_array = array('Dishkan');
 $str = 'Dishkan';
 reverseStr($str);
 

?>
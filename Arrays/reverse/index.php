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
 
 
echo "<br />";
echo "<b>Without any commands of php</b>";
echo "<br />";

function reverseArray(&$arr, $left, $right)
{
    while ($left < $right)
    {
        $temp = $arr[$left]; 
        $arr[$left] = $arr[$right];
        $arr[$right] = $temp;
        $left++;
        $right--;
    }

    for ($i = 0; $i < count($arr); $i++) {
    echo $arr[$i];	
	}
}     
 
$arr = ["h","e","l","l","o"];
 
echo "Reversed array is below";
echo "<br />";
reverseArray($arr, 0, count($arr));
 

?>
 

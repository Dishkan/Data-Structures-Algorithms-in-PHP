<?php
//https://subscription.packtpub.com/book/application_development/9781786463890/2/ch02lvl1sec14/understanding-hash-tables

//Associative arrays are simply hash tables in php! they use keys and values as well
//Below is O(n)
function showDuplicates($array)
{
  $array_temp = array();
   echo "Duplicates are ";
   foreach($array as $value)
   {

     if (!in_array($value, $array_temp))
     {
       $array_temp[] = $value;
     }
     else echo " ".$value." | ";
   }
}
$array = array(1,1,2,3,4,5,3,6,6);
showDuplicates($array);

   echo "<br/>";
   echo "<br/>";
   echo "<br/>";

//Second option
 // PHP program to Find duplicates in O(n)  
// time and O(1) extra space | Set 1 
//Below is O(n)

function printRepeating($arr, $size) 
{ 
    echo "The repeating elements are: \n"; 
    for ($i = 0; $i < $size; $i++) 
    { 
        if (0 <= $arr[abs($arr[$i])]) 
            $arr[abs($arr[$i])] = -$arr[abs($arr[$i])]; 
        else
            echo abs($arr[$i]) . " | "; 
    } 
} 
// Driver Code 
$arr = array(1, 2, 3, 1, 3, 6, 6); 
$arr_size = count($arr); 
printRepeating($arr, $arr_size); 
?>
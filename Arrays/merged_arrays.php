<?php  
// PHP program to merge two sorted arrays 
$arr1 = array(1, 3, 5, 7); 
$n1 = count($arr1); 
$arr2 = array(2, 4, 6, 8); 
$n2 = count($arr2);   
$arr3[$n1 + $n2] = array(); 

mergeArrays($arr1, $arr2, $n1, $n2, $arr3); 
function mergeArrays(&$arr1, &$arr2, $n1, $n2, &$arr3) 
{ 
    $i = 0; 
    $j = 0; 
    $k = 0; 
  while ($i < $n1 && $j < $n2) 
    {	
        if ($arr1[$i] < $arr2[$j]) 
            $arr3[$k++] = $arr1[$i++]; 
        else
            $arr3[$k++] = $arr2[$j++]; 
    } 
    while ($i < $n1) 
        $arr3[$k++] = $arr1[$i++]; 
  
    while ($j < $n2) 
        $arr3[$k++] = $arr2[$j++]; 
} 
echo "Array after merging - " ; 
for ($i = 0; $i < $n1 + $n2; $i++) 
echo $arr3[$i] . " "; 
?> 

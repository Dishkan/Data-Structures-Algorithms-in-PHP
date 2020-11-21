<?php
// counting_sort works good only for small integer number (0-100)
// function for counting sort
function countingsort(&$Array, $n) 
{
  $max = 0;
  //find largest element in the Array
  for ($i=0; $i<$n; $i++) 
    {  
      if($max < $Array[$i])
      {
         $max = $Array[$i];
      } 
    }
  //Create a freq array to store number of occurrences of 
  //each unique elements in the given array 
  for ($i=0; $i<$max+1; $i++) 
   {  
       $freq[$i] = 0;
   } 
  for ($i=0; $i<$n; $i++) 
   {  
       $freq[$Array[$i]]++;
   } 
   //sort the given array using freq array
   for ($i=0, $j=0; $i<=$max; $i++) 
    {  
      while($freq[$i]>0)
      {
        $Array[$j] = $i;
        $j++;
        $freq[$i]--;
      }
    } 
}

// function to print array
function PrintArray($Array, $n) 
{ 
  for ($i = 0; $i < $n; $i++) 
    echo $Array[$i]." "; 
} 

// test the code
$MyArray = array(99, 44, 63, 2, 1, 5, 63, 87, 283, 4, 0);
$n = sizeof($MyArray); 
echo "Original Array - ";
PrintArray($MyArray, $n);
echo "<br />";
countingsort($MyArray, $n);
echo "\nSorted Array - ";
PrintArray($MyArray, $n);
?>
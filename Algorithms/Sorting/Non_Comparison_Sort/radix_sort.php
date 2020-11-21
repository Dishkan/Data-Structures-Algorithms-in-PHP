<?php
// radix_sort works good only for small integer number (0-100)
    // function for radix sort
    function radixsort(&$Array, $n) 
    {
      $max = $Array[0];
      //find largest element in the Array
      for ($i=1; $i<$n; $i++) 
        {  
          if($max < $Array[$i])
             $max = $Array[$i];
        }
      //Counting sort is performed based on place. 
      //like ones place, tens place and so on.
      for ($place = 1; $max/$place > 0; $place *= 10) 
          countingsort($Array, $n, $place); 
     }
    function countingsort(&$Array, $n, $place) 
    {   
      $output = array_fill(0,$n,0);
      //range of the number is 0-9 for each place considered.
      $freq = array_fill(0,10,0);
      //count number of occurrences in freq array
      for($i = 0; $i < $n; $i++)
        $freq[($Array[$i]/$place)%10]++;

      //Change count[i] so that count[i] now contains actual 
      //position of this digit in output[] 
      for ($i = 1; $i < 10; $i++) 
          $freq[$i] += $freq[$i - 1];    
  
      //Build the output array 
      for ($i = $n - 1; $i >= 0; $i--) 
      { 
          $output[$freq[($Array[$i]/$place)%10] - 1] = $Array[$i]; 
          $freq[($Array[$i]/$place)%10]--; 
      }     
      //Copy the output array to the input Array, Now the Array will 
      //contain sorted array based on digit at specified place
      for ($i = 0; $i < $n; $i++) 
          $Array[$i] = $output[$i]; 
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
radixsort($MyArray, $n);
echo "\nSorted Array - ";
PrintArray($MyArray, $n);
?>
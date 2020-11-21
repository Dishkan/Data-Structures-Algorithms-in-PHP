<?php
 
    $numbers = array(99, 44, 63, 2, 1, 5, 63, 87, 283, 4, 0);
 
    function insertionSort($array)
    {
        for ($i = 0; $i < count($array); $i++) {
               $val = $array[$i];
		       $j = $i-1;
		while($j >= 0 && $array[$j] > $val){
			$array[$j+1] = $array[$j];
			$j--;
		}
		$array[$j+1] = $val;
        }
 
        return $array;
    }
 
    $sorted_numbers = insertionSort($numbers);
 
    print_r($sorted_numbers);
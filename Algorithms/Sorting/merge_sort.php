<?php

$numbers = array(99, 44, 63, 2, 1, 5, 63, 87, 283, 4, 0);

function mergeSort($array)
 {
 if(count($array) == 1 ) return $array;
 $mid = count($array) / 2;
 $left_arr = array_slice($array, 0, $mid);
 $right_arr = array_slice($array, $mid);
 $left_arr = mergeSort($left_arr);
 $right_arr = mergeSort($right_arr);
 return merge_arrays($left_arr, $right_arr);
 }

function merge_arrays($left_arr, $right_arr){
	$res = array();
	while (count($left_arr) > 0 && count($right_arr) > 0){
		if($left_arr[0] > $right_arr[0]){
			$res[] = $right_arr[0];
			$right_arr = array_slice($right_arr , 1);
		}else{
			$res[] = $left_arr[0];
			$left_arr = array_slice($left_arr, 1);
		}
	}
	while (count($left_arr) > 0){
		$res[] = $left_arr[0];
		$left_arr = array_slice($left_arr, 1);
	}
	while (count($right_arr) > 0){
		$res[] = $right_arr[0];
		$right_arr = array_slice($right_arr, 1);
	}
	return $res;
}
    
    $sorted_numbers = mergeSort($numbers);
 
    print_r($sorted_numbers);

    ?>
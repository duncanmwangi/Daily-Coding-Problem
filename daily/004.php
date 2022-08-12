<?php
// Given an array of integers, find the first missing positive integer in linear time and constant space. In other words, find the lowest positive integer that does not exist in the array. The array can contain duplicates and negative numbers as well.

// For example, the input [3, 4, -1, 1] should give 2. The input [1, 2, 0] should give 3.

// You can modify the input array in-place.
$A = [-3, -4, -1, 1,0,1,2];
var_dump(solution($A));
function solution($A){
	$C = [];
	foreach ($A as $value) {
		if($value>0 && !isset($B[$value])){
			$B[$value] = $value;
		}
	}
	$i = 1;
	for(; $i<=count($B); $i++) {
		if(!isset($B[$i])){
			break;
		}
	}
	return $i;
	for($i=1; $i<=count($B); $i++){
		if($B[$i-1] !==$i){

		}
	}
}
<?php
//write a function called solution($A, $k) that accepts an sorted array $A and value $K and returns the index where the value $k passed to the function is located. 
//If the value is not found return -1
// var_dump(solution([1,2,3,4,5,6,7,8],8));
var_dump(solution(range(1,100000000),100000000));
function solution($A, $k){
	$len = count($A);
	$min = 0;
	$max = count($A)-1;
	while($min <= $max){
		$mid = floor(($min+$max)/2);
		if($A[$mid]<$k){
			$min = $mid+1;
		}elseif($A[$mid]>$k){
			$max = $mid-1;
		}else{
			return $mid;
		}
	}
	return -1;
}
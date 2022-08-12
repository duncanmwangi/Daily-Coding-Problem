<?php
//get the maximum sum if x consecutive numbers in array $A

//given solution([1,2,3,4,5,6],2) returns 11
// var_dump(solution([1,2,3,12,4,5,6],2));
var_dump(solution(range(0, 100000),50));
function solution($A, $k)
{
	$len = count($A);
	if($len<$k){
		return null;
	}
	$max = null;
	$total = 0;
	for ($i=0; $i < $len ; $i++) {
		$total +=$A[$i];
		if($i>=$k){
			$total -=$A[$i-$k];
		}
		if($max===null || $max<$total){
			$max = $total;
		}
	}
	return $max;
}
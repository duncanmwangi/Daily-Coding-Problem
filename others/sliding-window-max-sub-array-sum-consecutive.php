<?php
$result = solution([1,2,5,8,3,2,5,1,1,2],2);
var_dump($result);
$result = solution([1,2,5,2,3,2,5,1,1,2],4);
var_dump($result);
$result = solution([1,2,5,1,3,2,5,1,1,2],3);
var_dump($result);
function solution($A, $num)
{
	$len = count($A);
	if($len==0){
		return 0;
	}
	$total = 0;
	$max = null;
	for($i = 0; $i<$len; $i++){
		$total += $A[$i];
		if($i>$num-1){
			$total-=$A[$i-$num];
		}
		if(!isset($max) || $max<$total){
			$max=$total;
		}
	}
	return $max;
}
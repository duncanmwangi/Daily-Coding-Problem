<?php
$result = solution([1,3,3,5,6,7,10,12,19], 8);
$result = solution([-1,0,3,4,5,6], 4.1);
var_dump($result);
function solution($A, $N)
{
	$len = count($A);
	$start = 0;
	$end = $len-1;
	while($start<$end){
		$average = ($A[$start]+$A[$end])/2;
		if($average==$N){
			return true;
		}
		if($average>$N){
			$end--;
		}else{
			$start++;
		}
	}
	return false;
}
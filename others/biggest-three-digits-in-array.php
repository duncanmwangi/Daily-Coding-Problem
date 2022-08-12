<?php

$A = [111,111,43,5,0,55,66,67,9,22, 281];
// $A = [34, 14];
// $A = [3589578, 5879385];
// $A = [22, 222];

var_dump(solution($A));
var_dump(solutionB($A));

function solutionB($A){
	$len = count($A);
	if($len<=3){
		return $A;
	}
	rsort($A);
	return [$A[0], $A[1], $A[2]];
}
function solution($A){
	$len = count($A);
	if($len<=3){
		return $A;
	}
	$dig1 = null;
	$dig2 = null;
	$dig3 = null;
	foreach ($A as $value) {
		if($dig1==null || $value>=$dig1){
			$temp = $dig1;
			$dig1=$value;
			$dig3 = $dig2;
			$dig2 = $temp;
		}elseif($dig2==null || $value>=$dig2){
			$temp = $dig2;
			$dig2=$value;
			$dig3 = $temp;
		}elseif($dig3==null || $value>=$dig3){
			$dig3=$value;
		}
	}
	return [$dig1, $dig2, $dig3];
}
<?php

$A = [182, 281];
// $A = [34, 14];
// $A = [3589578, 5879385];
// $A = [22, 222];

var_dump(solution($A));
function solution($A){
	if(strlen($A[0]) !== strlen($A[1])){
		return false;
	}
	$len = strlen($A[0]);
	$temp = [];
	for($i=0; $i<$len; $i++){
		$char = substr($A[0],$i,1);
		if(isset($temp[$char])){
			$temp[$char]++;
		}else{
			$temp[$char] = 1;
		}
	}
	for($j=0; $j<$len; $j++){
		$k = substr($A[1],$j,1);
		if(!isset($temp[$k]) || $temp[$k]==0){
			return false;
		}
		$temp[$k]--;
	}
	return true;
}
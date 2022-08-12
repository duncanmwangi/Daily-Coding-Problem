<?php
// $A = ['a','b','c','a'];
$A = ['a','b','c'];
// $A = ['a','a','c'];
// $A = [1,2,3,2];
var_dump(solution($A));
function solution($A){
	$len = count($A);
	if($len<=1){
		return false;
	}
	$B = [];
	foreach($A as $k){
		if(!isset($B[$k])){
			$B[$k] = 1;
		}else{
			$B[$k]++;
		}
		if($B[$k]>1){
			return true;
		}
	}
	return false;
}
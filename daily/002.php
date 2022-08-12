<?php
// Given an array of integers, return a new array such that each element at index i of the new array is the product of all the numbers in the original array except the one at i.

// For example, if our input was [1, 2, 3, 4, 5], the expected output would be [120, 60, 40, 30, 24]. If our input was [3, 2, 1], the expected output would be [2, 3, 6].

// Follow-up: what if you can't use division?
$A = [1, 2, 3, 4, 5];
var_dump(solutionB($A));
var_dump(solutionA($A));

function solutionB($A){
	$total = 1;
	foreach ($A as $key => $value) {
		$total*=$value;
	}
	foreach ($A as $key => $value) {
		$B[$key]=$total/$value;
	}
	return $B;
}
function solutionA($A){
	$B = [];
	foreach ($A as $key => $value) {
		$B[$key] = product($key, $A);
	}	
	return $B;
}
function product($key,$A, $current = 0, $total = 1){
	if($key!=$current){
		$total = $A[$current]*$total;
	}
	if(isset($A[$current+1])){
		return product($key,$A, 1+$current, $total);
	}
	return $total;

}
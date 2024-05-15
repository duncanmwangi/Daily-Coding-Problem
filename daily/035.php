<?php
// Given an array of strictly the characters 'R', 'G', and 'B', segregate the values of the array so that all the Rs come first, the Gs come second, and the Bs come last. You can only swap elements of the array.

// Do this in linear time and in-place.

// For example, given the array ['G', 'B', 'R', 'R', 'B', 'R', 'G'], it should become ['R', 'R', 'R', 'G', 'G', 'B', 'B'].
$A = ['G', 'B', 'R', 'R', 'B', 'R', 'G'];
// var_dump(solution($A));
// function solution($A, $newA=[]){
// 	if(count($A)==1) return array_merge($A, $newA);
// 	$order = ['R'=>1, 'G'=>2, 'B'=>3];
// 	$len = count($A);
// 	for($i=0; $i<$len-1; $i++){
// 		$current = $A[$i];
// 		$next = $A[$i+1];
// 		if($order[$current]>$order[$next]){
// 			$temp = $A[$i];
// 			$A[$i] = $A[$i+1];
// 			$A[$i+1] = $temp;
// 		}
// 	}
// 	$last = array_pop($A);
// 	return solution($A, array_merge([$last], $newA));
// }

var_dump(solution(40));
function solution($num=1000){
	$sum = 0;
	for($i=1; $i<$num; $i++){
		$fib = solutionC($i);
		if($fib>4000000){
			break;
		}
		if($fib%2 ==0){
			$sum+=$fib;
		}
	}
	return $sum;
}

function solutionC($n)
{
    $first = $last = 1;
    for ($i=3; $i <= $n ; $i++) {
        $temp = $last;
        $last = $last + $first;
        $first = $temp;
    }
    return $last;
}
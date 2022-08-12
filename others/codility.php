<?php
// This is a demo task.

// Write a function:

// function solution($A);

// that, given an array A of N integers, returns the smallest positive integer (greater than 0) that does not occur in A.

// For example, given A = [1, 3, 6, 4, 1, 2], the function should return 5.

// Given A = [1, 2, 3], the function should return 4.

// Given A = [−1, −3], the function should return 1.

// Write an efficient algorithm for the following assumptions:

// N is an integer within the range [1..100,000];
// each element of array A is an integer within the range [−1,000,000..1,000,000].
// Copyright 2009–2022 by Codility Limited. All Rights Reserved. Unauthorized copying, publication or disclosure prohibited.

function solutionA($A) {
    sort($A);

    foreach($A as $k => $a){
        if($a<=0){
            continue;
        }
        if(isset($A[$k+1]) && $A[$k+1]%$a>1){
            return $a+1;
        }
        if(!isset($A[$k+1])){
            return $a+1;
        }

    }
    return 1;
}


function solutionB($A) {
	if(count($A)>100000 || empty($A)) return 'out of range';
    $lowest_missing = 0;
    foreach($A as $b){
        if($b<=0){
            continue;
        }

		if($b>1000000 || $b < -1000000) return 'out of range';
        $has_next = false;
        $next = $b+1;
        foreach($A as $j){
            if($j==$next){
                $has_next = true;
                break;
            }
        }
        if(!$has_next && ($lowest_missing>$next || $lowest_missing==0)){
            $lowest_missing = $next;
        }
    }
    return $lowest_missing == 0 ? 1 : $lowest_missing;
}

function solutionC($A) {
	if(count($A)>100000 || empty($A)) return 'out of range';
	$positives = [];
	foreach($A as $b){
		if($b>0){
			$positives[$b]=$b;
		}
	}
	$num = count($positives)+1;
	for($i=1; $i<=$num; $i++){
		if(!isset($positives[$i])){
			return $i;
		}
	}
}

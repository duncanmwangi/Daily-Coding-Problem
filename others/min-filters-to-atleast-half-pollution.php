<?php
//a company has many factories and wants to reduce pollution by adding filters.
//each filter added halfs the polution index. Subsequent filters also half the pollution index further
// find the minimum number of fileters needed to atleast half the overall polution index of the company
//pollution indices are given as follows
$A = range(1,10000);
// $A = [0,1,0];
$t1 = microtime(true);
$r = solution($A);
$t2 = microtime(true);
$t =$t2-$t1;
echo 'time: '.$t.' result = '.$r;
function solution($A)
{
	$total = 0;
	foreach($A as $index){
		$total+=$index;
	}
	if($total==0){
		return 0;
	}
	$target = $total/2;

	return applyFilter($A, $target);

}

function applyFilter(&$A, $target, $reduction = 0, $filters=0){
	$filters++;
	$reduction+=halfBiggest($A);
	if($reduction>=$target){
		return $filters;
	}
	return applyFilter($A, $target, $reduction, $filters);
}

function halfBiggest(&$A){
	$maxVal = max($A);
	$biggest_key = array_search($maxVal, $A);
	$A[$biggest_key] = $A[$biggest_key]/2;
	return $A[$biggest_key];
}
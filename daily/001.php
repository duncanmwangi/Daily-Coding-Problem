<?php
	/*
	PROBLEM DEFINITION:
	Given a list of numbers and a number k, return whether any two numbers from the list add up to k.
	For example, given [10, 15, 3, 7] and k of 17, return true since 10 + 7 is 17
	*/

	var_dump(solutionA([10, 15, 3, 7], 100));

	function solutionA($nums, $k)
	{
		foreach ($nums as $i => $num) {
			if($num>$k){
				continue;
			}
			$remainder = $k-$num;
			foreach ($nums as $j => $value) {
				if($i==$j){
					continue;
				}
				if($remainder==$value){
					return true;
				}
			}
		}
		return false;
	}
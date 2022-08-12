<?php
	/*
	PROBLEM DEFINITION:
	Fibonacci sequence. Given n the function returns  nth number in the fibonacci series
	[1,1,2,3,5,8,13]
	*/
	//1  returns 1
	//2  returns 1
	//3  returns 2
	//4  returns 3
	//5  returns 5
	//6  returns 8
	//7  returns 13
	var_dump(solutionC(7));

	//recursion
	//does not scale well
	// Time Complexity is O(n2)
	// Space Complexity is O(1)
	function solutionA($n)
	{
		if($n<=2){
			return 1;
		}
		return solutionA($n-1) + solutionA($n-2);
	}

	//memoize
	// Time Complexity is O(n)
	// Space Complexity is O(n)
	function solutionB($n, &$fib = [])
	{
		if(isset($fib[$n])) return $fib[$n];
		$fib[1] = $fib[2] = 1;
		$fib[$n] = solutionB($n-1, $fib) + solutionB($n-2, $fib);
		return $fib[$n];
	}

	//Dynamic programing is the iptimal solution
	// Time Complexity is O(n)
	// Space Complexity is O(1)
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
<?php

// you can write to stdout for debugging purposes, e.g.
// print "this is a debug message\n";

// You want to buy public transport tickets for some upcoming days. You know exactly the days on which you will be traveling. There are three types of ticket:

// 1-day ticket, costs 2, valid for one day;
// 7-day ticket, costs 7, valid for seven consecutive days (e.g. if the first valid day is X, then the last valid day is X+6);
// 30-day ticket, costs 25, valid for thirty consecutive days.
// You want to pay as little as possible having valid tickets on your travelling days.

// You are given a sorted (in increasing order) array A of days when you will be traveling. For example, given:

//     A[0] = 1
//     A[1] = 2
//     A[2] = 4
//     A[3] = 5
//     A[4] = 7
//     A[5] = 29
//     A[6] = 30
// you can buy one 7-day ticket and two 1-day tickets. The two 1-day tickets should be used on days 29 and 30. The 7-day ticket should be used on the first seven days. The total cost is 11 and there is no possible way of paying less.



// Write a function:

// function solution($A);

// that, given an array A consisting of N integers that specifies days on which you will be traveling, returns the minimum amount of money that you have to spend on tickets.

// For example, given the above data, the function should return 11, as explained above.

// Write an efficient algorithm for the following assumptions:

// M is an integer within the range [1..100,000];
// each element of array A is an integer within the range [1..M];
// N is an integer within the range [1..M];
// array A is sorted in increasing order;
// the elements of A are all distinct.


// $A = [1, 2, 4, 5, 7, 29, 30]; //11
// $A = [1, 2, 4, 5, 7, 8,9,11,13,29, 30]; //18
$A = [1, 2, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13,14, 15, 16, 17, 18, 19, 20, 21, 22, 25,29, 30, 31, 32]; //29
// $A = [1, 2, 4, 29, 30]; //10
// $A = [1, 2]; //4
var_dump(solution($A));



function solutionX($A) {
    // write your code in PHP7.0
    $month = 0;
    $week = 0;
    $day = 0;
    $temp_day = 0;
    $temp_week = 0;
    $temp_start_day = null;
    $len = count($A);
    for($i = 0; $i<$len; $i++) {
    	if($temp_start_day==null){
    		$temp_start_day = $A[$i];
    		$temp_day++;
    	}
    	$diff = $A[$i] - $temp_start_day;
    	
    	

    }
}
function solution($A) {
    // write your code in PHP7.0
    $length = count($A);
    if($length>100000) return 'Out of range';
    $one_day = 0;
    $seven_days = 0;
    $thirty_days = 0;
    for($key=0; $key<$length; $key++){
        $key_diff = $length-$key;
        for($days_between=$key_diff-1; $days_between>=1; $days_between--){
            if(!isset($A[$key+$days_between])){
                continue;
            }
            $day_diff = $A[$key+$days_between] - $A[$key];
            if($day_diff>29){
            	continue;
            }
            elseif($days_between>21){
                //month
                $thirty_days++;
            }elseif($days_between==21 && $day_diff<30){
            	$seven_days+=3;
            	$one_day++;
            }elseif($days_between>=13 && $day_diff<=21){
            	$seven_days+=floor($days_between/7);
                $extra_days = $days_between%7;
                if($extra_days>3){
                    $seven_days++;
                }else{
                	$one_day += $extra_days;
                }
                
            }elseif($days_between>=6 && $day_diff<=14){
            	$seven_days+=floor($days_between/7);
                $extra_days = $days_between%7;
                if($extra_days>3){
                    $seven_days++;
                }else{
                	$one_day += $extra_days;
                }
            }elseif($days_between>3 && $day_diff<=7){
            	$seven_days++;
            }elseif($days_between<=3 && $day_diff>7){
            	$one_day += $days_between;
            }else{
                continue;
            }
            $key=$key+$days_between-1;
            break;
        }
    }
    return ['total' => ($thirty_days*25) + ($seven_days*7) + ($one_day*2), 'thirty_days'=>$thirty_days, 'seven_days'=>$seven_days, 'one_day'=>$one_day];
}
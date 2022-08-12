<?php
$result = solution('hello', 'hello');
var_dump($result);
$result = solution('hello', 'hello world');
var_dump($result);
$result = solution('hello', 'is it hello world');
var_dump($result);
$result = solution('hello', 'is it hdelfflo world');
var_dump($result);
$result = solution('hello', 'is it hdelff world');
var_dump($result);
$result = solution('hello', 'hehllo world');
var_dump($result);
function solution($str1, $str2)
{
	$i = 0;
	$j = 0;
	$len1 = strlen($str1);
	$len2 = strlen($str2);
	if($len2<$len1){
		return false;
	}
	while($j<$len2){
		$char1 = substr($str1, $i, 1);
		$char2 = substr($str2, $j, 1);
		if($char1 === $char2){
			$i++;
		}
		if($i === $len1){
			return true;
		}
		$j++;
	}
	return false;
}
function solutionB($str1, $str2)
{
	$len1 = strlen($str1);
	$len2 = strlen($str2);
	$start = 0;
	$end = $len2-1;
	for($i=0; $i<$len1; $i++){
		$char = substr($str1, $i, 1);
		$found = false;
		while($start <= $end){
			$possible_char = substr($str2, $start, 1);
			$start++;
			if($possible_char===$char){
				$found = true;
				break;
			}
		}
		if(!$found){
			return false;
		}
	}
	return true;
}
<?php
// given an array of population data consisting of year of birth and year of death find the year with the highest population

//Questions should we consider a person born in 1920 as part of the population in 1920
//Questions should we consider a person who died in 1920 as part of the population in 1920
//Questions should we consider a person born in 1920 and died in 1920 as part of the population in 1920

//data [[1920, 1930], [1921, 1930], [1922, 1922], [1922, 1930], [1926, 1929], [1929, 1929]]
$N = [[1920, 1930], [1921, 1930], [1922, 1922], [1922, 1930], [1926, 1929], [1929, 1929]];
// $N = [[2000,2010], [1975, 2005], [1975, 2003], [1803, 1809], [1750, 1869], [1840, 1935], [1803, 1921], [1894, 1921]];
var_dump(solution($N));

function solution($N){
	$lowest_year = null;
	$highest_year = null;
	$action = [];
	foreach ($N as $years) {
		if($lowest_year==null || $lowest_year>$years[0]){
			$lowest_year = $years[0];
		}
		if($highest_year==null || $highest_year<$years[0]){
			$highest_year = $years[0];
		}

		//birth
		if(isset($action[$years[0]])){
			$action[$years[0]]++;
		}else{
			$action[$years[0]] = 1;
		}

		//death
		$following_year = $years[1]+1;
		if(isset($action[$following_year])){
			$action[$following_year]--;
		}else{
			$action[$following_year] = -1;
		}
	}
	
	$population = 0;
	$highest_population = 0;
	$highest_population_year = null;
	$highest_pop = [];
	for ($i=$lowest_year; $i <= $highest_year; $i++) { 
		if(!isset($action[$i])){
			continue;
		}
		$population += $action[$i];
		if($population>$highest_population){
			$highest_population = $population;
			$highest_population_year = $i;
			$highest_pop['years'] = [];
			$highest_pop['population'] = $highest_population;
		}
		if($population==$highest_population){
			$highest_pop['years'][] = $i;
		}
	}

	return $highest_pop;

}
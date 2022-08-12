<?php
// Given two strings ransomNote and magazine, return true if ransomNote can be constructed from magazine and false otherwise.

// Each letter in magazine can only be used once in ransomNote.

 

// Example 1:

// Input: ransomNote = "a", magazine = "b"
// Output: false
// Example 2:

// Input: ransomNote = "aa", magazine = "ab"
// Output: false
// Example 3:

// Input: ransomNote = "aa", magazine = "aab"
// Output: true
 

// Constraints:

// 1 <= ransomNote.length, magazine.length <= 105
// ransomNote and magazine consist of lowercase English letters.

var_dump(canConstruct('aa','aab'));
 function canConstruct($ransomNote, $magazine) {
    $ransom_length = strlen($ransomNote);
    $magazine_length = strlen($magazine);
    $diff = $magazine_length-$ransom_length;
    if($diff<0) return false;
    
    $mag_map = [];
    for($i=0; $i<$magazine_length;$i++){
    	$char = substr($magazine, $i, 1);
    	if(isset($mag_map[$char])){
    		$mag_map[$char]++;
    	}else{
    		$mag_map[$char] = 1;
    	}
    }

    for($i=0; $i<$ransom_length;$i++){
    	$value = substr($ransomNote, $i, 1);
    	if(!isset($mag_map[$value]) || $mag_map[$value] <= 0 ){
    		return false;
    	}else{
    		$mag_map[$value]--;
    	}
    }
    return true;
}
function canConstructC($ransomNote, $magazine) {
    $ransom_length = strlen($ransomNote);
    $magazine_length = strlen($magazine);
    $diff = $magazine_length-$ransom_length;
    if($diff<0) return false;

    $magazine_array = str_split($magazine);
    $mag_map = [];
    foreach($magazine_array as $char){
        if(isset($mag_map[$char])){
            $mag_map[$char]++;
        }else{
            $mag_map[$char] = 1;
        }
    }
    $ransom_note_array = str_split($ransomNote);
    foreach ($ransom_note_array as $key => $value) {
        if(!isset($mag_map[$value]) || $mag_map[$value] <= 0 ){
            return false;
        }else{
            $mag_map[$value]--;
        }
    }
    return true;
}
 function canConstructB($ransomNote, $magazine) {
    $ransom_length = strlen($ransomNote);
    $length = strlen($magazine)-$ransom_length;
    if($length<0) return false;
    $ransom_note_array = str_split($ransomNote);
    $magazine_array = str_split($magazine);
    $str = '';
    foreach($ransom_note_array as $char){
        foreach($magazine_array as $k => $v){
            if($char===$v){
                unset($magazine_array[$k]);
                $str.=$v;
                break;
            }
        }
    }
    if($str===$ransomNote){
        return true;
    }
    return false;
}
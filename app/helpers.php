<?php

if (!function_exists('user')) {

	function user(){
		
		return auth()->user();

	}

}

if (!function_exists('limit')) {

	function limit(?int $limit = 0){
		
		return $limit < 1 ? PHP_INT_MAX : $limit;

	}
}
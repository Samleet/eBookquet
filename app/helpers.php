<?php

use Illuminate\Validation\ValidationException;

$theme = null;

if (!function_exists('page')) {

	function page($limit){
		$start = 1;
		return !request()->page  ? 
		$start : (request()->page*$limit)-$limit+
		$start;
	}

}

if (!function_exists('publisher')) {

	function publisher(){
		
		return user('publisher');

	}

}

if (!function_exists('user')) {

	function user($guard = 'api'){
		
		return auth($guard)->user();

	}

}

if (!function_exists('bookhut')) {

	function bookhut(){
		
		return $data = (object) user()->bookhut;

	}

}

if (!function_exists('limit')) {

	function limit(?int $limit = 0){
		
		return $limit < 1 ? PHP_INT_MAX : $limit;

	}
}

if (!function_exists('carbon')) {

	function carbon(){
		
		return new \Carbon\Carbon();

	}

}

if (!function_exists('theme')){

    function theme($route = null, $theme = null){
		$theme = $theme ?? get_theme();
        return "/themes/$theme/$route"; 
    }
	
}

if (!function_exists('set_theme')){ /////////////

	function set_theme($name){
		global $theme;
		$theme = $name;
	}

}

if (!function_exists('get_theme')){ /////////////

	function get_theme(){
		global $theme;
		return $theme;
	}

}

if (!function_exists('res')){

	function res($response){

		return /**/ $response->getData($assoc=1);

	}

}

if (!function_exists('success')){

	function success($response){

		return redirect()->back()
			->with([
			'status' => 'success',
			'message' => $response [ 'message' ]

		]);

	}

}

if (!function_exists('error')){

	function error($e){
		$f = ($e instanceof ValidationException);
		$message = $e->getMessage();
		if($f){
			$errors = $e->errors();
			$message = collect($errors)->first()
				[0];
		}

		return redirect()->back()
			->with([
			'status' => 'error',
			'message' => (string) $message //////

		])->withInput();

	}

}

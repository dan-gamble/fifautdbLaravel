<?php

class PagesController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function index()
	{
		return View::make('home');
	}
	public function indexPost()
	{
		$keyword = Input::get('keyword');

		$playerBack = Player::where('common_name', 'LIKE', '%'.$keyword.'%')->get();

		return View::make('home', ['playerBack' => $playerBack]);
	}
}

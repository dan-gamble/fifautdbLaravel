<?php

class SquadController extends BaseController {

	public function builder()
	{
		return View::make('squad.builder');
	}

	public function search()
	{
		return View::make('squad.search.search', array('name' => 'Dan'));
	}

	public function searchResults()
	{
		return View::make('squad.search.results');
	}

}

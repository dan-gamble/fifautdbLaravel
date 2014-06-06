<?php

class PlayerController extends BaseController {

	public function index($id)
	{
		$player = Player::findOrFail($id);
        $comments = PlayerComments::where('player_id', '=', $id)->take(5)->get();
		return View::make('player.index', [
            'player'   => $player,
            'comments' => $comments
        ]);
	}

	public function search()
	{
		return View::make('player.search.search');
	}

	public function searchResults()
	{
        $players = Player::orderBy('overall_rating', 'desc')->paginate(36);
        // $players = Player::whereBetween('overall_rating', array($from, $to))->get();
		// $players = Player::orderBy('overall_rating', 'desc')->paginate(24);
		return View::make('player.search.results', ['players' => $players]);
	}

}

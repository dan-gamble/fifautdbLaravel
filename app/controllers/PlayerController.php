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
        $input = array
        (
            'minr' => Input::get('minrating'),
            'maxr' => Input::get('maxrating'),
            'minskill' => Input::get('minskill'),
            'maxskill' => Input::get('maxskill'),
            'minweak' => Input::get('minweak'),
            'maxweak' => Input::get('maxweak'),
            'defrates' => Input::get('defrates'),
            'attrates' => Input::get('attrates'),
            'preffoot' => Input::get('preffoot'),
            'minage' => Input::get('minage'),
            'maxage' => Input::get('maxage'),
            'gk' => Input::get('gk'),
            'rb' => Input::get('rb'),
            'rwb' => Input::get('rwb'),
            'cb' => Input::get('cb'),
            'lb' => Input::get('lb'),
            'lwb' => Input::get('lwb'),
            'rm' => Input::get('rm'),
            'rw' => Input::get('rw'),
            'cdm' => Input::get('cdm'),
            'cm' => Input::get('cm'),
            'cam' => Input::get('cam'),
            'lm' => Input::get('lm'),
            'lw' => Input::get('lw'),
            'cf' => Input::get('cf'),
            'st' => Input::get('st')
        );
        $players = Player::orderBy('overall_rating', 'desc')
            ->whereBetween('overall_rating', array($input['minr'], $input['maxr']))
            // ->whereBetween('skill_moves', array($input['minskill'], $input['maxskill']))
            // ->whereBetween('weak_foot', array($input['minweak'], $input['maxweak']))
//            ->where('def_workrate', $input['defrates'])
//            ->where('att_workrate', $input['attrates'])
            ->paginate(36);
        // $players = Player::whereBetween('overall_rating', array($from, $to))->get();
		// $players = Player::orderBy('overall_rating', 'desc')->paginate(24);
		return View::make('player.search.results', ['players' => $players]);
	}

}

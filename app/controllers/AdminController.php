<?php

class AdminController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		// Create the view and parse variables
        return View::make('admin.index');
	}

	public function totw()
	{
		return View::make('admin.totw');
	}

	public function totwCreate()
	{
		// Define input url
		$url = "https://utas.fut.ea.com/ut/showofflink/" . Input::get('extension');
		$url_headers = @get_headers($url);

		$url_type = Input::get('url');

		// Find which url it should look up
		if ($url_type == 1) {
			$url = "https://utas.fut.ea.com/ut/showofflink/" . Input::get('extension');
		} else {
			$url = "https://utas.s2.fut.ea.com/ut/showofflink/" . Input::get('extension');
		}

		// Define group name for players
		$card_set = "TOTW " . Input::get('totw-name');

		// Connect to CURL (helpers.php)
		curl_connect();

		// Convert url to JSON Arrays
		$json = file_get_contents($url);
		$obj = json_decode($json, true);

		// Loop through all players in JSON
		for ($i = 0; $i <= 22; $i++) {
			if (isset($obj['data']['squad']['0']['players'][$i]['itemData']['attributeList'][0]['value'])) {
				$d = $obj['data']['squad']['0']['players'][$i]['itemData'];
					$d_rating = $d['rating'];
					$d_asset = $d['assetId'];
					$d_pos = $d['preferredPosition'];
					$d_role = role_reversal($d_pos);
					$d_cardType = 2;
					$d_att1 = $d['attributeList'][0]['value'];
					$d_att2 = $d['attributeList'][1]['value'];
					$d_att3 = $d['attributeList'][2]['value'];
					$d_att4 = $d['attributeList'][3]['value'];
					$d_att5 = $d['attributeList'][4]['value'];
					$d_att6 = $d['attributeList'][5]['value'];

				$existing = Player::where('asset_id', '=', $d_asset)->firstOrFail();

				$player = new Player;
				$player->asset_id = $existing->asset_id;
				$player->first_name = $existing->first_name;
				$player->last_name = $existing->last_name;
				$player->common_name = $existing->common_name;
			    $player->overall_rating = $d_rating;
			    $player->card_att1 = $d_att1;
			    $player->card_att2 = $d_att2;
			    $player->card_att3 = $d_att3;
			    $player->card_att4 = $d_att4;
			    $player->card_att5 = $d_att5;
			    $player->card_att6 = $d_att6;
			    $player->card_type = $d_cardType;
			    $player->item_type = $existing->item_type;
			    $player->card_set = strtoupper($card_set);
			    $player->club_id = $existing->club_id;
			    $player->league_id = $existing->league_id;
			    $player->nation_id = $existing->nation_id;
			    $player->shirt_number = $existing->shirt_number;
			    $player->dob = $existing->dob;
			    $player->join_date = $existing->join_date;
			    $player->height = $existing->height;
			    $player->weight = $existing->weight;
			    $player->position = $d_pos;
			    $player->role = $d_role;
			    $player->pref_foot = $existing->pref_foot;
			    $player->weak_foot = $existing->weak_foot;
			    $player->skill_moves = $existing->skill_moves;
			    $player->att_workrate = $existing->att_workrate;
			    $player->def_workrate = $existing->def_workrate;
			    $player->acceleration = $existing->acceleration;
			    $player->sprint_speed = $existing->sprint_speed;
			    $player->agility = $existing->agility;
			    $player->balance = $existing->balance;
			    $player->jumping = $existing->jumping;
			    $player->stamina = $existing->stamina;
			    $player->strength = $existing->strength;
			    $player->reactions = $existing->reactions;
			    $player->aggression = $existing->aggression;
			    $player->interceptions = $existing->interceptions;
			    $player->positioning = $existing->positioning;
			    $player->vision = $existing->vision;
			    $player->ball_control = $existing->ball_control;
			    $player->crossing = $existing->crossing;
			    $player->dribbling = $existing->dribbling;
			    $player->finishing = $existing->finishing;
			    $player->free_kick_accuracy = $existing->free_kick_accuracy;
			    $player->heading_accuracy = $existing->heading_accuracy;
			    $player->long_passing = $existing->long_passing;
			    $player->short_passing = $existing->short_passing;
			    $player->marking = $existing->marking;
			    $player->long_shots = $existing->long_shots;
			    $player->shot_power = $existing->shot_power;
			    $player->standing_tackle = $existing->standing_tackle;
			    $player->sliding_tackle = $existing->sliding_tackle;
			    $player->volleys = $existing->volleys;
			    $player->curve = $existing->curve;
			    $player->penalties = $existing->penalties;
			    $player->gk_diving = $existing->gk_diving;
			    $player->gk_handling = $existing->gk_handling;
			    $player->gk_kicking = $existing->gk_kicking;
			    $player->gk_reflexes = $existing->gk_reflexes;
			    $player->gk_positioning = $existing->gk_positioning;

				$player->save();

				}

			$finish = 'Saved';

		}

		return Redirect::back()->withFlashMessage($card_set . " added!");
	}

	public function totsCreate()
	{
		// Define input url
		$url = "https://utas.fut.ea.com/ut/showofflink/" . Input::get('extension');
		$url_headers = @get_headers($url);

		$url_type = Input::get('url');

		// Find which url it should look up
		if ($url_type == 1) {
			$url = "https://utas.fut.ea.com/ut/showofflink/" . Input::get('extension');
		} else {
			$url = "https://utas.s2.fut.ea.com/ut/showofflink/" . Input::get('extension');
		}

		// Define group name for players
		$card_set = Input::get('tots-name');

		// Connect to CURL (helpers.php)
		curl_connect();

		// Convert url to JSON Arrays
		$json = file_get_contents($url);
		$obj = json_decode($json, true);

		// Loop through all players in JSON
		for ($i = 0; $i <= 22; $i++) {
			if (isset($obj['data']['squad']['0']['players'][$i]['itemData']['attributeList'][0]['value'])) {
				$d = $obj['data']['squad']['0']['players'][$i]['itemData'];
					$d_rating = $d['rating'];
					$d_asset = $d['assetId'];
					$d_pos = $d['preferredPosition'];
					$d_role = role_reversal($d_pos);
					$d_cardType = 2;
					$d_att1 = $d['attributeList'][0]['value'];
					$d_att2 = $d['attributeList'][1]['value'];
					$d_att3 = $d['attributeList'][2]['value'];
					$d_att4 = $d['attributeList'][3]['value'];
					$d_att5 = $d['attributeList'][4]['value'];
					$d_att6 = $d['attributeList'][5]['value'];

				$existing = Player::where('asset_id', '=', $d_asset)->firstOrFail();

				$player = new Player;
				$player->asset_id = $existing->asset_id;
				$player->first_name = $existing->first_name;
				$player->last_name = $existing->last_name;
				$player->common_name = $existing->common_name;
			    $player->overall_rating = $d_rating;
			    $player->card_att1 = $d_att1;
			    $player->card_att2 = $d_att2;
			    $player->card_att3 = $d_att3;
			    $player->card_att4 = $d_att4;
			    $player->card_att5 = $d_att5;
			    $player->card_att6 = $d_att6;
			    $player->card_type = $d_cardType;
			    $player->item_type = $existing->item_type;
			    $player->card_set = strtoupper($card_set);
			    $player->club_id = $existing->club_id;
			    $player->league_id = $existing->league_id;
			    $player->nation_id = $existing->nation_id;
			    $player->shirt_number = $existing->shirt_number;
			    $player->dob = $existing->dob;
			    $player->join_date = $existing->join_date;
			    $player->height = $existing->height;
			    $player->weight = $existing->weight;
			    $player->position = $d_pos;
			    $player->role = $d_role;
			    $player->pref_foot = $existing->pref_foot;
			    $player->weak_foot = $existing->weak_foot;
			    $player->skill_moves = $existing->skill_moves;
			    $player->att_workrate = $existing->att_workrate;
			    $player->def_workrate = $existing->def_workrate;
			    $player->acceleration = $existing->acceleration;
			    $player->sprint_speed = $existing->sprint_speed;
			    $player->agility = $existing->agility;
			    $player->balance = $existing->balance;
			    $player->jumping = $existing->jumping;
			    $player->stamina = $existing->stamina;
			    $player->strength = $existing->strength;
			    $player->reactions = $existing->reactions;
			    $player->aggression = $existing->aggression;
			    $player->interceptions = $existing->interceptions;
			    $player->positioning = $existing->positioning;
			    $player->vision = $existing->vision;
			    $player->ball_control = $existing->ball_control;
			    $player->crossing = $existing->crossing;
			    $player->dribbling = $existing->dribbling;
			    $player->finishing = $existing->finishing;
			    $player->free_kick_accuracy = $existing->free_kick_accuracy;
			    $player->heading_accuracy = $existing->heading_accuracy;
			    $player->long_passing = $existing->long_passing;
			    $player->short_passing = $existing->short_passing;
			    $player->marking = $existing->marking;
			    $player->long_shots = $existing->long_shots;
			    $player->shot_power = $existing->shot_power;
			    $player->standing_tackle = $existing->standing_tackle;
			    $player->sliding_tackle = $existing->sliding_tackle;
			    $player->volleys = $existing->volleys;
			    $player->curve = $existing->curve;
			    $player->penalties = $existing->penalties;
			    $player->gk_diving = $existing->gk_diving;
			    $player->gk_handling = $existing->gk_handling;
			    $player->gk_kicking = $existing->gk_kicking;
			    $player->gk_reflexes = $existing->gk_reflexes;
			    $player->gk_positioning = $existing->gk_positioning;

				$player->save();

				}

			$finish = 'Saved';

		}

		return Redirect::back()->withFlashMessage($card_set . " added!");
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}

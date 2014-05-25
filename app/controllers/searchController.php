<?php

class SearchController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */

    public function searchPlayer()
    {
        // Get the name that was input
        $keyword = Input::get('global_search');

        // Return the list of clubs ordered by alphabetical order
        $clubs = Club::orderBy('club_name', 'asc')->where('club_name', 'LIKE', '%'.$keyword.'%')->paginate(28);
        $clubsSize = Club::where('club_name', 'LIKE', '%'.$keyword.'%')->count();

        // Return the list of leagues ordered by alphabetical order
        $leagues = League::orderBy('league_name', 'asc')->where('league_name', 'LIKE', '%'.$keyword.'%')->paginate(28);
        $leaguesSize = League::where('league_name', 'LIKE', '%'.$keyword.'%')->count();

        // Return the list of nations ordered by alphabetical order
        $nations = Nation::orderBy('nation_name', 'asc')->where('nation_name', 'LIKE', '%'.$keyword.'%')->paginate(28);
        $nationsSize = Nation::where('nation_name', 'LIKE', '%'.$keyword.'%')->count();

        // Return the list of players ordered by rating
        $players = Player::orderBy('overall_rating', 'desc')->where('common_name', 'LIKE', '%'.$keyword.'%')->get();
        $playersSize = Player::where('common_name', 'LIKE', '%'.$keyword.'%')->count();

        // Create the view and parse the player list
        return View::make('player.search.name',
        [
            'keyword'     => $keyword,
            'clubs'       => $clubs,
            'clubsSize'   => $clubsSize,
            'leagues'     => $leagues,
            'leaguesSize' => $leaguesSize,
            'nations'     => $nations,
            'nationsSize' => $nationsSize,
            'players'     => $players,
            'playersSize' => $playersSize
        ]);
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

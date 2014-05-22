<?php

class LeagueController extends \BaseController {

    public function index($id)
    {
        // Initialize the page
        $league = League::where('asset_id', '=', $id)->firstOrFail();

        // Create the clubs list
        $clubs = Club::orderBy('club_name_abbr15', 'asc')->where('league_id', '=', $id)->get();
        $players = Player::orderBy('overall_rating', 'desc')->where('league_id', '=', $id)->paginate(36);

        // Create the view and parse the variables
        return View::make('league.index', [
            'league' => $league,
            'clubs' => $clubs,
            'players' => $players
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
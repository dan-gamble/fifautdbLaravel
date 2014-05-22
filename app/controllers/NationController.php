<?php

class NationController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
    public function index($id)
    {
    	// Initialize the page
        $nation = Nation::where('asset_id', '=', $id)->firstOrFail();

        // Get the leagues
    	$leagues = League::orderBy('league_name_abbr5', 'asc')->where('nation_id', '=', $id)->get();

    	// Get the players
        $players = Player::orderBy('overall_rating', 'desc')->where('nation_id', '=', $id)->paginate(24);

        // Make the view
        return View::make('nation.index', [
            'nation' => $nation,
            'leagues' => $leagues,
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

<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

# Register
Route::get('/register', 'RegistrationController@create')->before('guest');
Route::post('/register',
    [
        'as'   => 'registration.store',
        'uses' => 'RegistrationController@store'
    ]);

# Authentication
Route::get('login',
    [
        'as'   => 'login',
        'uses' => 'SessionsController@create'
    ]);
Route::get('logout',
    [
        'as'   => 'logout',
        'uses' => 'SessionsController@destroy'
    ]);
Route::resource('sessions', 'SessionsController',
    [
        'only' =>
            [
                'create',
                'store',
                'destroy'
            ]
    ]);

Route::get('/',
    [
        'as'   => 'home',
        'uses' => 'PagesController@index'
    ]);
Route::post('/', 'PagesController@indexPost');

// Admin Routes
Route::get('admin',
    [
        'as'   => 'admin',
        'uses' => 'AdminController@index'
    ]);
    // Create TOTW
    Route::get('admin/totw',
        [
            'as'   =>'admin.totw',
            'uses' => 'AdminController@totw'
        ]);
    Route::post('admin/totw', 'AdminController@totwCreate');
    // Create Player
    Route::get('admin/player',
        [
            'as'   => 'admin.player',
            'uses' => 'AdminController@player'
        ]);
        // Show list of existing players to create from
        Route::post('admin/player/find', 'AdminController@playerFind');
            // Create player based on existing
            Route::get('admin/player/existing/{player_id}',
                [
                    'as'   => 'admin.player.existing',
                    'uses' => 'AdminController@playerExisting'
                ]);
        // Create fresh Player
        Route::get('admin/player/fresh',
            [
                'as'   => 'admin.player.fresh',
                'uses' => 'AdminController@playerFresh'
            ]);
    Route::post('admin/player', 'AdminController@playerExistingCreate');

// Club Routes
Route::get('club/{club_id}/{club_name}', 'ClubController@index')->where('club_id', '\d+');

// League Routes
Route::get('league/{league_id}/{league_name}', 'LeagueController@index')->where('league_id', '\d+');

// Nation Routes
Route::get('nation/{nation_id}/{nation_name}', 'NationController@index')->where('nation_id', '\d+');

// Player Routes
Route::get('player/{player_id}/{player_first_name}', 'PlayerController@index')->where('player_id', '\d+');
Route::post('comment/create/player/{player_id}',
    [
        'as'   => 'player.commentStore',
        'uses' => 'PlayerCommentsController@store'
    ]);
Route::get('player/search', 'PlayerController@search');
Route::get('player/search/results',
    [
        'as'   => 'playersearch.results',
        'uses' => 'PlayerController@searchResults'
    ]);

// Search Routes

Route::get('search/player',
    [
        'as' => 'search.global.player',
        'uses' => 'SearchController@searchPlayer'
    ]);

// Squad Routes
Route::get('squad/builder', 'SquadController@builder');
Route::get('squad/search', 'SquadController@search');
Route::get('squad/search/results', 'SquadController@searchResults');

Route::get('users', function()
{
    $users = User::all();

    return View::make('users')->with('users', $users);
});

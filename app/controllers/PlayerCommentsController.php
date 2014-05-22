<?php

use Acme\Forms\CommentForm;

class PlayerCommentsController extends \BaseController {

    private $commentForm;

    function __construct(CommentForm $commentForm)
    {
        $this->commentForm = $commentForm;
    }

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
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
	public function store($id)
	{
        $input = Input::only('comment');

        $this->commentForm->validate($input);

        $insert = DB::table('player_comments')->insertGetId(
            array
            (
                'player_id'         => $id,
                'user_id'           => Auth::user()->id,
                'comment_parent_id' => null,
                'comment'           => $input['comment'],
            )
        );

//        $comment = PlayerComments::create($input);
//
//        $comment = new PlayerComments;
//
//        $comment->player_id = $id;
//        $comment->user_id = Auth::user()->id;
//        $comment->comment = $input;
//        $comment->created_at = setCreatedAt();
//        $comment->update_at = setUpdatedAt();
//
//        $comment->save();

        return Redirect::back();
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
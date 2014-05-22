<?php

class Club extends \Eloquent {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'club_data_14';

    public function club()
    {
        return $this->hasOne('League', 'asset_id', 'club_id');
    }

    public function league()
    {
        return $this->hasOne('League', 'asset_id', 'league_id');
    }

    public function players()
    {
        return $this->hasMany('Player');
    }

    function player_count()
    {
        return sizeof(Player::where('club_id', '=', $this->asset_id)->get());
    }

    function if_count()
    {
        return sizeof(Player::where('club_id', '=', $this->asset_id)->where('card_type', '>=', 2)->get());
    }

    function gold_count()
    {
        return sizeof(Player::where('club_id', '=', $this->asset_id)->whereBetween('overall_rating', array('75', '99'))->where('card_type', '<=', 1)->get());
    }

    function silver_count()
    {
        return sizeof(Player::where('club_id', '=', $this->asset_id)->whereBetween('overall_rating', array('65', '74'))->where('card_type', '<=', 1)->get());
    }

    function bronze_count()
    {
        return sizeof(Player::where('club_id', '=', $this->asset_id)->whereBetween('overall_rating', array('1', '64'))->where('card_type', '<=', 1)->get());
    }

    function average_rating()
    {
        $total = Player::where('club_id', '=', $this->asset_id)->sum('overall_rating');
        $average = $total / $this->player_count();

        return round($average);
    }

    function highest_rating()
    {
        return Player::where('club_id', '=', $this->asset_id)->max('overall_rating');
    }

    function highest_player()
    {
        $player = Player::orderBy('overall_rating', 'desc')->where('club_id', '=', $this->asset_id)->firstOrFail();
        $url = $player->url_str();
        return '(<a href="'. $url . '">' . $player->last_name . '</a>)';
    }

    function lowest_player()
    {
        $player = Player::orderBy('overall_rating', 'asc')->where('club_id', '=', $this->asset_id)->firstOrFail();
        $url = $player->url_str();
        return '(<a href="'. $url . '">' . $player->last_name . '</a>)';
    }

    function lowest_rating()
    {
        return Player::where('club_id', '=', $this->asset_id)->min('overall_rating');
    }

    function url_str()
    {
        $id = $this->asset_id;

        $name = space_to_dash($this->club_name);

        return '/club/'.$id.'/'.$name;
    }

	protected $fillable = [];
}

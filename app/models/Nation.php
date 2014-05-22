<?php

class Nation extends \Eloquent {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'nation_data_14';

    public function clubs()
    {
        return $this->hasMany('Club');
    }

    public function leagues()
    {
        return $this->hasMany('League');
    }

    public function players()
    {
        return $this->hasMany('Player');
    }

    function player_count()
    {
        return sizeof(Player::where('nation_id', '=', $this->asset_id)->get());
    }

    function if_count()
    {
        return sizeof(Player::where('nation_id', '=', $this->asset_id)->where('card_type', '>=', 2)->get());
    }

    function gold_count()
    {
        return sizeof(Player::where('nation_id', '=', $this->asset_id)->whereBetween('overall_rating', array('75', '99'))->where('card_type', '<=', 1)->get());
    }

    function silver_count()
    {
        return sizeof(Player::where('nation_id', '=', $this->asset_id)->whereBetween('overall_rating', array('65', '74'))->where('card_type', '<=', 1)->get());
    }

    function bronze_count()
    {
        return sizeof(Player::where('nation_id', '=', $this->asset_id)->whereBetween('overall_rating', array('1', '64'))->where('card_type', '<=', 1)->get());
    }

    function average_rating()
    {
        $total = Player::where('nation_id', '=', $this->asset_id)->sum('overall_rating');
        $average = $total / $this->player_count();

        return round($average);
    }

    function highest_rating()
    {
        return Player::where('nation_id', '=', $this->asset_id)->max('overall_rating');
    }

    function highest_player()
    {
        $player = Player::orderBy('overall_rating', 'desc')->where('nation_id', '=', $this->asset_id)->firstOrFail();
        $url = $player->url_str();
        return '(<a href="'. $url . '">' . $player->last_name . '</a>)';
    }

    function lowest_player()
    {
        $player = Player::orderBy('overall_rating', 'asc')->where('nation_id', '=', $this->asset_id)->firstOrFail();
        $url = $player->url_str();
        return '(<a href="'. $url . '">' . $player->last_name . '</a>)';
    }

    function lowest_rating()
    {
        return Player::where('nation_id', '=', $this->asset_id)->min('overall_rating');
    }

    function league_count()
    {
        return sizeof(League::where('nation_id', '=', $this->asset_id)->get());
    }

    function url_str()
    {
        $id = $this->asset_id;

        $name = space_to_dash($this->nation_name);

        return '/nation/'.$id.'/'.$name;
    }

	protected $fillable = [];
}

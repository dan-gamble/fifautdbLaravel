<?php

class Player extends Eloquent {
	public $table = 'player_data_14';
    public $timestamps = true;

    public function comments()
    {
        return $this->hasMany('PlayerComments');
    }

    public function club()
    {
        return $this->hasOne('Club', 'asset_id', 'club_id');
    }

    public function league()
    {
        return $this->hasOne('League', 'asset_id', 'league_id');
    }

    public function nation()
    {
        return $this->hasOne('Nation', 'asset_id', 'nation_id');
    }

    public function attr_profile($label)
    {
        $attr = space_to_underscore($label);
        if ($this->$attr >= 90) {
            echo '<li>'.$label.'<span class="pull-right label label-highest">'.$this->$attr.'</span></li>';
        } elseif ($this->$attr < 90 && $this->$attr >= 80) {
            echo '<li>'.$label.'<span class="pull-right label label-high">'.$this->$attr.'</span></li>';
        } elseif ($this->$attr < 80 && $this->$attr >= 65) {
            echo '<li>'.$label.'<span class="pull-right label label-normal">'.$this->$attr.'</span></li>';
        } elseif ($this->$attr < 65 && $this->$attr >= 65) {
            echo '<li>'.$label.'<span class="pull-right label label-low">'.$this->$attr.'</span></li>';
        } else {
            echo '<li>'.$label.'<span class="pull-right label label-lowest">'.$this->$attr.'</span></li>';
        }
    }

    public function attr_admin($label, $secondary = [])
    {
        $attr = space_to_underscore($label);
        if ($secondary != null) {
            $output = '<li>'.$label.' ('.$secondary.')'.Form::text($attr, $this->$attr, ['class' => 'existing-player-input']).'</li>';
        } else {
            $output = '<li>'.$label.Form::text($attr, $this->$attr, ['class' => 'existing-player-input']).'</li>';
        }

        return $output;
    }

    public function card_name()
    {
        $myString = $this->common_name;
        $words = explode(' ', $myString);
        $lastWord = array_pop($words);

        return $lastWord;
    }

    public function card_colour()
    {
        if ($this->card_type == 12) {
            $card_type = 'player-card-legend';
        } elseif ($this->card_type == 5) {
            $card_type = 'player-card-motm';
        } elseif ($this->overall_rating > 74 && $this->card_type == 3) {
            $card_type = 'player-card-gold-tots';
        } elseif ($this->overall_rating > 74 && $this->card_type == 2) {
            $card_type = 'player-card-gold-if';
        } elseif ($this->overall_rating > 74 && $this->card_type == 1) {
            $card_type = 'player-card-gold-rare';
        } elseif ($this->overall_rating > 74 && $this->card_type == 0) {
            $card_type = 'player-card-gold-nonrare';
        } elseif ($this->overall_rating >= 65 && $this->overall_rating <= 74 && $this->card_type == 3) {
            $card_type = 'player-card-silver-tots';
        } elseif ($this->overall_rating >= 65 && $this->overall_rating <= 74 && $this->card_type == 2) {
            $card_type = 'player-card-silver-if';
        } elseif ($this->overall_rating >= 65 && $this->overall_rating <= 74 && $this->card_type == 1) {
            $card_type = 'player-card-silver-rare';
        } elseif ($this->overall_rating >= 65 && $this->overall_rating <= 74 && $this->card_type == 0) {
            $card_type = 'player-card-silver-nonrare';
        } elseif ($this->overall_rating < 65 && $this->card_type == 3) {
            $card_type = 'player-card-bronze-tots';
        } elseif ($this->overall_rating < 65 && $this->card_type == 2) {
            $card_type = 'player-card-bronze-if';
        } elseif ($this->overall_rating < 65 && $this->card_type == 1) {
            $card_type = 'player-card-bronze-rare';
        } else {
            $card_type = 'player-card-bronze-nonrare';
        }
        return $card_type;
    }

    public function pref_foot()
    {
        $foot = $this->pref_foot;
        if ($foot == 1) {
            $foot = 'Right';
        } else {
            $foot = 'Left';
        }
        return $foot;
    }

    public function role()
    {
        $role = $this->role;
        if ($role == '27') {
            $role = 'LW';
        } elseif ($role == '25') {
            $role = 'ST';
        } elseif ($role == '23') {
            $role = 'RW';
        } elseif ($role == '21') {
            $role = 'CF';
        } elseif ($role == '18') {
            $role = 'CAM';
        } elseif ($role == '16') {
            $role = 'LM';
        } elseif ($role == '14') {
            $role = 'CM';
        } elseif ($role == '12') {
            $role = 'RM';
        } elseif ($role == '10') {
            $role = 'CDM';
        } elseif ($role == '8') {
            $role = 'LWB';
        } elseif ($role == '7') {
            $role = 'LB';
        } elseif ($role == '5') {
            $role = 'CB';
        } elseif ($role == '3') {
            $role = 'RB';
        } elseif ($role == '2') {
            $role = 'RWB';
        } else {
            $role = 'GK';
        }
        return $role;
    }

    #Workrates

    public function att_workrate()
    {
        $workrate = $this->att_workrate;
        if ($workrate == '0') {
            $workrate = 'Medium';
        } elseif ($workrate == '1') {
            $workrate = 'Low';
        } else {
            $workrate = 'High';
        }
        return $workrate;
    }

    public function def_workrate()
    {
        $workrate = $this->def_workrate;
        if ($workrate == '0') {
            $workrate = 'Medium';
        } elseif ($workrate == '1') {
            $workrate = 'Low';
        } else {
            $workrate = 'High';
        }
        return $workrate;
    }

    function url_str()
    {
        $id = $this->id;

        $name = space_to_dash($this->common_name);

        return '/player/'.$id.'/'.$name;
    }
}

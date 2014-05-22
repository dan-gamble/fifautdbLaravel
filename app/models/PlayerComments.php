<?php

class PlayerComments extends Eloquent {
    protected $table = 'player_comments';

    protected $fillable = [
        'comment'
    ];

    public function dateTime()
    {
        $datetime = date('jS M Y - g:i A', strtotime($this->created_at));

        return $datetime;
    }

    public function user()
    {
        return $this->belongsTo('User');
    }
}
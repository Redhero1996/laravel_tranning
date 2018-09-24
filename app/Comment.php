<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
	protected $guarded = ['id'];

    public function ticket()
    {
    	return $this->belongsTo(Ticket::class);
    }

    public function post()
    {
    	return $this->morphTo();
    }
}

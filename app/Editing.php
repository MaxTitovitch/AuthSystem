<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Editing extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['user_id', 'application_id'];

    public function user() {
    	return $this->belongsTo('App\User');
  	}

  	public function application() {
    	return $this->belongsTo('App\Application');
  	}
}

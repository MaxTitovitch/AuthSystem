<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['username', 'email', 'phone', 'text'];

    public function appeals_changes () {
    	return $this->hasMany('App\Editing');
  	}
}

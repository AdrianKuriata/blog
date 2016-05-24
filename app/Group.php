<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
	protected $fillable = ['group_name', 'group_color'];

    public function user()
    {
    	return $this->hasMany('App\User');
    }
}

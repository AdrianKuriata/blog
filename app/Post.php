<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
	protected $fillable = [
	'name',
	'email',
	'body',
	'is_moderated',
	'ip_user',
	'country_user',
	'city_user',
	'browser_user',
	'latitude_user',
	'longitude_user',
	'checked_post'
	];
	
    public function article()
    {
    	return $this->belongsTo('App\Article');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = ['article_title', 'article_body', 'article_lock'];

    public function user()
    {
    	return $this->belongsTo('App\User');
    }

    public function tag()
    {
    	return $this->belongsToMany('App\Tag');
    }

    public function post()
    {
    	return $this->hasMany('App\Post');
    }
}

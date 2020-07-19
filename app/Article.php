<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = ['title', 'content', 'user_id'];

    public function tags(){

    	return $this->belongsToMany('App\Tag', 'article_tag', 'article_id', 'tag_id');

    }

    public function user(){

    	return $this->belongsTo('App\User');

    }

    public function responses(){
    	return $this->hasMany('App\Response');
    }
    
}

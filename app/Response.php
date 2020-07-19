<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Response extends Model
{
    protected $fillable = ['response', 'user_id', 'article_id'];

    public function article(){
    	return $this->belongsTo('App\Article');
    }

    public function user(){
    	return $this->belongsTo('App\User');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    public function category()//ekhane category just ekta function er name. jekuno name/variable dile e hobe,
    //jokon value tule anbo thokon ai name(category) ta use korte hobe.
    {

    	return $this->belongsTo('App\Category');//ekta post jekuno category te jete parbe ba ekta post er jekuno category thakbe ta bole dilam.
    	 //return $this->hasOne('App\Phone');
    }

    public function tags()
    {
        return $this->belongsToMany('App\Tag');
    }
    public function comments()
    {
    	return $this->hasMany('App\Comment');
    }

}

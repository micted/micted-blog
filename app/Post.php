<?php

namespace App;

use Session;



use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'title', 'content', 'category_id', 'featured', 'slug'
    ]; 

    public function getFeaturedAttribute($featured) //when we get the data from the db

    {
        return asset($featured);//generate link for that image in our application
    }

    protected $dates = ['deleted_at'];

    public function category() 
    {
        return $this->belongsTo('App\Category');//post to only category

    }

    public function tags() {// this post belongs to many tags

        return $this->belongsToMany('App\Tag');
    }
}

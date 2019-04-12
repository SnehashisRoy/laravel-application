<?php

namespace App\Models;


use App\Models\BlogMedia;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Blog extends Model
{
    use SoftDeletes;

    protected $table = 'blogs';
    protected $dates = ['deleted_at', 'created_at', 'updated_at'];


    public function categories(){

    	return $this->belongsToMany('App\Models\BlogCategory', 'blog_category_pivot', 'blog_id', 'category_id');
    }

    public function media(){
    	return $this->hasMany('App\Models\BlogMedia', 'blog_id');
    }

    public function author(){

        return $this->belongsTo('App\Models\BlogAuthor', 'author_id');
    }

    public function featured_medium(){
        return $this->hasOne('App\Models\BlogMedia', 'featured_blog');
    }


    public function getPostDateAttribute()
    {
    	return date('j M Y', strtotime($this->blog_created_at));
    }

    public function getPostIntroAttribute(){

    	return substr(strip_tags($this->excerpt), 0 , 200 ).' ' ;
    }

    public function getFirstImageAttribute(){

         $media = $this->media()->first();
         if($media){

         	return $media->image_url;

         }

         return false;

    }

    public function getSimilarBlogsAttribute(){

        return $this->categories()->first()->blogs;

    }


}

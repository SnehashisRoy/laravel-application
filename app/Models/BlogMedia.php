<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BlogMedia extends Model
{
    use SoftDeletes;

    protected $table = 'blog_media';
    protected $dates = ['deleted_at', 'created_at', 'updated_at'];


    public function blog(){
        return $this->belongsTo('App\Models\Blog', 'blog_id');
    }

    public function featured_blog(){
    	return $this->belongsTo('App\Models\blog', 'featured_blog');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BlogAuthor extends Model
{
    use SoftDeletes;

    protected $table = 'blog_authors';
    protected $dates = ['deleted_at', 'created_at', 'updated_at'];


    public function blogs(){
        return $this->hasMany('App\Models\Blog', 'author_id');
    }
}

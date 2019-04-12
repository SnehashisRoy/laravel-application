<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BlogCategory extends Model
{
    use SoftDeletes;

    protected $table = 'blog_categories';
    protected $dates = ['deleted_at', 'created_at', 'updated_at'];


    public function blogs()
    {
       return $this->belongsToMany('App\Models\Blog', 'blog_category_pivot', 'category_id', 'blog_id');
    }
}

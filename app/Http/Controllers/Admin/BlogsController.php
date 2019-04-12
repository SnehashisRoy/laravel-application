<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Blog;

class BlogsController extends Controller
{
    public function blogs(){
    	return view('admin.blogs.index');
    }

    public function blog($slug){

    	$blog= Blog::where('slug', $slug)->first();

    	return view('admin.blogs.blog', [
    			'blog' => $blog
    	]);

    }
}

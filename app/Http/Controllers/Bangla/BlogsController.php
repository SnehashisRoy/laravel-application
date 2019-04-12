<?php

namespace App\Http\Controllers\Bangla;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\BlogCategory;

class BlogsController extends Controller
{
    public function index($cat_id = null){

    	
    	$cats = BlogCategory::all();

    	if($cat_id){ 

    		$cat = BlogCategory::findOrFail($cat_id);

    		if($cat){
    			$blogs = $cat->blogs;
    		}



    	}else{
    		$blogs = Blog::paginate(10);
    	}


    	return view('bangla.blogs',[
    		'cats' => $cats,
    		'blogs'=> $blogs
    	]);
    }

    public function blog($slug){

    	$blog= Blog::where('slug', $slug)->first();

    	return view('bangla.blog', [
    			'blog' => $blog
    	]);

    }
}

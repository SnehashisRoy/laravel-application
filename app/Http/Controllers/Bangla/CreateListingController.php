<?php

namespace App\Http\Controllers\Bangla;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\BlogCategory;

class CreateListingController extends Controller
{
    public function create(){

        return view('bangla.create-listing');

    }

    public function postCreate(Request $r){

        dd($r);

        return view('bangla.create-listing');

    }
}

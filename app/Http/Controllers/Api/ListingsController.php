<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\House;

class ListingsController extends Controller
{
    public function getListings(){
        $listings = House::all();

        return  response()->json(['success' => true, 'data' => $listings]);
    }
}
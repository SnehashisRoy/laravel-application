<?php

namespace App\Http\Controllers\Bangla;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Company;

class CompanyController extends Controller
{
    public function businessesByCategory($category){

    	$companies = Company::where('slug', $category)
    				 ->inRandomOrder()
    	             ->paginate(10);

    	return view('bangla.companies', [
    		'companies' => $companies,
    		'title' => @Company::where('slug', $category)->first()->slug
    	]);
    }
}

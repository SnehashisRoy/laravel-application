<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Company;
use Validator;

class BusinessesController extends Controller
{
    public function index(){

    	$companies = Company::orderBy('company')->paginate(20);

    	return view('admin.businesses.index', [

    		'companies' => $companies

    	]);
    }

    public function create(){

    	$companies= Company::all()->unique('slug');

    	return view('admin.businesses.create', [
    		'companies' => $companies
    	]);

    }

    public function postCreate(Request $r){

    	 $validator = Validator::make($r->all(), [
    	             'company' => 'required',
    	             'service' => 'required',
    	             'contact' => 'required',
    	         ]);
    	 
    	         if ($validator->fails()) {
    	             return redirect()->back()
    	                         ->withErrors($validator)
    	                         ->withInput();
    	         }
    	 $company = new Company;

    	 $company->company = $r->company;
    	 $company->service = $r->service;
         $company->contact = $r->contact;
    	 $company->description = $r->description;
    	 $company->slug = $r->category;

    	 $company->save();

    	 return redirect('admin/dashboard/businesses')->with('status', 'A business has been added to the category of '. $company->slug );


    }

    public function edit($id){

    	$business = Company::findOrFail($id);

    	$companies= Company::all()->unique('slug');

    	return view('admin.businesses.edit', [

    		'companies' => $companies,
    		'business' => $business


    	]); 

    }

    public function postEdit(Request $r, $id){

    	$validator = Validator::make($r->all(), [
    	             'company' => 'required',
    	             'service' => 'required',
    	             'contact' => 'required',
    	         ]);
    	 
    	         if ($validator->fails()) {
    	             return redirect()->back()
    	                         ->withErrors($validator)
    	                         ->withInput();
    	         }
    	$company = Company::find($id);

    	 $company->company = $r->company;
    	 $company->service = $r->service;
         $company->contact = $r->contact;
    	 $company->description = $r->description;
    	 $company->slug = $r->category;

    	 $company->save();

    	 return redirect()->back()->with('status', 'A business has been updated');



    }
}

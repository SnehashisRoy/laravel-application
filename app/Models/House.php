<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

class House extends Model
{
    use SoftDeletes;

    protected $table = 'houses';
    protected $dates = ['deleted_at', 'created_at', 'updated_at'];
    protected $guarded = ['id'];

    public function images(){

    	return $this->hasMany('App\Models\Image', 'house_id');
    }

    public function getIsOldAttribute(){
        
        return  Carbon::now()->diffInDays($this->created_at) > 15 ;

    }

    public function getTimePassedAttribute(){

    	return $this->created_at->diffForHumans(Carbon::now());
    }

    public function getListingUrlAttribute(){
        
        return 'http://banglatoronto.ca/listing/'.$this->id;
    }
	
	
}
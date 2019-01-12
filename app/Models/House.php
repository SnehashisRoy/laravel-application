<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class House extends Model
{
    use SoftDeletes;

    protected $table = 'houses';
    protected $dates = ['deleted_at', 'created_at', 'updated_at'];
    protected $guarded = ['id'];

    public function images(){

    	return $this->hasMany('App\Models\Image', 'house_id');
    }
	
	
}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Role extends Model
{
    use SoftDeletes;

    protected $table = 'roles';
    protected $dates = ['deleted_at', 'created_at', 'updated_at'];


    // relationships

    public function users(){
        return $this->belongsToMany('App\Models\User', 'role_user', 'role_id', 'user_id');
    }
	
	
}
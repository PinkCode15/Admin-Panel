<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    Protected $fillable = ['name', 'email', 'website','logo'];
    
    public function employee(){
        return $this ->hasMany('App\Employee');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    Protected $fillable = ['firstname','lastname', 'email', 'phone','companyId'];

    public function company(){
        return $this ->belongsTo('App\Company');
    }
}

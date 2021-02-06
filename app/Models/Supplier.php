<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected $fillable=[
    	'company_name','contacnt_name','city','country','phone','fax'
    ];


    public function products()
    {
    	return	$this->hasMany('App\Models\Product');
    }
}

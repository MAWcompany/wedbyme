<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\URL;

class Company extends Model
{
    use HasFactory;

    function halls(){
        return $this->hasMany(Hall::class,"company_id","id");
    }

    function getLogoAttribute($value){
        return URL::to("public/".$value);
    }
}

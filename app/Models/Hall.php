<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\URL;

class Hall extends Model
{
    use HasFactory;

    function calendar(){
        return $this->hasMany(Calendar::class,"hall_id","id");
    }

    function getTypesAttribute($value){
        return json_decode($value,true);
    }

    function setTypesAttribute($arr){
        $this->attributes['types'] = json_encode($arr,256);
    }

    function getImagesAttribute($value){
        return collect(json_decode($value,true))->map(function ($image){
            return URL::to("public/images/".$image);
        });
    }

    function setImagesAttribute($arr){
        $this->attributes['images'] = json_encode($arr,256);
    }

    function getGuestCountAttribute($value){
        return json_decode($value,true);
    }

    function setGuestCountAttribute($arr){
        $this->attributes['guest_count'] = json_encode($arr,256);
    }

    function getPriceAttribute($value){
        return json_decode($value,true);
    }

    function setPriceAttribute($arr){
        $this->attributes['price'] = json_encode($arr,256);
    }

    function getCoordsAttribute($value){
        return json_decode($value,true);
    }

    function setCoordsAttribute($arr){
        $this->attributes['coords'] = json_encode($arr,256);
    }

    function getPhonesAttribute($value){
        return json_decode($value,true);
    }

    function setPhonesAttribute($arr){
        $this->attributes['phones'] = json_encode($arr,256);
    }

    function getAttributesAttribute($value){
        return json_decode($value,true);
    }

    function setAttributesAttribute($arr){
        $this->attributes['attributes'] = json_encode($arr,256);
    }

}

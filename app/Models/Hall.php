<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\URL;

/**
 * App\Models\Hall
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Calendar[] $calendar
 * @property-read int|null $calendar_count
 * @property mixed $attributes
 * @property mixed $coords
 * @property mixed $guest_count
 * @property mixed $images
 * @property mixed $phones
 * @property mixed $price
 * @property mixed $types
 * @method static \Database\Factories\HallFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Hall newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Hall newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Hall query()
 * @mixin \Eloquent
 */
class Hall extends Model
{
    use HasFactory;

    protected $fillable = [
        "user_id",
        "types",
        "images",
        "guest_count_min",
        "guest_count_max",
        "price_min",
        "price_max",
        "coords",
        "phones",
        "attributes",
        "address",
        "review",
        "region",
        "calendar_id",
    ];

    function calendar(){
        return $this->hasOne(Calendar::class,"id","calendar_id")->with("days");
    }

    function getTypesAttribute($value){
        $out = [];
        $types = json_decode($value,true);
        foreach ($types as $type){
            $out[] = HallTypes::query()->where('id',$type)->firstOrFail();
        }
        return $out;
    }

    function setTypesAttribute($arr){
        $arr = collect($arr)->map(function ($item){
            return intval($item);
        });
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

    function getCoordsAttribute($value){
        return json_decode($value,true);
    }

    function setCoordsAttribute($arr){
        $arr = collect($arr)->map(function ($item){
            return intval($item);
        });
        $this->attributes['coords'] = json_encode($arr,256);
    }

    function getPhonesAttribute($value){
        return json_decode($value,true);
    }

    function setPhonesAttribute($arr){
        $this->attributes['phones'] = json_encode($arr,256);
    }

    function getAttributesAttribute($value){
        $out = [];
        $attributes = json_decode($value,true);
        foreach ($attributes as $attribute){
            $out[] = HallAttribute::query()->where('id',$attribute)->firstOrFail();
        }
        return $out;
    }

    function setAttributesAttribute($arr){
        $arr = collect($arr)->map(function ($item){
            return intval($item);
        });
        $this->attributes['attributes'] = json_encode($arr,256);
    }

}

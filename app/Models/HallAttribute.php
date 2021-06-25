<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\HallAttribute
 *
 * @method static \Illuminate\Database\Eloquent\Builder|HallAttribute newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|HallAttribute newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|HallAttribute query()
 * @mixin \Eloquent
 */
class HallAttribute extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = [
        'title'
    ];
}

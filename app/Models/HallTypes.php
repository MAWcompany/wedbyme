<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\HallTypes
 *
 * @method static \Illuminate\Database\Eloquent\Builder|HallTypes newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|HallTypes newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|HallTypes query()
 * @mixin \Eloquent
 */
class HallTypes extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = [
        'title'
    ];
}

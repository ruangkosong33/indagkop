<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Commodity extends Model
{
    use HasFactory, Sluggable;

    protected $table='commoditys';

    protected $fillable=['item', 'slug', 'image', 'description', 'price'];

    protected $hidden=[];

    //SLUG
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'item',
            ]
        ];
    }
}

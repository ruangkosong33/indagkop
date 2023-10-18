<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Infographic extends Model
{
    use HasFactory, Sluggable;

    protected $table='infographics';

    protected $fillable=['title_infographic', 'slug', 'description', 'image'];

    protected $hidden=[];

    //SLUG
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title_infographic',
            ]
        ];
    }
}

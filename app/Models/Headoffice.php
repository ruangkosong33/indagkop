<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Headoffice extends Model
{
    use HasFactory, Sluggable;

    protected $table='headoffices';

    protected $fillable=['name_head', 'slug', 'image_head', 'position', 'periode'];

    protected $hidden=[];


    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name_head'
            ]
        ];
    }
}

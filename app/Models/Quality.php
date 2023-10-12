<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Quality extends Model
{
    use HasFactory, Sluggable;

    protected $table='qualitys';

    protected $fillable=['title_quality', 'slug', 'description'];

    protected $hidden=[];

    //SLUG
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title_quality',
            ]
        ];
    }
}

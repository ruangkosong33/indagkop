<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Renstra extends Model
{
    use HasFactory, Sluggable;

    protected $table='renstras';

    protected $fillable=['title_renstra', 'slug', 'year'];

    protected $hidden=[];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title_renstra',
            ]
        ];
    }
}

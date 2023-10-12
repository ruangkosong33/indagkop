<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Iku extends Model
{
    use HasFactory, Sluggable;

    protected $table='ikus';

    protected $fillable=['title_iku', 'slug', 'year'];

    protected $hidden=[];

    //SLUG
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title_iku',
            ]
        ];
    }
}

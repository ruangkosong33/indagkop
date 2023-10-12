<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Vision extends Model
{
    use HasFactory, Sluggable;

    protected $table='visions';

    protected $fillable=['title_vision', 'slug', 'description'];

    protected $hidden=[];

    //SLUG
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title_vision'
            ]
        ];
    }
}

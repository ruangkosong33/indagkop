<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Historical extends Model
{
    use HasFactory, Sluggable;

    protected $table='historicals';

    protected $fillable=['title_historical', 'slug', 'description'];

    protected $hidden=[];

    //SLUG
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title_historical'
            ]
        ];
    }
}

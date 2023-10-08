<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Perform extends Model
{
    use HasFactory, Sluggable;

    protected $table='performs';

    protected $fillable=['title_perform', 'slug', 'year'];

    protected $hidden=[];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title_perform',
            ]
        ];
    }
}

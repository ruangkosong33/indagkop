<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory, Sluggable;

    protected $table='categorys';

    protected $fillable=['title_category', 'slug'];

    protected $hidden=[];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title_category',
            ]
        ];
    }


    public function post()
    {
        return $this->hasMany(Post::class, 'post_id', 'id');
    }
}

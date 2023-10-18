<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Gallery extends Model
{
    use HasFactory, Sluggable;

    protected $table='gallerys';

    protected $fillable=['category_id', 'title_gallery', 'slug', 'description', 'image'];

    protected $hidden=[];

    //SLUG
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title_gallery',
            ]
        ];
    }

    //RELATION
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

}

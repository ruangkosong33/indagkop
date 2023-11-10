<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Filerenstra extends Model
{
    use HasFactory, Sluggable;

    protected $table='filerenstra';

    protected $fillable=['renstra_id', 'title_file', 'slug', 'file'];

    protected $hidden=[];

     //SLUG
     public function sluggable(): array
     {
         return [
             'slug' => [
                 'source' => 'title_file',
             ]
         ];
     }

     //RELATION
     public function renstra()
     {
         return $this->belongsTo(Renstra::class, 'renstra_id', 'id');
     }
}

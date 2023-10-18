<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Lhkpn extends Model
{
    use HasFactory, Sluggable;

    protected $table='lhkpns';

    protected $fillable=['title_lhkpn', 'slug', 'description', 'year', 'file'];

    protected $hidden=[];

    //SLUG
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title_lhkpn',
            ]
        ];
    }
}

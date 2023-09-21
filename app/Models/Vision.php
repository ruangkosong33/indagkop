<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vision extends Model
{
    use HasFactory, Sluggable;

    protected $table='visions';

    protected $fillable=['title_vision', 'slug', 'description'];

    protected $hidden=[];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title_vision'
            ]
        ];
    }
}

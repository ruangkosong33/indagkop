<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Task extends Model
{
    use HasFactory, Sluggable;

    protected $table='tasks';

    protected $fillable=['title_task', 'slug', 'description'];

    protected $hidden=[];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title_task',
            ]
        ];
    }
}

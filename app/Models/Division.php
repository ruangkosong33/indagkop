<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Division extends Model
{
    use HasFactory, Sluggable;

    protected $table='divisions';

    protected $fillable=['title_division', 'slug', 'description', 'image'];

    protected $hidden=[];

    //SLUG
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title_division',
            ]
        ];
    }

    //RELATION
    public function employee()
    {
        return $this->hasMany(Employee::class, 'employee_id', 'id');
    }
}

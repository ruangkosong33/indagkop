<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Filerenstra extends Model
{
    use HasFactory, Sluggable;

    protected $table='filerenstra';

    protected $fillable=['title_file', 'slug', 'file'];

    protected $hidden=[];

}

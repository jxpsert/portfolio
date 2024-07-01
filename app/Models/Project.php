<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'subtitle', 'description', 'url', 'github', 'slug'];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function categories()
    {
        return $this->morphToMany(Category::class, 'categorizable');
    }
}

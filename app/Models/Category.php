<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['name'];

    public function experiences()
    {
        return $this->morphedByMany(Experience::class, 'categorizable');
    }

    public function projects()
    {
        return $this->morphedByMany(Project::class, 'categorizable');
    }

}
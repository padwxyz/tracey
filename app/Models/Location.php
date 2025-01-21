<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Location extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $fillable = [
        'location_name'
    ];

    public function category()
    {
        return $this->hasMany(Category::class);
    }

    public function note()
    {
        return $this->hasMany(Note::class);
    }
}

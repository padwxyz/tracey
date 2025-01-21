<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $fillable = [
        'location_id',
        'category_name'
    ];

    public function location()
    {
        return $this->belongsTo(Location::class);
    }

    public function item()
    {
        return $this->hasMany(Item::class);
    }

    public function note()
    {
        return $this->hasMany(Note::class);
    }
}

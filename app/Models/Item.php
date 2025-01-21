<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Item extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $fillable = [
        'category_id',
        'item_name',
        'quantity',
        'condition',
        'brnad',
        'type'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function note()
    {
        return $this->hasMany(Note::class);
    }
}

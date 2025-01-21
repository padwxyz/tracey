<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $fillable = [
        'name',
        'email',
        'password'
    ];

    public function note()
    {
        return $this->hasMany(Note::class);
    }
}

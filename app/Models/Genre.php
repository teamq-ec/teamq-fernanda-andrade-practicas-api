<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    use HasFactory;

    protected $fillable = ['genre'];

    public function movie(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Movie::class);
    }
}

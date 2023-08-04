<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MovieRent extends Model
{
    use HasFactory;

    protected $table = 'movie_rent';

    public $timestamps = false;
    protected $fillable = ['movie_id', 'rent_id'];

    public function movie(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Movie::class, 'movie_rent', 'movie_id', 'rent_id');
    }

}

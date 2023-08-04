<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActorMovie extends Model
{
    use HasFactory;

    protected $table = 'actor_movie';

    public $timestamps = false;
    protected $fillable = ['actor_id', 'movie_id'];

    public function movies(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Movie::class, 'actor_movie', 'movie_id', 'actor_id');
    }

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;

    protected $fillable = ['title','description','adult','release_date_at','genre_id','director_id'];

    public static function create(array $data)
    {
        return self::query()->create($data);

    }


    public function genre(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Genre::class);
    }

    public function director(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Director::class);
    }

    public function actor(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Actor::class);
    }

    public function actors(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Actor::class, 'actors_movies', 'movie_id', 'actor_id');
    }

}

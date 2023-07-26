<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class ActorMovie extends Pivot
{
    use HasFactory;
    protected $table = 'actor_movies';

}

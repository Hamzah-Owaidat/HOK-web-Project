<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'game', 'score', 'played_at'];

    public function scores()
    {
        return $this->hasMany(Score::class);
    }
}

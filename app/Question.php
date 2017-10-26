<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Answer;

class Question extends Model
{



    protected $fillable = [
      'title', 'body',
    ];

    public function answer()
    {
      return $this->hasMany(Answer::class);
    }
}

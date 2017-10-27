<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Answer;

class Question extends Model
{
  // use SoftDeletes;
  // protected $dates = ['deleted_at'];
  // protected $table = 'questions';
  // protected $softDelete = true;



    protected $fillable = [
      'title', 'body',
    ];

    public function answer()
    {
      return $this->hasMany(Answer::class);
    }
}

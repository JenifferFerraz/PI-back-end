<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;
    protected $fillable = ['question', 'type'];

    public function options()
    {
        return $this->hasMany(Option::class);
    }

    public function nextQuestion()
    {
        return $this->belongsTo(Question::class, 'next_question_id');
    }
}

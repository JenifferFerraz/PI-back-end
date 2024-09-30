<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Technology extends Model
{
    use HasFactory;

    // Define os campos que podem ser preenchidos em massa
    protected $fillable = [
        'nome',
        'descricao',
        'nivel',
    ];
}
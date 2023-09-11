<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MultipleChoicesQuestions extends Model
{
    use HasFactory;

    protected $fillable = [
        'question',
        'choices',
        'liststyle',
    ];
}

<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MatchingQuestions extends Model
{
    use HasFactory;

    protected $fillable = [
        'question',
        'columnA',
        'columnAliststyle',
        'columnB',
        'columnBliststyle'
    ];
}

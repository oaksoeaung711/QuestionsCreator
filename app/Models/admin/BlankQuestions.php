<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlankQuestions extends Model
{
    use HasFactory;

    protected $fillable = ['question'];
}

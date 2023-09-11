<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('matching_questions', function (Blueprint $table) {
            $table->id();
            $table->longText('question');
            $table->longText('columnA');
            $table->integer('columnAliststyle');
            $table->longText('columnB');
            $table->integer('columnBliststyle');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('matching_questions');
    }
};

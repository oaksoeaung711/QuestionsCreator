<?php

use App\Http\Controllers\admin\AuthController;
use App\Http\Controllers\admin\BlankQuestionsController;
use App\Http\Controllers\admin\CreateQuestionPaperController;
use App\Http\Controllers\admin\MatchingQuestionsController;
use App\Http\Controllers\admin\MultipleChoicesQuestionsController;
use App\Http\Controllers\admin\TrueFalseQuestionsController;
use Illuminate\Support\Facades\Route;

Route::redirect('/','/admin');

Route::prefix('admin')->group(function(){

    Route::view('/login','admin.login')->name('login');
    Route::post('login',[AuthController::class,'login'])->name('admin.login');

    Route::middleware('auth')->group(function(){
        Route::view('/','admin.home')->name('admin.home');
        Route::get('/logout',[AuthController::class,'logout'])->name('admin.logout');

        Route::resource('/truefalsequestions',TrueFalseQuestionsController::class,['as'=>'admin'])->except('show');

        Route::resource('/blankquestions',BlankQuestionsController::class,['as'=>'admin'])->except('show');

        Route::resource('/multiplechoicesquestions',MultipleChoicesQuestionsController::class,['as'=>'admin'])->except('show');

        Route::resource('/matchingquestions',MatchingQuestionsController::class,['as'=>'admin'])->except('show');

        Route::get('/createquestionpapers',[CreateQuestionPaperController::class,'index'])->name('createquestionpapers.index');
        Route::post('/createquestionpapers',[CreateQuestionPaperController::class,'create'])->name('createquestionpapers.create');
    });
});

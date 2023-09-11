<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\admin\BlankQuestions;
use App\Models\admin\MatchingQuestions;
use App\Models\admin\MultipleChoicesQuestions;
use App\Models\admin\TrueFalseQuestions;
use Illuminate\Http\Request;

class CreateQuestionPaperController extends Controller
{
    public function index()
    {
        $tfquestions = TrueFalseQuestions::all();
        $blankquestions = BlankQuestions::all();
        $mcquestions = MultipleChoicesQuestions::all();
        $matchingquestions = MatchingQuestions::all();
        return view('admin.createquestionpapers.index',compact('tfquestions','blankquestions','mcquestions','matchingquestions'));
    }

    public function create(Request $request)
    {
        $allquestions = [];
        
        $grade = $request->grade;
        $subject = $request->subject;
        $allowancetime = $request->allowancetime;
        $mainquestionformat = $request->mainquestionformat;
        $subquestionformat = $request->subquestionformat;
        $colname1 = $request->colname1;
        $colname2 = $request->colname2;

        if(!empty($request->maintfquestion) && !empty($request->tfquestions)){
            $allquestions[$request->maintfquestion] = $request->tfquestions;
        }

        if(!empty($request->mainblankquestion) && !empty($request->blankquestions)){
            $allquestions[$request->mainblankquestion] = $request->blankquestions;
        }
        
        if(!empty($request->mainmcquestion) && !empty($request->mcquestions)){
            $allquestions[$request->mainmcquestion] = $request->mcquestions;
        }
        
        if(!empty($request->mainmatchingquestion) && !empty($request->matchingquestions)){
            $allquestions[$request->mainmatchingquestion] = $request->matchingquestions;
        }

        return view('admin.createquestionpapers.question',compact('allquestions','grade','subject','allowancetime','mainquestionformat','subquestionformat','colname1','colname2'));
        
    }
}

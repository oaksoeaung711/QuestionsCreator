<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreMatchingQuestionsRequest;
use App\Http\Requests\UpdateMatchingQuestionsRequest;
use App\Models\admin\MatchingQuestions;

class MatchingQuestionsController extends Controller
{
    public function index()
    {
        $matchingquestions = MatchingQuestions::all();
        return view('admin.matchingquestions.index',compact('matchingquestions'));
    }

    public function create()
    {
        return view('admin.matchingquestions.create');
    }

    public function store(StoreMatchingQuestionsRequest $request)
    {
        try{
            MatchingQuestions::create([
                'question' => json_encode($request->matchingquestion),
                'columnA' => json_encode($request->columnA),
                'columnAliststyle' => $request->columnAliststyle,
                'columnB' => json_encode($request->columnB),
                'columnBliststyle' => $request->columnBliststyle,
                
            ]);
            return redirect()->route('admin.matchingquestions.index')->with('success','Question created successfully.');
        }catch(\Exception $e){
            return back()->with('errors','Cannot create question!');
        }
    }

    public function show(MatchingQuestions $matchingQuestions)
    {
        //
    }

    public function edit(MatchingQuestions $matchingQuestions,$id)
    {
        $matchingquestion = $matchingQuestions::findOrFail($id);
        return view('admin.matchingquestions.edit',compact('matchingquestion'));
    }

    public function update(UpdateMatchingQuestionsRequest $request, MatchingQuestions $matchingQuestions,$id)
    {
        $question = $matchingQuestions::findOrFail($id);
        $question->question = json_encode($request->matchingquestion);
        $question->columnA = json_encode($request->columnA);
        $question->columnAliststyle = $request->columnAliststyle;
        $question->columnB = json_encode($request->columnB);
        $question->columnBliststyle = $request->columnBliststyle;
        $question->update();
        return redirect()->route('admin.matchingquestions.index');
    }

    public function destroy(MatchingQuestions $matchingQuestions,$id)
    {
        $question = $matchingQuestions::findOrFail($id);
        $question->delete();
        return redirect()->route('admin.matchingquestions.index');
    }
}

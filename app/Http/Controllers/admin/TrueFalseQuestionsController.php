<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTrueFalseQuestionsRequest;
use App\Models\admin\TrueFalseQuestions;
use Illuminate\Http\Request;

class TrueFalseQuestionsController extends Controller
{
    public function index()
    {
        $truefalsequestions = TrueFalseQuestions::all();
        return view('admin.truefalsequestions.index',compact('truefalsequestions'));
    }

    public function create()
    {
        return view('admin.truefalsequestions.create');
    }

    public function store(StoreTrueFalseQuestionsRequest $request)
    {
        try{
            TrueFalseQuestions::create([
                'question' => json_encode($request->truefalsequestion),
            ]);
            return redirect()->route('admin.truefalsequestions.index')->with('success','Question created successfully.');
        }catch(\Exception $e){
            return back()->with('errors','Cannot create question!');
        }
    }

    public function edit(TrueFalseQuestions $trueFalseQuestions,$id)
    {
        $question = $trueFalseQuestions::findOrFail($id);
        return view('admin.truefalsequestions.edit',compact('question'));
    }

    public function update(Request $request, TrueFalseQuestions $trueFalseQuestions,$id)
    {
        $question = $trueFalseQuestions::findOrFail($id);
        $question->question = json_encode($request->truefalsequestion);
        $question->update();
        return redirect()->route('admin.truefalsequestions.index');
    }

    public function destroy(TrueFalseQuestions $trueFalseQuestions,$id)
    {
        $question = $trueFalseQuestions::findOrFail($id);
        $question->delete();
        return redirect()->route('admin.truefalsequestions.index');
    }
}

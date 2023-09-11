<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBlankQuestionsRequest;
use App\Http\Requests\UpdateBlankQuestionsRequest;
use App\Models\admin\BlankQuestions;

class BlankQuestionsController extends Controller
{

    public function index()
    {
        $blankquestions = BlankQuestions::all();
        return view('admin.blankquestions.index',compact('blankquestions'));
    }

    public function create()
    {
        return view('admin.blankquestions.create');
    }

    public function store(StoreBlankQuestionsRequest $request)
    {
        try{
            BlankQuestions::create([
                'question' => json_encode($request->blankquestion),
            ]);
            return redirect()->route('admin.blankquestions.index')->with('success','Question created successfully.');
        }catch(\Exception $e){
            return back()->with('errors','Cannot create question!');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(BlankQuestions $blankQuestions)
    {
        //
    }

    public function edit(BlankQuestions $blankQuestions,$id)
    {
        $question = $blankQuestions::findOrFail($id);
        return view('admin.blankquestions.edit',compact('question'));
    }

    public function update(UpdateBlankQuestionsRequest $request, BlankQuestions $blankQuestions,$id)
    {
        $question = $blankQuestions::findOrFail($id);
        $question->question = json_encode($request->blankquestion);
        $question->update();
        return redirect()->route('admin.blankquestions.index');
    }

    public function destroy(BlankQuestions $blankQuestions,$id)
    {
        $question = $blankQuestions::findOrFail($id);
        $question->delete();
        return redirect()->route('admin.blankquestions.index');
    }
}

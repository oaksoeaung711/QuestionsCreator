<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreMultipleChoicesQuestionsRequest;
use App\Http\Requests\UpdateMultipleChoicesQuestionsRequest;
use App\Models\admin\MultipleChoicesQuestions;

class MultipleChoicesQuestionsController extends Controller
{
    public function index()
    {
        $mcquestions = MultipleChoicesQuestions::all();
        return view('admin.multiplechoicesquestions.index',compact('mcquestions'));
    }

    public function create()
    {
        return view('admin.multiplechoicesquestions.create');
    }

    public function store(StoreMultipleChoicesQuestionsRequest $request)
    {
        try{
            MultipleChoicesQuestions::create([
                'question' => json_encode($request->multiplechoicesquestion),
                'choices' => json_encode($request->choices),
                'liststyle' => $request->liststyle,
            ]);
            return redirect()->route('admin.multiplechoicesquestions.index')->with('success','Question created successfully.');
        }catch(\Exception $e){
            return back()->with('errors','Cannot create question!');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(MultipleChoicesQuestions $multipleChoicesQuestions)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MultipleChoicesQuestions $multipleChoicesQuestions,$id)
    {
        $mcquestion = $multipleChoicesQuestions::findOrFail($id);
        return view('admin.multiplechoicesquestions.edit',compact('mcquestion'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMultipleChoicesQuestionsRequest $request, MultipleChoicesQuestions $multipleChoicesQuestions,$id)
    {
        $question = $multipleChoicesQuestions::findOrFail($id);
        $question->question = json_encode($request->multiplechoicesquestion);
        $question->choices = json_encode($request->choices);
        $question->liststyle = $request->liststyle;
        $question->update();
        return redirect()->route('admin.multiplechoicesquestions.index');
    }

    public function destroy(MultipleChoicesQuestions $multipleChoicesQuestions,$id)
    {
        $question = $multipleChoicesQuestions::findOrFail($id);
        $question->delete();
        return redirect()->route('admin.multiplechoicesquestions.index');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AnswerController extends Controller
{

     /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function edit(Answer $answer)
    {
        if ( $answer->owner->id !== Auth::user()->id ) {
            return redirect()->route('questions.show', ['question' => $answer->question_id])
            ->with('error', 'Not allowed');
        }

        return view('answers.edit', compact('answer'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $valited = $request->validate([
            'description' => 'required',
            'question_id' => 'required'
        ]);

        $valited['owner_id'] = Auth::id();

        Answer::create($valited);

        return redirect()->route('questions.show', ['question' => $valited['question_id']])
                         ->with('success', 'Answer created successfully.');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Answer  $answer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Answer $answer)
    {
        $request->validate([
            'description' => 'required',
        ]);

        if ( $answer->owner->id !== Auth::user()->id ) {
            return redirect()->route('questions.show', ['question' => $answer->question_id])
            ->with('error', 'Not allowed');
        }

        $answer->update($request->all());

        return redirect()->route('questions.show', ['question' => $answer->question_id])
            ->with('success', 'Answer updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Answer  $answer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Answer $answer)
    {
        if ( $answer->owner->id !== Auth::user()->id ) {
            return redirect()->route('questions.show', ['question' => $answer->question_id])
            ->with('error', 'Not allowed');
        }

        $answer->delete();

        return redirect()->route('questions.show', ['question' => $answer->question_id])
            ->with('success', 'Answer deleted successfully');
    }
}

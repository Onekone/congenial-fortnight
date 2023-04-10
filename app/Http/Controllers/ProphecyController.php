<?php

namespace App\Http\Controllers;

use App\Http\Requests\Prophecy\QuestionRequest;
use App\Models\Prophecy;
use App\Models\ProphecyVariant;

class ProphecyController extends Controller
{
    public function index()
    {
        return view('balls.index');
    }

    public function question(QuestionRequest $request)
    {
        /** @var \App\Models\User $user */
        $user = auth()->user();
        $question = $request->get('question', 'empty');

        /** @var \App\Models\Prophecy $prophecy */
        $prophecy = $user->questions()->make([
            'question'            => $question,
            'prophecy_variant_id' => ProphecyVariant::random()->first()->id,
        ]);
        $prophecy->save();

        $request->flash();

        return view('balls.index', [
            'question' => $prophecy,
            'stats'    => Prophecy::whereQuestion($question)->get(),
        ]);
    }
}

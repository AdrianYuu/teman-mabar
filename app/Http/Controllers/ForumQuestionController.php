<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreForumQuestionRequest;
use App\Models\ForumQuestion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ForumQuestionController extends Controller
{
    public function store(StoreForumQuestionRequest $request)
    {
        $validated = $request->validated();

        ForumQuestion::create([
            'user_id' => Auth::user()->id,
            'title' => $validated['title'],
            'question' => $validated['question']
        ]);

        return back();
    }
}

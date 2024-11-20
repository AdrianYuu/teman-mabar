<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreForumCommentRequest;
use App\Models\ForumComment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ForumCommentController extends Controller
{
    public function store(StoreForumCommentRequest $request, $id)
    {
        $validated = $request->validated();

        ForumComment::create([
            'user_id' => Auth::user()->id,
            'forum_question_id' => $id,
            'comment' => $request->comment
        ]);

        return back();
    }
}

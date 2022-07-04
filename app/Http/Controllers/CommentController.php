<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\EditCommentRequest;
use App\Http\Requests\StoreCommentRequest;

class CommentController extends Controller
{
    //
    public function store(StoreCommentRequest $request) {

        Comment::create($request->validated());

        return back();
    }

    public function show(Comment $comment) {
        dd('Show');
    }

    public function edit(Comment $comment) {
        return view('comment.edit')->with('comment', $comment);
    }

    public function update(EditCommentRequest $request, Comment $comment) {

        $comment->update($request->validated());
        return back();
    }

    public function destroy(Comment $comment) {

        $comment->delete();
        return redirect()->back();

    }


}

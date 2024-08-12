<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{

    public function store(Request $request, Article $article)
    {
        $request->validate([
            'body' => 'required|string',
            'parent_id' => 'nullable|exists:comments,id',
        ]);

        $comment = new Comment();
        $comment->body = $request->body;
        $comment->user_id = auth()->id();
        $comment->article_id = $article->id;
        $comment->parent_id = $request->parent_id;
        $comment->save();
        return back();
    }
    public function reply(Request $request, Comment $comment)
    {
        $request->validate([
            'body' => 'required|string|max:1000',
            'article_id' => 'required|integer|exists:articles,id',
            'parent_id' => 'required|integer|exists:comments,id',
        ]);

        Comment::create([
            'body' => $request->body,
            'user_id' => auth()->id(),
            'article_id' => $request->article_id,
            'parent_id' => $request->parent_id,
        ]);

        return back();
    }
}

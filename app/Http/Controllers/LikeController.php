<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Like;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function store(Request $request, Article $article)
    {
        $like = Like::where('user_id', auth()->id())->where('article_id', $article->id)->first();
        if ($like) {
            $like->delete();
        } else {
            $article->likes()->create([
                'user_id' => auth()->id(),
            ]);
        }

        return back();
    }
}

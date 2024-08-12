<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\ArticleView;
use App\Models\Category;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        if ($user->user_type === 'admin') {
            $user = User::all();
            $articles = Article::with('user', 'likes', 'comments')->get();
            $categories = Category::all();
            return view('admin.admin', compact('articles', 'categories', 'user'));
        } else {
            $user = User::all();
            $articles = Article::with('user', 'likes', 'comments')->get();
            $categories = Category::all();
            return view('home.index', compact('articles', 'categories', 'user'));
        }
    }

    public function search(Request $request)
    {
        $request->validate([
            'search' => 'required|string|max:255',
        ]);

        $search = $request->search;

        $articles = Article::where('title', 'LIKE', '%' . $search . '%')
            ->orWhere('category', 'LIKE', '%' . $search . '%')
            ->paginate(10);

        $categories = Category::all();

        return view('home.index', compact('articles', 'categories'));
    }
    public function home(Request $request)
    {
        $perPage = $request->input('per_page', 10); // Default to 10 articles per page if not specified
        $articles = Article::with('user', 'likes', 'comments')->paginate($perPage);
        $categories = Category::all();
        return view('home.index', compact('articles', 'categories'));
    }

    public function comment(Request $request, Article $article)
    {
        $request->validate([
            'body' => 'required',
            'parent_id' => 'nullable|exists:comments,id',
        ]);

        $article->comments()->create([
            'body' => $request->body,
            'user_id' => auth()->id(),
            'parent_id' => $request->parent_id,
        ]);

        return back()->with('success', 'Comment added successfully.');
    }

    public function showByCategory($name, Request $request)
    {
        // Find the category by its name; throw 404 if not found
        $categorys = Category::where('name_en', $name)->firstOrFail();

        // Retrieve the number of items per page from the request, default to 10
        $perPage = $request->input('per_page', 10);

        // Retrieve articles related to the category with pagination
        $articles = Article::where('category', $categorys->name_en)
            ->with('user', 'likes', 'comments')
            ->paginate($perPage);

        // Return the view with the category and articles
        return view('home.articles_by_category', compact('categorys', 'articles'));
    }


    public function article_detail($id, Request $request)
    {
        // Fetch the article with related data in a single query
        $article = Article::with(['user', 'likes', 'comments.user'])->findOrFail($id);
        $categories = Category::all();

        // Increment the view count for the article
        $articleView = ArticleView::firstOrCreate(['article_id' => $article->id]);
        $articleView->increment('views');

        // Paginate comments
        $perPage = $request->input('per_page', 5); // Default to 5 comments per page if not specified
        $comments = Comment::where('article_id', $id)->with('user')->paginate($perPage);

        return view('home.show', compact('article', 'comments', 'categories'));
    }


    public function movie($id)
    {

        $comments = Comment::where('article_id', $id)->with('user')->get();
        $article = Article::where('id', $id)->with('user', 'likes', 'comments', 'episodes')->first();
        $categories = Category::all();
        $episodes = $article->episodes; // Assuming the relationship is defined in the Article model

        return view('home.movie', compact('article', 'categories', 'comments', 'episodes'));
    }
}

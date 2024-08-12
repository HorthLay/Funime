<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\ArticleRequest;
use App\Models\ArticleView;
use App\Models\Like;
use App\Models\Comment;
use App\Models\Episode;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Redirect;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function create()
    {
        $category = Category::all();
        return view('admin.create', compact('category'));
    }

    public function store(Request $request)
    {

        $request->validate([
            'youtube_video_url' => 'nullable|url',
            'mega_video_url' => 'nullable|url',
            'video_file' => 'nullable|mimes:mp4,avi,mkv|max:20480', // Validation for video file // Validation for the URL 
        ]);


        $data = new Article;
        $data->title = $request->title;
        $data->body = $request->body;
        $data->highlights = $request->highlights;
        $data->youtube_video_url = $request->youtube_video_url;
        $data->mega_video_url = $request->mega_video_url;
        $data->user_id = auth()->id();

        $data->category = $request->category;




        $image = $request->featured_image;
        if ($image) {
            $imagename = time() . '.' . $image->getClientOriginalExtension();
            $request->featured_image->move('articles', $imagename);
            $data->featured_image = $imagename;
        }

        $data->save();
        $data->categories()->sync($request->categories);

        return redirect("/add_article")->with('message', 'Article Add Already');
    }



    public function add_user()
    {
        $user = User::all();
        return view('admin.user', compact('user'));
    }

    public function upload_user(Request $request)
    {
        $data = new User;

        $data->name = $request->name;
        $data->email = $request->email;
        $data->password = Hash::make($request->password);
        $data->address = $request->address;
        $data->phone = $request->phone;
        $data->usertype = $request->usertype;

        $data = $data->save();

        session()->flash('success', 'User Add Already');

        return redirect('/add_user');
    }

    public function view_user()
    {
        $users = User::paginate(2);
        return view('admin.view_user', compact('users'));
    }

    public function update_user($id)
    {
        $users = User::find($id);
        return view('admin.updateuser_page', compact('users'));
    }

    public function edit_user(Request $request, $id)
    {
        $users = User::find($id);
        $users->name = $request->name;
        $users->email = $request->email;
        $users->password = Hash::make($request->password);
        $users->address = $request->address;
        $users->phone = $request->phone;
        $users->usertype = $request->usertype;

        $users->save();

        return redirect('/view_user')->with('message', 'User Update Already');
    }

    public function delete_user($id)
    {
        $users = User::find($id);

        $users->delete();


        return redirect('/view_user')->with('message', 'User Delete Already');
    }

    public function category_view()
    {
        $data = Category::all();
        return view('admin.category', compact('data'));
    }

    public function create_category(Request $request)
    {
        $category = new Category();
        $category->name_en = $request->name_en;
        $category->name_kh = $request->name_kh;
        $category->save();
        session()->flash('success', 'Category Add Already');
        return redirect('/category_view')->with('message', 'Category Add Already');
    }
    public function view_article()
    {

        $episode = Episode::all();
        $article = Article::paginate(3);
        return view('admin.article', compact('article'));
    }

    public function delete_article($id)
    {
        $articles = Article::find($id);

        $articles->delete();
        session()->flash('success', 'Article Delete Already');


        return redirect('/view_article')->with('message', 'Article Delete Already');
    }
    public function update_article($id)
    {
        $articles = Article::find($id);
        $category = Category::all();
        return view('admin.updatearticle_page', compact('articles', 'category'));
    }

    public function article_edit(Request $request, $id)
    {
        $articles = Article::find($id);
        $articles->title = $request->title;
        $articles->body = $request->body;
        $articles->highlights = $request->highlights;
        $articles->youtube_video_url = $request->youtube_video_url;
        $articles->mega_video_url = $request->mega_video_url;

        $articles->category = $request->category;
        $image = $request->featured_image;
        if ($image) {
            $imagename = time() . '.' . $image->getClientOriginalExtension();

            $request->featured_image->move('articles', $imagename);

            $articles->featured_image = $imagename;
        }

        $articles->save();
        $articles->categories()->sync($request->categories);


        return redirect("/view_article")->with('message', 'Article Update Already');
    }

    // public function search_article(Request $request)
    // {
    //     $search = $request->search;
    //     $articles = Article::where('title', 'like', '%' . $search . '%')->paginate(3);
    //     return view('admin.article', compact('articles'));
    // }

    public function viewEpisodes($articleId)
    {
        $article = Article::with('episodes')->findOrFail($articleId);
        return view('admin.episode', compact('article'));
    }

    public function createEpisode($articleId)
    {
        $article = Article::findOrFail($articleId);
        return view('admin.episode_create', compact('article'));
    }

    public function storeEpisode(Request $request, $articleId)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'video_url' => 'required|url',
        ]);

        $article = Article::findOrFail($articleId);
        $article->episodes()->create($request->all());


        return redirect('/view_article')->with('message', 'Episode Add Already');
    }


    public function editEpisode($articleId, $episodeId)
    {
        $article = Article::findOrFail($articleId);
        $episode = Episode::findOrFail($episodeId);
        return view('admin.episode_edit', compact('article', 'episode'));
    }

    public function updateEpisode(Request $request, $articleId, $episodeId)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'video_url' => 'required|url',
        ]);

        $episode = Episode::findOrFail($episodeId);
        $episode->update($request->all());

        return redirect('/view_article')->with('message', 'Episode Update Already');
    }

    public function deleteEpisode($articleId, $episodeId)
    {
        $episode = Episode::findOrFail($episodeId);
        $episode->delete();

        return redirect('/view_article')->with('message', 'Episode Delete Already');
    }




    public function delete_category($id)
    {
        $category = Category::find($id);

        $category->delete();

        return redirect('/category_view')->with('message', 'Category Delete Already');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\File;

class PostController extends Controller
{
    //
    public function index()
    {
        $articles = Article::all();

        return view('admin.posts.index', ['articles' => $articles]);
    }

    public function add()
    {
        $categories = Category::all();
        
        return view('admin.posts.add', ['categories' => $categories]); 
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'category' => ['required', 'integer'],
            'titre' => ['required', 'string', 'min:4', 'max:50'],
            'contenu' => ['required'],
            'image' => File::image(),
        ]);

        $image = $request->file('image')->store('public/images/post');

        Article::create([
            'id_user' => auth()->id(),
            'id_category' => $request->category,
            'titre' => $request->titre,
            'contenu' => $request->contenu,
            'image' => $image,
        ]);

        return redirect('/post-all')->with('status', 'Article Ajoute');
    }

    public function edit($id)
    {
        $article = Article::find($id);
        $categories = Category::all();

        return view('admin.posts.edit', ['article' => $article, 'categories' => $categories]);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'category' => ['required', 'integer'],
            'titre' => ['required', 'string', 'min:4', 'max:50'],
            'contenu' => ['required'],
            'image' => File::image(),
        ]);

        $article = Article::find($id);
        $image = $article->image;

        if($request->file('image'))
        {
            $image = $request->file('image')->store('public/images/post');
        }

        $article->id_category = $request->category;
        $article->titre = $request->titre;
        $article->contenu = $request->contenu;
        $article->image = $image;
        $article->save();

        return redirect('/post-all')->with('status', 'Article Modifier');
    }

    public function delete($id)
    {
        $article = Article::find($id);
        $article->delete();

        return redirect('/post-all')->with('status', 'Article Supprimer');
    }
}

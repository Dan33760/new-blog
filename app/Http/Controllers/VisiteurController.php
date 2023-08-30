<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Article;
use App\Models\Category;
use App\Models\Visiteur;
use App\Models\Commentaire;
use Illuminate\Http\Request;
use App\Http\Requests\CommentAddRequest;

class VisiteurController extends Controller
{
    public function allPosts(Request $request)
    {
        $posts = null;
        if($request->id)
        {
            $posts = Article::where('id_category', '=', $request->id)->get();
        }else{
            $posts = Article::all();
        }


        $categories = Category::all();

        return view('posts', [
            'posts' => $posts,
            'categories' => $categories,
        ]);
    }

    public function singlePost($id)
    {
        $post = Article::find($id);

        return view('post', ['post' => $post]);
    }

    public function addComment(CommentAddRequest $request, $id)
    {
        $visiteur = Visiteur::where('email', '=', $request->email)->first();

        if($visiteur == null)
        {
            $visiteur = Visiteur::create([
                'nom' => $request->nom,
                'email' => $request->email,
            ]);
        }

        Commentaire::create([
            'id_article' => $id,
            'id_visiteur' => $visiteur->id,
            'contenu' => $request->commentaire,
        ]);

        return back();
    }
}

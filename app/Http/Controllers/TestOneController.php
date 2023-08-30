<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestOneController extends Controller
{
    public function accueil()
    {
        return view('visiteur.accueil');
    }

    public function posts()
    {
        return view('posts');
    }

    public function post()
    {
        return view('post');
    }

    public function add()
    {
        return view('visiteur.add');
    }
}

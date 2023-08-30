<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    // Methode pour voir la liste des categories
    public function index()
    {
        $categories = Category::all();

        return view('admin.categories.index', ['categories' => $categories]);
    }

    public function add()
    {
        return view('admin.categories.add');
    }

    // Methode pour enregistrer
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nom' => 'required|string|min:3|max:20',
            'description' => 'required|min:3|max:255'
        ]);

        Category::create([
            'nom' => $request->nom,
            'description' => $request->description
        ]);

        return redirect('/category-all')->with('status', 'Categorie Ajoutee');
    }

    public function edit($id)
    {
        $category = Category::find($id);

        return view('admin.categories.edit', ['category' => $category]);
    }

    // Methode pour modifier
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nom' => 'required|string|min:3|max:20',
            'description' => 'required|min:3|max:255'
        ]);
        
        $category = Category::find($id);

        $category->nom = $request->nom;
        $category->description = $request->description;
        $category->save();

        return redirect('/category-all')->with('status', 'Categorie modifiee');
    }

    public function delete($id)
    {
        $category = Category::find($id);
        $category->delete();

        return redirect('/category-all')->with('status', 'Categorie Supprimee');
    }
}

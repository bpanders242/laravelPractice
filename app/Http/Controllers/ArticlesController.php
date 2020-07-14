<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;

class ArticlesController extends Controller
{
    public function index(){

        // Render a list of the resource

        $articles = Article::latest()->get();
        return view('articles.index', $articles);
    }

    public function show(Article $article){

        // Render a single resource

        return view('articles.show', $article);
    }

    public function create(){

        // Render a view to create a resource

        return view('articles.create');

    }

    public function store(){

        // Save/persist a new resource

        Article::create($this->validateArticle());

        return redirect(route('articles.index'));

    }

    public function edit(Article $article){

        // Render a view to change the contents of a resource

        return view('articles.edit', compact('article'));

    }

    public function update(Article $article){

        // Save/persist the edited contents of a resource

        $article->update($this->validateArticle());

        return redirect(route('articles.show', $article));

    }

    public function destroy(){

        // Delete an instance of a resource

    }

    /**
     * @return array
     */
    public function validateArticle(): array
    {
        return request()->validate([
            'title' => 'required',
            'excerpt' => 'required',
            'body' => 'required'
        ]);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;

class ArticlesController extends Controller
{
    public function index(){

        // Render a list of the resource

        $articles = Article::latest()->get();
        return view('articles.index', ['articles' => $articles]);
    }

    public function show($articleId){

        // Render a single resource

        $article = Article::find($articleId);

        return view('articles.show', ['article' => $article]);
    }

    public function create(){

        // Render a view to create a resource

        return view('articles.create');

    }

    public function store(){

        // Save/persist a new resource

        request()->validate([
            'title'=>'required',
            'excerpt'=>'required',
            'body'=>'required'
        ]);

        $article = new Article();
        $article->title = request('title');
        $article->excerpt = request('excerpt');
        $article->body = request('body');
        $article->save();

        return redirect('/articles');

    }

    public function edit($id){

        // Render a view to change the contents of a resource

        $article = Article::find($id);
        return view('articles.edit', ['article'=>$article]);

    }

    public function update($id){

        // Save/persist the edited contents of a resource

        request()->validate([
            'title'=>'required',
            'excerpt'=>'required',
            'body'=>'required'
        ]);

        $article = Article::find($id);
        $article->title = request('title');
        $article->excerpt = request('excerpt');
        $article->body = request('body');
        $article->save();

        return redirect('/articles');

    }

    public function destroy(){

        // Delete an instance of a resource

    }
}

<?php

namespace App\Http\Controllers;

// Lisätty:
use App\Article;

//use Illuminate\Http\Request;
use Request;

class ArticlesController extends Controller
{ 
    public function index() {
	//$articles = Article::all();
	$articles = Article::latest('published_at')->get();
    // return $articles;
    return view('articles.index')->with('articles', $articles);
    }

    public function show($id) {
        // $article = Article::find($id);
        // return $article;
        $article = Article::findOrFail($id);
	    return view('articles.show')->with('article', $article);
    }
    
    public function create() {
        return view('articles.create');
    }

   public function store(\App\Http\Requests\CreateArticleRequest $request) {
	//$input = Request::all();

	// Jos ei olisi tietokannan kentän/migrationissa määriteltynä defaulttina current timestamppia
	//$input['published_at'] = Carbon::now();

	Article::create($request->all());
	return redirect('articles');

	// Näinkin kenttä kerrallaan:
	//$article = new Article;
	//$article->title = $input['title'];

    }
}
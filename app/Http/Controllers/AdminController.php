<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use App\Article;

class AdminController extends Controller
{
    public function index()
    {
    	return view('acp.index');
    }

    public function indexArticles()
    {
    	$articles = Article::latest('id')->paginate(15);
    	return view('acp.indexArticles', compact('articles'));
    }

    public function storeArticle(Request $request)
    {
    	Article::create([
    		'article_title' => $request->input('article_title'),
    		'article_body' => $request->input('article_body'),
    		'article_lock' => true,
    		]);

    	flash()->success('Udało Ci się utworzyć artykuł.');
    	return redirect('/admin/articles');
    }
}

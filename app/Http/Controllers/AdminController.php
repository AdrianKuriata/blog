<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use App\Article;
use App\Tag;
use App\Post;
use View;

class AdminController extends Controller
{
	public function __construct()
	{
		parent::__construct();
	}
	public function index()
	{
		return view('acp.index');
	}

	public function indexArticles()
	{
		$articles = Article::latest('id')->paginate(15);
		$tags = Tag::lists('tag_name', 'id');
		return View::make('acp.indexArticles', compact('articles', 'tags'));
	}

	public function storeArticle(Request $request)
	{
		
		$article = \Auth::user()->article()->create([
			'article_title' => $request->input('title'),
			'article_body' => strip_tags($request->input('body'), '<p><h1><h2><h3><h4><h5><h6><span><br><b><u><i><blockquote><pre><table><tr><td><tbody><thead><th><iframe><a><img>'),
			'article_lock' => true,
			]);
		$article->tag()->attach($request->input('selectTags'));

		flash()->success('Udało Ci się poprawnie utworzyć artykuł.');
		return redirect('/admin/articles');
		
		
    	/*
    	\Auth::user()->article()->create([
    		'article_title' => $request->input('title'),
    		'article_body' => strip_tags($request->input('body'), '<p><h1><h2><h3><h4><h5><h6><span><br><b><u><i><blockquote><pre><table><tr><td><tbody><thead><th><iframe><a><img>'),
    		'article_lock' => true,
    		]);
    	$lastData = Article::latest('id')->first();
		return response()->json($lastData, 200);*/

    	/*foreach($request->input('selectTags') as $key=>$tag)
    	{
    		Tag::create([
    		'tag_name' => $tag,
    		]);
    	}
    	
    	$article = \Auth::user()->article()->create([
    		'article_title' => $request->input('title'),
    		'article_body' => strip_tags($request->input('body'), '<p><h1><h2><h3><h4><h5><h6><span><br><b><u><i><blockquote><pre><table><tr><td><tbody><thead><th><iframe><a><img>'),
    		'article_lock' => true,
    		]);
    	$article->tag()->attach($request->input('selectTags'));

    	flash()->success('Udało Ci się poprawnie utworzyć artykuł.');
    	return redirect('/admin/articles');*/
    }

    public function storeTag(Request $request)
    {
    	Tag::create([
    		'tag_name' => $request->input('selectTags'),
    		]);
    	
    	return response()->json(['test' => 'to dziala!'],200);
    }

    public function editArticle($id, Request $request)
    {
    	\Auth::user()->article()->where('id', $id)->update([
    		'article_title' => $request->input('article_title'),
    		'article_body' => strip_tags($request->input('article_body'), '<p><h1><h2><h3><h4><h5><h6><span><br><b><u><i><blockquote><pre><table><tr><td><tbody><thead><th><iframe><a><img>'),
    		'article_lock' => $request->input('article_lock')
    		]);

    	flash()->success('Udało Ci się poprawnie edytować wpis!');
    	return redirect('/admin/articles');
    }

    public function deleteArticle($id)
    {
    	$deleteArticle = Article::findOrFail($id);
    	$deleteArticle->delete();

    	flash()->success('Udało Ci się poprawnie usunąć artykuł z bazy danych.');
    	return redirect('/admin/articles');
    }

    public function indexPosts()
    {
    	$posts = Post::latest('created_at')->paginate(20);
    	return view('acp.indexPosts', compact('posts'));
    }

    public function verifyPost($id, Request $request)
    {
    	$post = Post::findOrFail($id);

    	$post->update([
    		'name' => $request->input('name'),
    		'email' => $request->input('email'),
    		'body' => $request->input('body'),
    		'is_moderated' => false,
    		'checked_post' => true
    		]);

    	flash()->success('Post został zweryfikowany poprawnie i pojawił się w Swoim artykule.');
    	return redirect('/admin/posts');
    }

    public function deletePost($id)
    {
    	$post = Post::findOrFail($id);

    	$post->delete();

    	flash()->success('Udało Ci się poprawnie odrzucić i usunąć post.');
    	return redirect('/admin/posts');
    }
}

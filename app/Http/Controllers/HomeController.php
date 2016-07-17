<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Article;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::latest('updated_at')->paginate(10);
        return view('home', compact('articles'));
    }

    public function showArticle($title)
    {
        $showArticle = Article::where('article_title', $title)->firstOrFail();
        $articles = Article::where('id', '!=', $showArticle->id)->where('created_at', '<', $showArticle->created_at)->latest('created_at')->take(5)->get();
        return view('article.showArticle', compact('showArticle', 'articles'));
    }

    public function storePost($id, Request $request)
    {
        $article = Article::findOrFail($id);
        $user_ip = getenv('REMOTE_ADDR');
        $geo = unserialize(file_get_contents("http://www.geoplugin.net/php.gp?ip=".$user_ip.""));
        $city = $geo["geoplugin_city"];
        $country = $geo["geoplugin_countryName"];
        $latitude = $geo["geoplugin_latitude"];
        $longitude = $geo["geoplugin_longitude"];

        $article->post()->create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'body' => $request->input('body'),
            'is_moderated' => true,
            'ip_user' => $user_ip,
            'browser_user' => $_SERVER['HTTP_USER_AGENT'],
            'country_user' => $country,
            'city_user' => $city,
            'latitude_user' => $latitude,
            'longitude_user' => $longitude,
            'checked_post' => false
            ]);
        flash()->success('Udało Ci się dodać komentarz, zostanie sprawdzony przez moderatora i zaakceptowany wg regulaminu.');
        return redirect('/article/'.$article->article_title.'');
    }
}

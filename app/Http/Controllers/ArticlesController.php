<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\Article;

class ArticlesController extends Controller
{
    public function index(){
        $posts = Article::orderBy('created_at', 'desc')->get();
        $data['posts'] = $posts;

        return view('articles.articles', $data);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;

class ArticleController extends Controller
{
    public function index($id){
            $post = Article::where('id', '=', $id)->firstOrFail();
            $data['post'] = $post;

            $recommended = Article::orderBy('id', 'desc')->where('id', '!=', $id)->take(3)->get();
            $data['recommended'] = $recommended;

            return view('article', $data);
    }
}

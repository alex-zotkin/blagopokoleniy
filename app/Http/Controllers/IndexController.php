<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\Article;

class IndexController extends Controller
{
    public function index(){
        $posts = Article::orderBy('created_at', 'desc')->take(3)->get();
        $data['posts'] = $posts;

        return view('index', $data);
    }


}

<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function create_article(){
        return view ('article.create');
    }
}

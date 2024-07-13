<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function home (){
        $articles = Article:: where('is_accepted' , true)->orderBy('created_at','desc')->take(3)->get();
        return view ('welcome' , compact('articles'));
    }
    public function categoryShow(Category $category){
        $articles = $category->articles->where('is_accepted' , true);
        return view('categoryShow', compact('category' , 'articles'));
    }

    // Prodotti show è la nostra index
    public function prodottiShow(Article $article){
        $articles = Article::where('is_accepted' , true)->orderBy('created_at','desc')->paginate(9);
        return view('prodottiShow', compact('articles'));
    }
    public function categoryDet(Article $article){
        return view('categoryDet' , compact('article'));
    }

    public function searchArticles(Request $request){
        $query = $request->input('query');
        $articles = Article::search($query)->where('is_accepted', true)->paginate(6);
        return view('article.searched', ['articles' => $articles, 'query' => $query]);
    }

    public function setLanguage($lang){
        session()->put('locale', $lang);
        return redirect()->back();
    }

}

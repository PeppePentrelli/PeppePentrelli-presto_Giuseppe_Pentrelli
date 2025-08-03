<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Routing\Controllers\HasMiddleware;

class ArticleController extends Controller implements HasMiddleware
{

    // Funzione per creare articolo
    public function create()
    {
        return view('article.create');
    }

    // Funzione per visualizzare tutti gli articoli

    public function index()
    {
        $articles = Article::orderBy('created_at', 'desc')->paginate(8);
        return view('article.index', compact('articles'));
    }

    // Funzione per visualizzare il singolo articolo

    public function show(Article $article)
    {
    $articles = $article->category->articles()->where('id', '!=', $article->id)->get();
        return view('article.show', compact('article','articles'));
    }

        // Funzione per visualizzare gli articoli per categoria

    public function byCategory(Category $category)
    {

        return view('article.byCategory', ['articles' => $category->articles, 'category' => $category]);
    }

    // Funzione per i middleware

    public static function middleware(): array
    {
        return [
            new Middleware('auth', only: ['create']),
        ];
    }
}

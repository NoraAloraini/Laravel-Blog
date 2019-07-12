<?php

namespace App\Http\Controllers;

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
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {



    $articles = Article::where('owner_id', auth()->id())->get();

        return view('home', compact('articles'));
    }
}

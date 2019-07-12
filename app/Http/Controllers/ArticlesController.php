<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Article;
use App\Tag;


class ArticlesController extends Controller
{


     public function __construct()

   {

      $this->middleware('auth')->except('index','show');
   }


    public function index()

   {


   	$articles = Article::paginate(10);

   	return view('articles.index', compact('articles'));
   }



      public function show(Article $article)

   {

         // View count for article 
      $blogKey = 'blog_' . $article->id;
      if(!Session::has($blogKey)){
         $article->increment('view_count');
         Session::put($blogKey,1);
      }


      return view('articles.show', compact('article'));
   }


      public function create()

   {


      $tags = Tag::all();
   	return view('articles.create',compact('tags'));
   }


      public function store()

   {


      $attributes = $this->validateArticle();

      $attributes['view_count'] = 0;

      $attributes['owner_id'] = auth()->id();

      $article = Article::create($attributes);

      $article -> tags()->sync(request()->tags);

      // dd($article);

      
   	return redirect('/home');



   }


      public function edit(Article $article)

   {

      $tags = Tag::all();

      abort_if($article->owner_id !== auth()->id(), 403);

      return view('articles.edit', compact('article','tags'));




   }
      public function update(Article $article)

   {


      abort_if($article->owner_id !== auth()->id(), 403);

      $article->update($this->validateArticle());
      $article -> tags()->sync(request()->tags);

   


      return redirect('/home');




   }

      public function destroy(Article $article)

   {

      $article->delete();

      abort_if($article->owner_id !== auth()->id(), 403);

    

      return redirect('/home');



   }

        
      /**** Function of Vaidation ****/

      protected function validateArticle(){


         return request()->validate([

            'title' => 'required|min:3',
            'content' => 'required|min:3',

                     ]);

               }


    

}

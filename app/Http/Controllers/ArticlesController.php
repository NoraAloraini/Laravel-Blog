<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Article;
use App\Tag;
use App\Http\Requests\StoreArticleRequest;



class ArticlesController extends Controller
{


     public function __construct()

   {

      $this->middleware('auth')->except('index','show');
   }


    public function index()

   {


   	$articles = Article::with('comments','tags', 'user')->withCount('comments')->paginate(10);

   	return view('articles.index', compact('articles'));
   }



      public function show(Article $article)

   {


      $article->load('comments');

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


      $tags = Tag::cursor();

   	return view('articles.create',compact('tags'));
   }


      public function store(StoreArticleRequest $request)

   {

      $article = $request->user()->article()->create([
         'title' => $request->title,
         'content' => $request->content

      ]);

      $tags = collect(explode(',',$request->tag))->map(function($tag){
         return Tag::firstOrCreate(['tag'=>$tag])->id;
      })->toArray();

      $article -> tags()->sync(request()->tags);

      
   	return redirect()->route('home');



   }


      public function edit(Article $article)

   {

      $tags = Tag::cursor();

      $this->authorize('update',$article);
      return view('articles.edit', compact('article','tags'));




   }
      public function update(Article $article)

   {


      $this->authorize('update',$article);

      $article->update($this->validateArticle());
      $article -> tags()->sync(request()->tags);

   


            return redirect()->route('home')->with('success', 'Login Successfully!');




   }

      public function destroy(Article $article)

   {

      $this->authorize('delete',$article);

      $article->delete();


    

      return redirect()->route('home');



   }


      /**** Function of Vaidation ****/
      protected function validateArticle(){
         return request()->validate([
            'title' => 'required|min:3',
            'content' => 'required|min:3',
                     ]);
               }

    

}

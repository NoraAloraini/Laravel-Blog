<?php

namespace App\Http\Controllers;
use App\Article;
use App\Comment;

use App\Mail\NewCommentCreated;
use Illuminate\Support\Facades\Mail;

use Illuminate\Http\Request;

class CommentsController extends Controller
{
       /**** Add comment ****/
   
	public function store(Article $article)

   {


   		$attributes = request()->validate(['comment' => 'required|min:5|max:400']);
   		
      	$attributes['owner_id'] = auth()->id();

   		$article->addComment($attributes);
   		Mail::to($article->owner->email)->send(
   		new NewCommentCreated($article));



   	return back();


   }
}

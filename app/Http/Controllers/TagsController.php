<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Tag;


class TagsController extends Controller
{
    
      public function show(Tag $tag)

   {
   		$tag->load('articles.comments','articles.user','articles.tags');
   		
      return view('tags.show', compact('tag'));
   }
}

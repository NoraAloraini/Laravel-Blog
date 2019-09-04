@extends('layouts.app')


@section('content')


	{{-- show article --}}

   <h1 class="projectTitle" >Article Title:   {{ $article->title }}</h1>

               <a class="btn btn-info btn-sm" href="/articles/{{$article->id }}/edit"> Edit Article</a>

   <div style="margin:55px; " > 

		<p class="content" style="font-size: 20px;">{{$article->content}}</p>


	  	@foreach ($article ->tags as $tag )
			
			<a href="{{ route('tags.show', $tag->id)}}">
			<span>
				<i class="fa fa-tag">
					{{$tag -> tag}}
				</i>

			</span>
		</a>
			@endforeach 
		   
   <hr>

		{{-- comment list  --}}


		<h4> Comments : {{ $article -> comments ->count()}} </h4>


		<ul class="comments">
			@foreach ($article->comments as $comment)

			<li class="comment">
				<div class="clearfix">

					<h4>{{$comment-> created_at ->format(' F d,Y ')}}</h4>
					<p> {{$comment-> user->name}}  </p>
					<p>  </p>

				</div>

				<p>{{$comment -> comment}}</p>
		    </li>
			@endforeach

			 
	 
		</ul>


		{{-- comment Form  --}}

		<div class="panel panel-default">
			<div class="panel-heading">
				add your comment
			</div>
			<div class="panel-body">


			@guest

			<div class="alert alert-info"> please login to comment</div>
			@else
				<form method="POST" action="/articles/ {{ $article->id }}/comments" class="box">
			

		    @csrf

			<div class="form-group">
				
				<textarea name="comment" class="form-control" placeholder="Enter your comment" cols="30" rows="5" required></textarea> 
			</div>


		<div class="field">
		

			<div class="col-md-6" style="margin-top: 10px">
				
				<button type="submit" class="button is-link"> Add comment</button> 

			</div>

		</div>

		@include('errors')

		</form>
		@endguest
			</div>


		</div>


 	
 </div>

@endsection
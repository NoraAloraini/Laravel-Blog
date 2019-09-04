
@extends('layouts.app')


@section('content')

<div class="card" >


            <div class="card-header" style="font-size: 50px;justify-content: center;padding: 67px; font-weight: bold;">Welcome to Laravel Blog



            </div>

            {{-- Show all articles  --}}

	<div class="flex-container"style="margin-bottom: 25px;" >

    <div class="row justify-content-center">

		@foreach ($articles as $article)

		<div class="article-card">
			<div>

			<a href="/articles/{{$article->id}}">
			<h1 style="font-size: 20px; margin-bottom:30px ; ">{{ $article -> title}}
			</h1></a>
			       <p class="ArticleBody">
            {{ str_limit(strip_tags($article->content), 250) }}
            @if (strlen(strip_tags($article->content)) > 50)
              ... <a href="/articles/{{$article->id}}" class="btn btn-info btn-sm">Read More</a>
            @endif
        </p>

			<hr>
			<p class="fa fa-comment"> {{ $article -> comments_count }} Comments</p>
			<p >Author: {{ $article -> user -> name  }}</p>				<br>

			@foreach ($article ->tags as $tag )
			
			<a href="{{ route('tags.show', $tag->id)}}">
			<span>
				<i class="fa fa-tag">
					{{$tag -> tag}}
				</i>

			</span>
		</a>
			@endforeach 
			<p style="text-align: right;"> {{ date('F d,Y', strtotime($article->created_at))}} </p>

			<p class="fa fa-eye" style="text-align: right;"> {{$article->view_count}} </p>
		</div></div>
				@endforeach
		</div>


							{{-- pagination --}}

					 <nav class="justify-content-center d-flex">
						
						{{ $articles->links()}}

					</nav>
					
		</div>

		</div></div>




@endsection
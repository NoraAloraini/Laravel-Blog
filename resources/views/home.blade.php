
@extends('layouts.app')

@section('content')


 <div class="card-header" style="font-size: 30px;justify-content: left;padding: 40px; font-weight: bold;">
    Hello to Your Dashboard!


</div>
    <div class="card" >

            {{-- Show all articles that belongs to user --}}

    <div class="flex-container"style="margin-bottom: 25px;" >

    <div class="row justify-content-center">

        @foreach ($articles as $article)

        <div class="article-card" >
            <div>

                {{-- Article Title --}}
            <a href="/articles/{{$article->id}}">
            <h1 style="font-size: 20px; margin-bottom:30px ; ">{{ $article -> title}}
            </h1></a>


                {{-- Article Content --}}
            <p class="ArticleBody">
                {{ str_limit(strip_tags($article->content), 250) }}
                @if (strlen(strip_tags($article->content)) > 50)
                  ... <a href="/articles/{{$article->id}}" class="btn btn-info btn-sm">Read More</a>
                @endif
            </p>

            <hr>

            {{-- no. comments --}}
            <p class="fa fa-comment"> {{ $article -> comments ->count()}} Comments</p>

                {{-- Author --}}
            <p >Author: {{ $article -> user -> name  }}</p>                <br>


                {{-- loop of tags --}}

            @foreach ($article ->tags as $tag )
            
            <a href="{{ route('tags.show', $tag->id)}}">
            <span>
                <i class="fa fa-tag">
                    {{$tag -> tag}}
                </i>

            </span>
        </a>
            @endforeach 

                {{-- display date of created at --}}

            <p style="text-align: right;"> {{ date('F d,Y', strtotime($article->created_at))}} </p>

                {{-- button of Edit article --}}
            <a class="btn btn-info btn-sm" href="/articles/{{$article->id }}/edit"> Edit Article</a>

        </div>
        </div>
        @endforeach
                    </div>
            </div>
        </div>
    </div>





@endsection

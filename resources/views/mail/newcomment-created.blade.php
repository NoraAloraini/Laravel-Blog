@component('mail::message')
# New comment : {{ $article->title}}


@component('mail::button', ['url' => url('/articles/' . $article->id)])
View Comment

@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent

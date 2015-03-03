@extends('app')

@section('content')

    <h1>Articles</h1>

    <hr>

    @foreach($articles as $article)
        <article>
            <h2><a href="{{action('ArticlesController@show', [$article->id])}}"> {{ $article->title }}</a></h2>

            <div class="body">{{$article->excerpt}}<div>
        </article>
    @endforeach

@endsection
@stop
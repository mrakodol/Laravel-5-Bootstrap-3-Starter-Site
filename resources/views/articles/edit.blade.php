@extends('app')

@section('content')

    <h1>Edit an Article</h1>
    <hr>

    {!! Form::model($article, ['method' => 'PATCH', 'action' => ['ArticlesController@update', $article->id]]) !!}
        @include('articles._form', ['submitButtonText' => 'Update article'])
    {!! Form::close() !!}

    @include('errors.list')

@endsection
@stop
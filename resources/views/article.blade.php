

@extends('layouts.app')

@section('content')
    <h1>article</h1>
    <h3> {{ $post->content }} </h3>

    <hr>
    @forelse($post->comments as $comment)
        <div> {{ $comment->content }} / crée le {{ $comment->created_at->format('Y/m/d') }} </div>
    @empty
        <span> pas de commentaire pour ce poste </span>
    @endforelse
@endsection

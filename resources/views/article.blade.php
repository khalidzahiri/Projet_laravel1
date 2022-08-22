

@extends('layouts.app')

@section('content')
    <h1>{{ $post->content }} </h1>
    <span> {{ $post->image ? $post->image->path :"pas d'image" }}</span>

    <hr>
    @forelse($post->comments as $comment)
        <div> {{ $comment->content }} / crée le {{ $comment->created_at->format('Y/m/d') }} </div>
    @empty
        <span> pas de commentaire pour ce poste </span>
    @endforelse
    <hr>

    @forelse($post->tags as $tag)
        <span> {{ $tag->name }}</span>
    @empty
        <span> Aucun Tag pour ce poste </span>
    @endforelse
    <hr>

    <span>Nom de l'artiste de l'image : {{ $post->imageArtist->name}}</span>


@endsection

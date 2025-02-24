@extends('layouts.app')

@section('content')
    <div>
        Автор
        <a href="{{route("user",$post->user_id)}}">{{\App\Models\User::find($post->user_id)->name}}</a>
    </div>
    <div>{{$post->title}}</div>
    <div>{{$post->content}}</div>
    <div>{{$post->image}}</div>
@endsection

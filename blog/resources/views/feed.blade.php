@extends('layouts.app')

@section('content')
    @foreach($user->feedPosts() as $post)
        <a href="{{route('user',$post['user_id'])}}">{{\App\Models\User::find($post['user_id'])->name}}</a>
        <div>{{$post['title']}}</div>
        <div>{{$post['image']}}</div>
        <div>{{$post['content']}}</div>
        <br>
    @endforeach
@endsection

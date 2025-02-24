@extends('layouts.app')

@section('content')
    <div>{{$user->name}}</div>
    <br>
    @if(Auth::id()!=$user->id)
        @if($user->isSub(\Illuminate\Support\Facades\Auth::id()))
            <form action="{{ route('unsubscribe', $user) }}" method="POST">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger">Отписаться</button>
            </form>
        @else
            <form action="{{ route('subscribe', $user) }}" method="POST">
                @csrf
                <button class="btn btn-success">Подписаться</button>
            </form>
        @endif
    @endif

    <div>
        <a href="{{route("subscriptions",['id'=>$user->id])}}">ПОДПИСКИ</a>
    </div>
    <div>
        <a href="{{route("subscribers",['id'=>$user->id])}}">ПОДПИСЧИКИ</a>

    </div>
    @foreach(array_reverse($user->posts()->get()->all()) as $post)
        <div>{{$user->name}}</div>
        <div>{{$post->title}}</div>
        <div>{{$post->image}}</div>
        <div>{{$post->content}}</div>
        <br>
    @endforeach
@endsection

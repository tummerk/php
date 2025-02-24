@extends('layouts.app')

@section('content')
    @foreach($user->subscribers as $subscriber)
        <a href="{{route('user',$subscriber->id)}}">{{$subscriber->name}}</a>
    @endforeach
@endsection

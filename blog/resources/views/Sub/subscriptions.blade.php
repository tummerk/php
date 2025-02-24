@extends('layouts.app')

@section('content')
    @foreach($user->subscriptions as $subscription)
        <a href="{{route('user',$subscription->id)}}">{{$subscription->name}}</a>
    @endforeach
@endsection

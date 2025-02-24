@extends('layouts.app')

@section('content')
    @foreach($user->notifications as $notification)
        @switch($notification->category_id)
            @case(1)
                <div>{{"На вас подписался "}}
                    <a href="{{route("user",$notification->people_id)}}">{{\App\Models\User::find($notification->people_id)->name}}</a>
                </div>
                @break
            @case(2)
                <div>У пользователя
                    <a href="{{route("user",$notification->people_id)}}"><?php echo \App\Models\User::find($notification->people_id)->name?></a>
                    новая <a href="{{route("post.show",$notification->post_id)}}">запись</a>
                </div>
                @break
        @endswitch
    @endforeach
@endsection

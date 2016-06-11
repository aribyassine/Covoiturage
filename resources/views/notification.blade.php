@extends('app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="list-group">
                @foreach($notifications as $notification)

                    @if($notification->vu)
                        <a href="{{$notification->url}}" class="list-group-item">
                            <h4 class="list-group-item-heading">{{$notification->contenu}}</h4>
                            <p class="list-group-item-text">{{
                            Carbon\Carbon::createFromTimestamp(strtotime($notification->created_at))->diffForHumans()
                            }}</p>
                        </a>
                    @else
                        <a href="{{route('notificationVu',$notification->id)}}" class="list-group-item active">
                            <h4 class="list-group-item-heading">{{$notification->contenu}}</h4>
                            <p class="list-group-item-text">{{
                            Carbon\Carbon::createFromTimestamp(strtotime($notification->created_at))->diffForHumans()
                            }}</p>
                        </a>
                    @endif

                @endforeach
            </div>
        </div>
    </div>
</div>

@endsection
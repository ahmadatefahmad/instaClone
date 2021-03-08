@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-3 p-5">
            <img src="{{ $user->profile->profileImage() }}" style="height:160px; width:160px" class="rounded-circle">
        </div>
        <div class="col-9 pt-5">
            <div class="d-flex justify-content-between align-items-baseline">
                <h1>{{ $user->username}}</h1>
                <follow-button user-id="{{ $user->id }}" follows="{{ $follows }}" />
                @can('update',$user->profile)
                    <a href="/post/create">Add New Post</a>
                @endcan
            </div>
            @can('update',$user->profile)
                <a href="/profile/{{ $user->id }}/edit">Edit Profile</a>
            @endcan
            <div class="d-flex">
                <div class="pr-5"><strong>{{ $user->posts->count() }}</strong> Posts</div>
                <div class="pr-5"><strong>{{ $user->profile->followers->count()}}</strong> Followers</div>
                <div class="pr-5"><strong>{{ $user->following->count()}}</strong> Following</div>
            </div>
            <div class="pt-4">{{ $user->profile->title ?? '' }}</div>
            <div class="div">{{ $user->profile->description ?? '' }} </div>
            
            <div><a href="www.freecodecampe.org">{{ $user->profile->url ?? ''}}</a></div>
        </div>
    </div>

    <div class="row pt-3">
        @foreach($user->posts as $post)
        <div class="col-4 pb-4">
            <a href="/post/{{ $post->id }}">
                <img src="/storage/{{ $post->image  }}"  class="w-100">
            </a>
        </div>
        @endforeach
    </div>
</div>
@endsection

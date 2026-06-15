@extends('layouts.layouts')
@section('content')
    @if(session()->has('message_update'))
        <nav class="navbar navbar-light bg-success">
            <div class="container-fluid">
                <span class="navbar-brand mb-0 h1 ">{{session()->get('message')}}</span>
            </div>
        </nav>
    @endif
    @if(session()->has('message_delete'))
        <nav class="navbar navbar-light bg-primary">
            <div class="container-fluid">
                <span class="navbar-brand mb-0 h1 ">{{session()->get('message_delete')}}</span>
            </div>
        </nav>
    @endif
    @if(session()->has('message_create'))
        <nav class="navbar navbar-light bg-info">
            <div class="container-fluid">
                <span class="navbar-brand mb-0 h1 ">{{session()->get('message_create')}}</span>
            </div>
        </nav>
    @endif
<div class="container ">
    <h1 class="row justify-content-center text-uppercase pt-2">all posts</h1>
    @foreach ($post as $posts)
    <div class="container ">
        <div class="row p-2 ">
            <div class="col">
                <img style="height:400px;width:100%" class=" img-fluid rounded" src="{{asset('uploads/Post/'.$posts->image)}}"alt="..."><br>
            </div>
            <div class="col d-flex flex-column justify-content-between">
                <h2 class=" d-flex flex-row justify-content-center ">{{$posts->title}}</h2>
                <p class="">{{$posts->descraption}}</p>
                <p>WRITER:{{$posts->user->name}}</p>
                <p>UPDATED:{{ date( 'd-m-y ' , strtotime($posts->updated_at)) }}</p>
                <div class="d-flex flex-row justify-content-around py-3">
                    <a href="{{route('posts.delete',$posts->id)}}" class="@if((!Auth::guest()) && ($posts->user->name==Auth::user()->name)) @else d-none @endif">Delete</a>
                    <a href="{{route('posts.edit',$posts->id)}}" class="@if((!Auth::guest()) && ($posts->user->name==Auth::user()->name)) @else d-none @endif">update</a>
                </div>    
            </div>
        </div>
    </div>
    @endforeach
    <div class="d-grid gap-2 p-3">
        <a href="{{route('posts.create')}}" class="btn btn-primary @if(!Auth::guest()) @else d-none @endif" type="button">Create New Post</a>
    </div>
</div>
@endsection




















<!--
<div class="container p-2 bg-white text-center ">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h1>Posts</h1>
                </div>
                <div class="card-body ">
                    <div class="alert alert-success " role="alert">
                        <p><h1>all posts</h1></p>
                        @foreach ($post as $posts)
                        <div class="m-3">
                            <div class="card container" style="width: 18rem;" >
                                <div class="card-body">
                                    <img src="{{asset('uploads/Post/'.$posts->image)}}" class="card-img-top" alt="..."><br>
                                    <p><h3 class="card-text">WRITER:{{$posts->user->name}}</h3></p>
                                    <h5 class="card-title text-start">{{$posts->title}}</h5>
                                    <p class="card-text text-start">{{$posts->descraption}}</p>
                                    <a href="{{route('posts.delete',$posts->id)}}" class="@if(!Auth::guest()) card-link @else d-none @endif">Delete</a>
                                    <a href="{{route('posts.edit',$posts->id)}}" class="@if(!Auth::guest()) card-link @else d-none @endif">update</a>
                                </div>
                            </div>
                        </div>                      
                        @endforeach        
                    </div>
                </div>
            </div>
            <div class="d-grid gap-2">
                <a href="{{route('posts.create')}}" class="btn btn-primary" type="button">Create New Post</a>
            </div>
        </div>
    </div>
</div>
-->
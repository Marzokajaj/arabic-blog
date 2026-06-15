@extends('layouts.layouts')
@section('content')
<div class="container">
    @foreach($post as $posts)
        <form action="{{ route('posts.update' , $posts)}}" method="POST"  enctype="multipart/form-data"> 
            @csrf
            @method("PUT")
                <div class="mb-3">
                    <label class="form-label">Title</label>
                    <input type="text" name="title" id="title" class="form-control" value="{{$posts->title}}">
                </div>
                <div class="mb-3">
                    <label class="form-label">Descraption</label>
                    <textarea class="form-control" name="descraption" id="descraption" rows="3">{{$posts->descraption}}</textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label">Image</label>
                    <img src="{{asset('uploads/Post/'.$posts->image)}}" class="card-img-top" alt="..."><br>
                    <input type="file" name="image" id="image" class="form-control" value="{{$posts->image}}">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    @endforeach
</div>
@endsection
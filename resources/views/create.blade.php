@extends('layouts.layouts')
@section('content')

<div class="container">
    <form method="POST" action ="{{ route('posts.store') }}" enctype="multipart/form-data"> 
        @csrf
        <div class="mb-3">
            <label class="form-label">Title</label>
            <input type="text" name="title" id="title" class="form-control">
        </div>
        <div class="mb-3">
            <label class="form-label">Descraption</label>
            <textarea class="form-control" name="descraption" id="descraption" rows="3"></textarea>

        </div>
        <div class="mb-3">
            <label class="form-label">Image</label>
            <input type="file" name="image" id="image" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection
@extends('Templates.app')

@section('content')

<h1 class="mb-4 mt-5">Update</h1>



    <form action="/posts/{{$post->id}}" method="POST"  enctype="multipart/form-data">

        @csrf
        @method('PUT')

        <div class="form-group">
          <label>Title</label>
          <input name="title" type="text" class="form-control" value="{{$post->title}}">
          @error('title')
          <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label>Body</label>
            <textarea class="form-control" name="body" id="" cols="30" rows="10">
               {{$post->body}}
            </textarea>
            @error('body')
          <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
    

        <div class="form-group">
          <input type="file" name="image">
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
      </form>


@endsection
@extends('Templates.app')

@section('content')

<h1 class="mb-4 mt-5">Create</h1>

@if (session('success'))
    <div class="alert alert-success">
        {{session('success')}}
    </div>
@endif

    <form action="/posts" method="POST" enctype="multipart/form-data">

        @csrf

        <div class="form-group">
          <label>Title</label>
          <input name="title" type="text" class="form-control">
          @error('title')
          <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label>Body</label>
            <textarea class="form-control" name="body" id="" cols="30" rows="10"></textarea>
            @error('body')
          <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
          <input type="file" name="image">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>


@endsection
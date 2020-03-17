@extends('Templates.app')

@section('content')

@if (session('success'))
    <div class="alert alert-success">
        {{session('success')}}
    </div>
@endif

@if (session('delete'))
    <div class="alert alert-danger">
        {{session('delete')}}
    </div>
@endif

<h1 class="mb-4 mt-5">Posts</h1>

    @if (count($posts) > 0)
     
        @foreach ($posts as $item)

            <div class="card w-75 mb-5">
                <div class="card-body">
                <img class="card-img-top" src="{{asset('storage/'.$item->image)}}" alt="">
                  <h5 class="card-title">{{$item->title}}</h5>
                  <p class="card-text">{{$item->body}}</p>
                  <a href="/posts/{{$item->id}}" class="btn btn-primary">View Post</a>
                </div>
            </div>

        @endforeach

    {{$posts->links()}}
    @else

        <p class="danger">No Posts Found</p>
    @endif

@endsection
@extends('Templates.app') 

@section('content')

<h1 class="mb-4 mt-5">Posts</h1>

    @if (count($posts) > 0)
     
        @foreach ($posts as $item)

            <div class="card w-75 mb-5">
                <div class="card-body">
                  <h5 class="card-title">{{$item->title}}</h5>
                  <p class="card-text">{{$item->body}}</p>
                  <a href="/posts/{{$item->id}}" class="btn btn-primary">View Post</a>
                </div>
            </div>

        @endforeach

  
    @else

        <p class="danger">No Posts Found</p>
    @endif
@endsection
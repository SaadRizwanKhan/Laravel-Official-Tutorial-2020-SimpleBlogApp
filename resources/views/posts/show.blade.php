@extends('Templates.app')

@section('content')

<h1 class="mb-4 mt-5">{{$post->title}}</h1>
            <div class="card w-75 mb-5">
                <div class="card-body">
                  <img class="card-img-top" src="{{asset('storage/'.$post->image)}}" alt="">
                    <h5 class="card-title">{{$post->created_at}}</h5>
                  <p class="card-text">{{$post->body}}</p>
                </div>
              </div>

              @if(Auth::check() && Auth::id() == $post->user_id )
              <div class="container">
                <div class="row">

                
                       <a href="/posts/{{$post->id}}/edit" class="btn btn-default btn-success mr-4">Edit Post</a>

                       <form action="/posts/{{$post->id}}" method="POST">
                         @csrf
                         @method('DELETE')

                         <button type="submit" class="btn btn-default btn-danger">Delete</button>

                       </form>
              </div>
            </div>
            @endif

@endsection
@extends('layouts.app')

@section('content')


<div class="container">
    <h1>Posts</h1>
    <a href="/admin/posts/create" class="btn btn-info">Create Post </a>


    <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Title</th>
            <th scope="col">Description</th>
            <th scope="col">Posted by</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($posts as $post)

                <tr>
                    <td> {{ $post->id }} </td>
                    <td> {{ $post->title }} </td>
                    <td> {{ $post->description }} </td>
                    <td> {{ $post->user->name }} </td>
                    <td><a href="/admin/posts/{{ $post->id}}" class="btn btn-sm btn-info">View</a> 
                         <a href="/admin/posts/{{ $post->id}}/edit" class="btn  btn-sm btn-warning">Edit</a>
                         <form action="/admin/posts/{{$post->id}}" method="POST">
                            @method('DELETE')
                            @csrf

                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                        </form>
                        
                        
                    </td>
                       
                </tr>
                
            @endforeach
        
        </tbody>
</div>
    
@endsection
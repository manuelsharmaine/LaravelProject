@extends('layouts.app')

@section('content')
<div class="container">
    
    <div class="card">
        <div class="card-header text-center">
                {{$post->title}}
        </div>

        <div class="card-body text-center">
            @if (isset($post->photo))
            <div>
                <img width="50%" class="center" src="{{ asset('/storage/img/'.$post->photo) }}">
            </div>
            @endif
         

            {{$post->description}}
        </div>
    </div>

    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Share Post
      </button>
</div>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">        
                <form action="/admin/share-post/{{$post->id}}" method="POST">
                    @csrf
                    <input type="email" class="form-control" name="email" placeholder="Enter Email">
                    <input type="submit" class="btn btn-success" value="Submit">
                </form>

        </div>
       
      </div>
    </div>
  </div>
    
@endsection
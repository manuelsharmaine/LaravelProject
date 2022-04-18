@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                Edit Post
            </div>
            <div class="card-body">
                <form action="/admin/posts/{{$post->id}}" method="POST">
                    @csrf
                    @method('PATCH')
                    <div class="mb-3">
                        <label class="form-label">Title</label>
                        <input type="text" value="{{$post->title}}" name="title" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Description</label>
                        <textarea name="description" id="" cols="30" rows="10" class="form-control">{{$post->description}}</textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Status</label>
                         <input type="checkbox" name="status"> 
                    </div>

                    <button type="submit" class="btn btn-success">Update</button>

                </form>


            </div>
        </div>
    </div>
@endsection
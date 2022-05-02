@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                Create Post
            </div>
            <div class="card-body">
                <form action="/admin/posts" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Title</label>
                        <input type="text" value="{{old('title')}}" name="title" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Featured Image</label>
                        <input type="file" name="photo" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Description</label>
                        <textarea name="description" id="" cols="30" rows="10" class="form-control"></textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Status</label>
                     <input type="checkbox" name="status"> 
                    </div>

                    <button type="submit" class="btn btn-success">Save</button>

                </form>


            </div>
        </div>
    </div>
@endsection
@extends('layouts.app')

@section('content')
<div class="container">
    
    <div class="card">
        <div class="card-header text-center">
                {{$post->title}}
        </div>

        <div class="card-body">
            {{$post->description}}
        </div>
    </div>
</div>
    
@endsection
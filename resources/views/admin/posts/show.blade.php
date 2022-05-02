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
</div>
    
@endsection
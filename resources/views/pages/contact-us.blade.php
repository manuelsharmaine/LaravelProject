@extends('layouts.master')

@section('content')

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif



@if(session('status'))
    <div class="alert alert-success">   
        {{ session('status') }}
    </div>
@endif

<div class="card">
    <div class="card-header">
      Contact Us Page
    </div>
    <div class="card-body">
        <form method="POST" action="/contacts">
            @csrf
            {{-- <input type="hidden" name="_tokken" value="{{csrf_token()}}"> --}}
            <div class="mb-3">
                <label for="exampleFormControlInput0" class="form-label">Fullname</label>
                <input required type="text" name="fullname" class="form-control" id="exampleFormControlInput0" placeholder="John Doe" value="{{ old('fullname') }}">
              </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Email address</label>
                <input required type="email" name="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com" value="{{ old('email') }}">
              </div>
              <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Mesage</label>
                <textarea name="message" class="form-control" id="exampleFormControlTextarea1" rows="3">{{ old('message') }}</textarea>
              </div>
              <button type="submit" class="btn btn-success" value="Submit"> Submit </button>
        </form>
    </div>
</div>

@endsection
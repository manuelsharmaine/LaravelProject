@extends('layouts.master')


@section('css')
    <style>
        body{
            background-color: aqua;
        }
    </style>
@endsection


@section('content')
    <div class="card">
        <div class="card-header">
          About Page
        </div>
        <div class="card-body">
            @auth
                Hello,  {{ $name }} - {{ $email }}
            @endauth

            @guest
                Welcome to our Page
            @endguest
                
            {{-- @isset($record)
                
            @endisset

            @empty($record)
                
            @endempty --}}
             <p>List of Available Cars </p>       
                @if(count($cars))
                    <ul>
                        @foreach($cars as $car)
                            <li> {{ $car }} </li>
                        @endforeach
                    </ul>
                @else 
                        No Data availble
                @endif

            {!!  $data !!}

        </div>
    </div>
    
@endsection

@section('script')
    <script>
        var carList = @json($cars);

        console.log(carList);
    </script>
@endsection
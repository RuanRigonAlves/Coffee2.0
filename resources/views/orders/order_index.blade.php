@extends('layouts.app')

@section('title', 'My Orders')

@section('content')

    <div>
        @foreach ($orders as $product)
            <p>{{ $product }}</p>
        @endforeach
    </div>

@endsection

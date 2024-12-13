@extends('layouts.app')
@section('content')
    <style>
        .test {
            height: 100vh;
        }
    </style>
    <div class="flex items-center justify-center h-screen bg-center bg-no-repeat bg-cover"
        style="background-image: url('{{ asset('image/bgbrookes1.jpg') }}'); background-size: contain;">
    </div>
@endsection

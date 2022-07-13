@extends('layouts.app')

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Test</li>
        </ol>
    </nav>
    <div class="card">
        <div class="card-body">
            <div class="">
                <p class="mb-0">This is test view</p>
            </div>
        </div>
    </div>

@endsection

@extends('layouts.app')

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
            <li class="breadcrumb-item active">Post</li>
            <li class="breadcrumb-item active" aria-current="page">Post List</li>
        </ol>
    </nav>

    <div class="card">
        <div class="card-body">
            <p class="mb-0">This is Post List</p>
        </div>
    </div>
@endsection

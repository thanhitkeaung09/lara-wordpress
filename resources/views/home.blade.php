@extends('layouts.app')

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item" aria-current="page"><a href="{{ route('home') }} ">Home</a></li>
        </ol>
    </nav>

    <div class="card">
        <div class="card-body">
            <div class="">
                <p class="mb-0">This is home</p>
            </div>

            <div class="">
                {{\Illuminate\Support\Facades\Auth::user()}}
            </div>
        </div>
    </div>
@endsection

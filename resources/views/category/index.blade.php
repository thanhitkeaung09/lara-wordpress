@extends('layouts.app')
@section('content')
    <nav aria-label="breadcrumb">

        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
            <li class="breadcrumb-item active" >Category</li>
            <li class="breadcrumb-item active" aria-current="page">Category List</li>
        </ol>
    </nav>

    <div class="card">
        <div class="card-body">
            <div class="">
                <h4>Category List</h4>
                <hr>
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Control</th>
                            <th>Created</th>
                        </tr>
                    </thead>

                    <tbody>
                     @forelse( $categories as $category )
                        <tr class="">
                            <td>{{$category->id}}</td>
                            <td>
                                {{ $category->title }} <br>
                                <span class="badge bg-secondary">{{$category->slug}}</span>
                            </td>
                            <td class="">

                                <a href="{{route('category.edit',$category->id)}}" class="btn btn-outline-dark btn-sm">
                                    <i class="bi bi-pencil"></i>
                                </a>

                                <form action="{{route('category.destroy',$category->id)}}" class="d-inline-block" method="post">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-outline-secondary btn-sm">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>

                            </td>
                            <td>
                                <p class="mb-0 text-black-50"><i class="bi bi-calendar"></i> {{ $category->created_at->format("d m Y") }}</p>
                                <p class="mb-0 text-black-50"><i class="bi bi-clock"></i>{{ $category->created_at->format("h : m A") }}</p>
                            </td>
                        </tr>
                     @empty
                         <p>There is no category yet</p>
                     @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>



@endsection

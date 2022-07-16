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
            <div class="">
                <h4>Post List</h4>
                <hr>
                <div class="d-flex justify-content-between">
                    <div class="">

                        @if(request('keyword'))

                          <div class="d-flex">
                              <p class="me-3">Search By : {{request('keyword')}}</p>
                              <a href="{{route('post.index')}} ">
                                  <i class="bi bi-trash3"></i>
                              </a>
                          </div>

                            @endif

                    </div>
                    <form action="{{route('post.index')}}" method="get" class="">

                      <div class="input-group">
                          <input type="text" class="form-control" name="keyword" required value="{{old("keyword")}}">
                          <button class="btn btn-primary">
                              <i class="bi bi-search"></i>
                          </button>
                      </div>
                    </form>
                </div>
                <table class="table">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Category</th>
                        <th>Owner</th>
                        <th>Control</th>
                        <th>Created</th>
                    </tr>
                    </thead>

                    <tbody>
                    @forelse( $posts as $post )
                        <tr class="">
                            <td>{{$post->id}}</td>
                            <td class="w-25">
                                {{ $post->title }} <br>

                            </td>
                            <td>{{\App\Models\Category::find($post->category_id)->title}}</td>
                            <td>{{\App\Models\User::find($post->user_id)->name}}</td>
                            <td class="">


                                <a href="{{route('post.show',$post->id)}}" class="btn btn-outline-dark btn-sm">
                                    <i class="bi bi-info-circle"></i>
                                </a>

                                <a href="{{route('post.edit',$post->id)}}" class="btn btn-outline-dark btn-sm">
                                    <i class="bi bi-pencil"></i>
                                </a>

                                <form action="{{route('post.destroy',$post->id)}}" class="d-inline-block" method="post">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-outline-secondary btn-sm">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>

                            </td>
                            <td>
                                <p class="mb-0 text-black-50"><i class="bi bi-calendar"></i> {{ $post->created_at->format("d m Y") }}</p>
                                <p class="mb-0 text-black-50"><i class="bi bi-clock"></i>{{ $post->created_at->format("h : m A") }}</p>
                            </td>
                        </tr>

                    @empty
                        <tr>
                            <td colspan="6" class="text-center">There is no post yet</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>



                <div class="">
                    {{$posts->links()}}
                </div>
            </div>
        </div>
    </div>
@endsection

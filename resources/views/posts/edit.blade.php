@extends('layouts.app')
@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
            <li class="breadcrumb-item active">Post</li>
            <li class="breadcrumb-item active" aria-current="page">Create Post</li>
        </ol>
    </nav>

    <div class="card">
        <div class="card-body">
            <div class="">
                <h4 class="mb-0" >Edit New Post</h4>
                <br>
                <form action="{{route('post.update',$post->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="mb-3">
                        <label for="title" class="form-label">Post Title</label>
                        <input type="text" name="title" value="{{old('title',$post->title)}}" id="title" class="form-control @error('title') is-invalid @enderror">
                        @error('title')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="category" class="form-label">Post Category</label>
                        <select type="text" name="category"  id="category" class="form-select @error('category') is-invalid @enderror">
                            @foreach(\App\Models\Category::all() as $category)
                                <option value="{{$category->id}}" {{$category->id == old('category',$post->category) ? 'selected' : ''}}>{{$category->title}}</option>
                            @endforeach
                        </select>
                        @error('category')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">Post Description</label>
                        <textarea type="text" name="description" rows="10" id="description" class="form-control @error('description') is-invalid @enderror">{{old('description',$post->description)}}</textarea>
                        @error('description')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>

                    <div class="d-flex justify-content-between align-items-center">
                        <div class="">
                            <label for="featured_image" class="form-label">Post Title</label>
                            <input type="file" name="featured_image" value="{{old('featured_image')}}" id="featured_image" class="form-control @error('featured_image') is-invalid @enderror">
                            @error('featured_image')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="">
                            <button class="btn btn-lg btn-primary" >Update Post</button>
                        </div>

                    </div>
                </form>
            </div>
            @isset($post->featured_image)
                <img src="{{asset('storage/'.$post->featured_image)}}" alt="">
            @endisset



        </div>
    </div>
@endsection

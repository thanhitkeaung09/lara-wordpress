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
                @if(session('status'))
                    {{session('status')}}
                @endif

                  @push('script')
                        <script type="module" src="{{}}">
                            window.run();
                        </script>
                    @endpush

{{--              @push('script')--}}
{{--                        <script src="/resources/js/app.js">--}}
{{--                            @if(session('status'))--}}
{{--                                {{session('status')}}--}}
{{--                                console.log(showToast())--}}
{{--                            @endif--}}
{{--                        </script>--}}
{{--                    @endpush--}}

{{--                    @push('script')--}}

{{--                        <script src="./resources/js/app.js" >--}}
{{--                        </script>--}}

{{--                    @endpush--}}

            </div>
        </div>
    </div>

@endsection

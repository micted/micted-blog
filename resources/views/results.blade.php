@extends('layouts.frontend')
@section('content')

<div class="stunning-header stunning-header-bg-lightviolet">
    <div class="stunning-header-content">
        <h1 class="stunning-header-title">Search results:</h1>
    </div>
</div>

<!-- Post Details -->

<div class="container">
    <div class="row medium-padding120">
        <main class="main">
            
            <div class="row">

                    @if($posts->count()>0)
                        <div class="case-item-wrap">

                        @foreach($posts as $post)
                     
                            <div class="col-lg-4  col-md-4 col-sm-6 col-xs-12">
                                <div class="case-item">
                                    <div class="case-item__thumb mouseover poster-3d lightbox shadow animation-disabled" data-offset="5">
                                        <img src="" alt="our case">
                                    </div>
                                    <a href="#">
                                    <h6 class="case-item__title">{{ $post->title }}</h6></a>
                                </div>
                            </div>
                        @endforeach

                      </div>

                    @else

                    <h1 class="text-center">
                        No results found.
                    </h1>

                    @endif
            </div>
        </main>
                        </div>
            </div>

@endsection
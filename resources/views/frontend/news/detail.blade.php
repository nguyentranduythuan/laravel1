@extends('frontend.index')

@section('content')
<div class="single-blog-post featured-post single-post">
    <div class="post-thumb">
        <a href="#"><img src="{{-- {{ asset('storage/app/'.$detail->image) }} --}}" alt=""></a>
    </div>
    <div class="post-data">
        <a href="#" class="post-catagory"></a>
        <a href="#" class="post-title">
            <h6>{!!$detail->intro!!}</h6>
        </a>
        <div class="post-meta">
            <p class="post-author">By <a href="#">{!!$detail->author!!}</a></p>
            <p>{!!$detail->content!!}.</p>
            <a href="#" class="related--post"></a></p>
            <div class="newspaper-post-like d-flex align-items-center justify-content-between">
                <!-- Tags -->
                <div class="newspaper-tags d-flex">
                    <span>Tags:</span>
                    <ul class="d-flex">
                        <li><a href="#">finacial,</a></li>
                        <li><a href="#">politics,</a></li>
                        <li><a href="#">stock market</a></li>
                    </ul>
                </div>

                <!-- Post Like & Post Comment -->
                <div class="d-flex align-items-center post-like--comments">
                    <a href="#" class="post-like"><img src="{{ asset('public/frontend/img/core-img/like.png') }}" alt=""> <span>392</span></a>
                    <a href="#" class="post-comment"><img src="{{ asset('public/frontend/img/core-img/chat.png') }}" alt=""> <span>10</span></a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
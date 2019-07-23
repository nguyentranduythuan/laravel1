@extends('frontend.index')

@section('content')
@foreach($newsDetail as $news)
<div class="single-blog-post featured-post mb-30">
                            <div class="post-thumb">
                                <a href="#"><img src="{{ asset('storage/app/'.$news->image) }}" alt=""></a>
                            </div>
                            
                            <div class="post-data">
                                <a href="#" class="post-catagory"></a>
                                <a href="{{ url('detail/'.$news->slug) }}" class="post-title">
                                    <h6>{{$news->title}}</h6>
                                </a>
                                <div class="post-meta">
                                    <p class="post-author">By <a href="#">{{$news->author}}</a></p>
                                    <p class="post-excerp">{!!$news->intro!!}. </p>
                                    <!-- Post Like & Post Comment -->
                                    <div class="d-flex align-items-center">
                                        <a href="#" class="post-like"><img src="{{ asset('public/frontend/img/core-img/like.png') }}" alt=""> <span></span></a>
                                        <a href="#" class="post-comment"><img src="{{ asset('public/frontend/img/core-img/chat.png') }}" alt=""> <span></span></a>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
@endforeach
@endsection
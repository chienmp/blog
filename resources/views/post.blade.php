@extends('layouts.frontend.app')

@section('title')
    {{ $post->title }}
@endsection
@push('css')
<link href="{{ asset('assets/frontend/css/single-post/responsive.css') }}" rel="stylesheet">
<link href="{{ asset('assets/frontend/css/single-post/styles.css') }}" rel="stylesheet">
@endpush

@section('content')
    <div class="header-bg">
    </div>

    <section class="post-area section">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12 no-right-padding">
                    <div class="main-post">
                        <div class="blog-post-inner">
                            <div class="post-info">
                                <div class="left-area">
                                    <a class="avatar" href="#"><img src="{{ asset('photo-1-15824327621401217058744.webp') }}" alt="Profile Image"></a>
                                </div>
                                <div class="middle-area">
                                    <a class="name" href="#"><b>Author: PMChien</b></a>
                                    <h6 class="date">on {{ $post->created_at }}</h6>
                                </div>
                            </div><!-- post-info -->
                            <h3 class="title">
                                <a href="#">
                                    <b>{{ $post->title }}</b>
                                </a>
                            </h3>
                            <div class="para">
                                 {!! html_entity_decode($post->body) !!}
                            </div>
                            <ul class="tags">
                                @foreach ($post->tags as $tag)
                                    <li>
                                        <a href="#">{{ $tag->name }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div><!-- blog-post-inner -->
                        <div class="post-icon-area">
                            <ul class="post-icons">
                                <li>
                                    @guest
                                         <a href="{{ route('login') }}"><i class="far fa-heart"></i>{{ $post->favorite_to_users->count() }}</a>
                                    @else
                                          
                                        <div class="form-group">
                                            <input type="hidden" name="id" value="{{ $post->id }}">
                                        </div>
                                          <button class="btn btn-link save-data" data-url ={{ route('post.favorite', $post->id) }} ><i class="far fa-heart"></i></button>
                                          {{ $post->favorite_to_users()->count() }}
                                    @endguest
                                </li>
                            </ul>
                            <ul class="icons">
                                <li>SHARE : </li>
                                <li><a href="#"><i class="ion-social-facebook"></i></a></li>
                                <li><a href="#"><i class="ion-social-twitter"></i></a></li>
                                <li><a href="#"><i class="ion-social-instagram"></i></a></li>
                            </ul>
                        </div>
                    </div><!-- main-post -->
                </div><!-- col-lg-8 col-md-12 -->
                <div class="col-lg-4 col-md-12 no-left-padding">
                    <div class="single-post info-area">
                        <div class="sidebar-area about-area">
                            <h4 class="title"><b>{{ trans('about') }}</b></h4>
                            <p>This is the about me content</p>
                        </div>
                        <div class="tag-area">

                            <h4 class="title"><b>{{ trans('Categories') }}</b></h4>
                            <ul>
                                @foreach($post->categories as $category)
                                    <li>
                                        <a href="#">{{ $category->name }}</a>                               
                                    </li>
                                @endforeach
                            </ul>
                    </div>
                </div><!-- post-info-area -->
            </div><!-- col-lg-4 col-md-12 no-left-padding -->
        </div><!-- row -->
        </div><!-- container -->
    </section><!-- post-area -->
    <section class="recomended-area section">
        <div class="container">
            <div class="row">
                @foreach ($randomposts as $randompost)
                <div class="col-lg-4 col-md-6">
                    <div class="card h-100">
                        <div class="single-post post-style-1">
                            <div class="blog-image"><img src="{{ asset('images/signup-image.jpg') }}" alt="img"></div>
                            <a class="avatar" href="#"><img src="{{ asset('photo-1-15824327621401217058744.webp') }}" alt="Profile Image"></a>
                            <div class="blog-info">
                                <h4 class="title"><a href="{{ route('post',$randompost->id) }}"><b>{{ $randompost->title }}</b></a></h4>
                                <ul class="post-footer">
                                    <li>
                                        <a href="{{ route('post', $randompost->id) }}"><i class="ion-heart"></i>
                                            {{ $randompost->favorite_to_users->count() }}
                                        </a>
                                    </li>
                                    <li><a href="#"><i class="ion-chatbubble"></i>6</a></li>
                                    <li><a href="#"><i class="ion-eye"></i>{{ $randompost->view_count }}</a></li>
                                </ul>
                            </div><!-- blog-info -->
                        </div><!-- single-post -->
                    </div><!-- card -->
                </div><!-- col-lg-4 col-md-6 -->
                @endforeach
            </div><!-- row -->
        </div><!-- container -->
    </section>
    <section class="comment-section">
        <div class="container">
            <h4>
               <b>{{ trans_choice('post_comment', $post->view_count) }}</b>
            </h4>
            <div class="row">
                <div class="col-lg-8 col-md-12">
                    <div class="comment-form">
                        @guest
                            <p>{{ trans('comment_alert') }}. <a href="{{ route('login') }}">{{ trans('Login') }}</a></p>
                        @else
                            <form method="post" action="#">
                                @csrf
                                <div class="row">
                                    <div class="col-sm-12">
                                        <textarea name="comment" rows="2" class="text-area-messge form-control"
                                                  placeholder="{{ trans('enter_com') }}" aria-required="true" aria-invalid="false"></textarea >
                                    </div><!-- col-sm-12 -->
                                    <div class="col-sm-12">
                                        <button class="submit-btn" type="submit" id="form-submit"><b>{{ trans('submit_com') }}</b></button>
                                    </div><!-- col-sm-12 -->

                                </div><!-- row -->
                            </form>
                        @endguest
                    </div><!-- comment-form -->
                    {{-- <h4><b>Comments({{ $post->comments()->count() }})</b></h4> --}}
                    {{-- @if ($post->comments()->count() >0)
                        @foreach ($post->comments as $comment)
                            <div class="comments-area">
                                <div class="comment">
                                    <div class="post-info">
                                        <div class="left-area">
                                            <a class="avatar" href="#"><img src="{{ Storage::disk('public')->url('profile/'.$comment->user->image) }}" alt="Profile Image"></a>
                                        </div>
                                        <div class="middle-area">
                                            <a class="name" href="#"><b>{{ $comment->user->name }}</b></a>
                                            <h6 class="date">on {{ $comment->created_at->diffForHumans()}}</h6>
                                        </div>
                                    </div><!-- post-info -->
                                    <p>{{ $comment->comment }}</p>
                                </div>
                            </div><!-- comment-area -->
                        @endforeach
                        @else
                        <div class="commnets-area ">

                            <div class="comment">
                                <p>No Comment yet. Be the first :)</p>
                        </div>
                        </div>
                        @endif --}}
                </div><!-- col-lg-8 col-md-12 -->
            </div><!-- row -->
        </div><!-- container -->
    </section>
@endsection

@section('js')
    <script>
        $(document).on("click", ".save-data", function(params) {
            let url = $(this).data('url');
            console.log(url);
            $.ajax({
                url : url,
                type: "get",

                success:function(response){
                console.log(response);
                },
                error : function(params) {
                    alert(123);
                }
            })
        });
    </script>
@endsection 

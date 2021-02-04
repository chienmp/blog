@extends('layouts.frontend.app')

@section('title', 'Home')
    @push('css')
        <link href="{{ asset('assets/frontend/css/home/styles.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/frontend/css/home/responsive.css') }}" rel="stylesheet">
    @endpush

@section('content')
    <div class="main-slider">
        <div class="swiper-container position-static" data-slide-effect="slide" data-autoheight="false"
            data-swiper-speed="500" data-swiper-autoplay="10000" data-swiper-margin="0" data-swiper-slides-per-view="4"
            data-swiper-breakpoints="true" data-swiper-loop="true">
            <div class="swiper-wrapper">

                @forelse($categories as $category)
                    <div class="swiper-slide">
                        <a class="slider-category" href="#">
                            <div class="blog-image"><img width="333px" height="450px"
                                    src="{{ asset('storage/category/' . $category->image) }}" alt="{{ $category->name }}">
                            </div>
                            <div class="category">
                                <div class="display-table center-text">
                                    <div class="display-table-cell">
                                        <h3><b>{{ $category->name }}</b></h3>
                                    </div>
                                </div>
                            </div>

                        </a>
                    </div><!-- swiper-slide -->
                @empty
                    <div class="swiper-slide">
                        <strong>{{ trans('no_data') }}</strong>
                    </div><!-- swiper-slide -->
                @endforelse
            </div><!-- swiper-wrapper -->
        </div><!-- swiper-container -->
    </div><!-- slider -->
    <section class="blog-area section">
        <div class="container">

            <div class="row">

                @forelse($posts as $post)
                    <div class="col-lg-4 col-md-6">
                        <div class="card h-100">
                            <div class="single-post post-style-1">

                                <div class="blog-image"><img
                                        src="{{ asset('assets/frontend/images/averie-woodard-319832.jpg') }}"></div>

                                <a class="avatar" href="#">
                                    <img src="{{ asset('bower/adminbsb-materialdesign/images/image-gallery/15.jpg') }}"
                                        alt="Profile Image">
                                </a>
                                <div class="blog-info">
                                    <h4 class="title"><a href="{{ route('post', $post->id) }}"><b>{{ $post->title }}</b></a>
                                    </h4>
                                    @guest
                                        <ul class="post-footer">
                                            <li>
                                                <a href="{{ route('login') }}"><i class="ion-heart"></i>
                                                    {{ $post->favorite_to_users()->count() }}
                                                </a>
                                            </li>
                                            <li>
                                                <a href="{{ route('login') }}"><i class="ion-chatbubble"></i>3</a>
                                            </li>
                                            <li>
                                                <a href="{{ route('login') }}"><i
                                                        class="ion-eye"></i>{{ $post->view_count }}</a>
                                            </li>
                                        </ul>
                                        @else   
                                        <ul class="post-footer">
                                            <li>
                                                <a href="{{ route('post', $post->id) }}"><i class="ion-heart"></i>
                                                    {{ $post->favorite_to_users()->count() }}
                                                </a>
                                            </li>
                                            <li>
                                                <a href="{{ route('post', $post->id) }}"><i class="ion-chatbubble"></i>3</a>
                                            </li>
                                            <li>
                                                <a href="{{ route('post', $post->id) }}"><i
                                                    class="ion-eye"></i>{{ $post->view_count }}</a>
                                            </li>
                                        </ul>
                                    @endguest
                                        
                                </div><!-- blog-info -->
                            </div><!-- single-post -->
                        </div><!-- card -->
                    </div><!-- col-lg-4 col-md-6 -->
                @empty
                    <div class="col-lg-12 col-md-12">
                        <div class="card h-100">
                            <div class="single-post post-style-1 p-2">
                                <strong>{{ trans('no_data') }}</strong>
                            </div><!-- single-post -->
                        </div><!-- card -->
                    </div><!-- col-lg-4 col-md-6 -->
                @endforelse

            </div><!-- row -->

            <a class="load-more-btn" href="#"><b>{{ trans('load_more') }}</b></a>

        </div><!-- container -->
    </section><!-- section -->
@endsection
@push('js')

@endpush

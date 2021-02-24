@extends('layouts.frontend.app')

@section('title', 'Favor.Post')
    @push('css')
        <link href="{{ asset('assets/frontend/css/category/styles.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/frontend/css/category/responsive.css') }}" rel="stylesheet">
    @endpush

@section('content')
    <section class="blog-area section">
        <div class="container">
            <div class="show-result">
                <h3>{{ trans('Liked_posts') }}</h3>
            </div>
            <div class="row">

                @forelse ($posts as $post)
                    <div class="col-lg-4 col-md-6">
                        <div class="card h-100">
                            <div class="single-post post-style-1">
                                <div class="blog-image"><img
                                        src="{{ asset('storage/post/'. $post->image) }}"></div>
                                <div class="blog-info">
                                    <h4 class="title"><a href="{{ route('post', $post->id) }}"><b>{{ $post->title }}</b></a><br><br>
                                        <a class="active" href="{{ route('post', $post->id) }}">
                                            <small>{!! Str::limit(html_entity_decode($post->body), config('post.text')) !!}</small>
                                        </a>
                                        </h4>
                                        <ul class="post-footer">
                                            <li>
                                                <a href="{{ route('post', $post->id) }}"><i class="ion-heart"></i>
                                                    {{ $post->favorite_to_users()->count() }}
                                                </a>
                                            </li>
                                            <li>
                                                <a href="{{ route('post', $post->id) }}">
                                                    <i class="ion-chatbubble"></i>{{ $post->comments()->count() }}
                                                </a>
                                            </li>
                                            <li>
                                                <a href="{{ route('post', $post->id) }}">
                                                    <i class="ion-eye"></i>{{ $post->view_count }}</a>
                                            </li>
                                        </ul>
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
        </div><!-- container -->
    </section>
@endsection

@push('js')

@endpush

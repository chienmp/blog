@extends ('layouts.frontend.app')

@section('title', 'Posts')

    @push('css')
        <link href="{{ asset('assets/frontend/css/category/styles.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/frontend/css/category/responsive.css') }}" rel="stylesheet">
    @endpush

@section('content')
    <div class="slider display-table center-text">
        <h1 class="title display-table-cell">
            <b>{{ trans('All_posts') }}</b>
        </h1>
    </div>
    <section class="blog-area section">
        <div class="container">
            <div class="row" id="posts_data">
                @forelse($posts as $post)
                <div class="col-lg-4 col-md-6">
                    <div class="card h-100">
                        <div class="single-post post-style-1">
                            <div class="blog-image">
                                <img src="{{ asset('storage/post/' . $post->image)  }}" alt="{{ $post->title }}">
                            </div>
                            <a class="avatar" href="#">
                                <img src="{{ asset('bower/adminbsb-materialdesign/images/image-gallery/15.jpg') }}"
                                    alt="Profile Image">
                            </a>
                            <div class="blog-info">
                                <h4 class="title"><a
                                        href="{{ route('post', $post->id) }}"><b>{{ $post->title }}</b></a><br><br>
                                    <a class="active" href="{{ route('post', $post->id) }}">{{ trans('Read more') }}
                                        &raquo;</a>
                                </h4>
                                @guest
                                    <ul class="post-footer">
                                        <li>
                                            <a href="{{ route('login') }}"><i class="ion-heart"></i>
                                                {{ $post->favorite_to_users()->count() }}
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ route('login') }}"><i
                                                    class="ion-chatbubble"></i>{{ $post->comments()->count() }}</a>
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
                                            <a href="{{ route('post', $post->id) }}"><i
                                                    class="ion-chatbubble"></i>{{ $post->comments()->count() }}</a>
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
        {!! $posts->links() !!}
    </div><!-- container -->
    </section>
@endsection

@push('js')
{{--     <script>
        $(document).ready(function() {

            $(document).on('click', '.page-link', function(event) {
                event.preventDefault();
                var page = $(this).attr('href').split('page=')[1];
                fetch_data(page);
            });

            function fetch_data(page) {
                $.ajax({
                    url:"/posts/page="+page,
                    method: "GET",
                    data: {
                        page: page,
                    },
                    success: function(data) {
                        $('#posts_data').html(data);
                    }
                });
            }

        });

    </script> --}}
@endpush

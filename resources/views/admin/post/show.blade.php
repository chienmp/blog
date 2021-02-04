@extends('layouts.backend.app')

@section('title','Post')

@push('css')

@endpush

@section('content')
    <div class="container-fluid">
        <!-- Vertical Layout | With Floating Label -->
        <a href="{{ route('posts.index') }}" class="btn btn-danger waves-effect">BACK</a>
        <br>
        <br>
            <div class="row clearfix">
                <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                              <strong>{{ $post->title }}</strong><br>
                            </h2>
                            <small>Posted {{ $post->created_at->toFormattedDateString() }}</small><br>
                            @foreach($post->categories as $category)
                                <small class="font-italic">{{ trans('Categories') }} : {{ $category->name }}</small><br><br><br>
                            @endforeach
                        </div>
                        <div class="body">
                            {!! $post->body !!}<br><br>
                            <img class="img-responsive thumbnail" src="{{ asset('images/signup-image.jpg') }}" alt=""><br><br>
                            @foreach($post->tags as $tag)
                                <span class="font-italic">{{ trans('Tag') }} : {{ $tag->name }}</span>
                            @endforeach
                            
                        </div>
                    </div>
                </div>
                
            </div>
    </div>
@endsection

@push('js')
    <!-- Select Plugin Js -->
    <script src="{{ asset('assets/backend/plugins/bootstrap-select/js/bootstrap-select.js') }}"></script>
    <!-- TinyMCE -->
    <script src="{{ asset('assets/backend/plugins/tinymce/tinymce.js') }}"></script>
    <script>
        tinymce.init(
            {
                selector:"#id",
                plugins:"image",
            }
        );
    </script> 
@endpush
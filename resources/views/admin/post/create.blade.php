@extends('layouts.backend.app')

@section('title', 'Post')

    @push('css')
        <!-- Bootstrap Select Css -->
        <link href="{{ asset('bower_components/bootstrap-select/dist/css/bootstrap-select.css') }}" rel="stylesheet" />
    @endpush
    <script>
        var loadFile = function(event) {
            document.getElementById("img").height = "200";
            document.getElementById("img").width = "200";
            var output = document.getElementById('img');
            output.src = URL.createObjectURL(event.target.files[0]);
            output.onload = function() {
                URL.revokeObjectURL(output.src) // free memory
            }
        };

    </script>
@section('content')
    <div class="container-fluid">
        <!-- Vertical Layout | With Floating Label -->
        <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row clearfix">
                <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                ADD NEW POST
                            </h2>
                        </div>
                        <div class="body">
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" id="title" class="form-control" name="title">
                                    <label class="form-label">Post Title</label>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="image">Featured Image</label>
                                <input type="file" name="image" onchange="loadFile(event)">
                                <img id="img" src="#" alt="image">
                            </div>

                            <div class="form-group">
                                <input type="checkbox" id="publish" class="filled-in" name="status" value="1">
                                <label for="publish">Publish</label>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Categories and Tags
                            </h2>
                        </div>
                        <div class="body">
                            <div class="form-group form-float">
                                <div class="form-line {{ $errors->has('categories') ? 'focused error' : '' }}">
                                    <label for="category">{{ trans('Categories') }}</label>
                                    <select name="categories[]" id="category" class="form-control show-tick"
                                        data-live-search="true" multiple>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line {{ $errors->has('tags') ? 'focused error' : '' }}">
                                    <label for="tag">Select Tags</label>
                                    <select name="tags[]" id="tag" class="form-control show-tick" data-live-search="true"
                                        multiple>
                                        @foreach ($tags as $tag)
                                            <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <a class="btn btn-danger m-t-15 waves-effect"
                                href="{{ route('posts.index') }}">{{ trans('back') }}</a>
                            <button type="submit" class="btn btn-primary m-t-15 waves-effect">{{ trans('submit') }}</button>

                        </div>
                    </div>
                </div>
            </div>
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                {{ trans('body') }}
                            </h2>
                        </div>
                        <div class="body">
                            <textarea id="def" name="body"></textarea>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection

@push('js')
    <!-- Select Plugin Js -->
    <script src="{{ asset('bower_components/bootstrap-select/dist/js/bootstrap-select.js') }}"></script>
    <!-- TinyMCE -->
    <script src="{{ asset('bower_components/tinymce/tinymce.js') }}"></script>
@endpush

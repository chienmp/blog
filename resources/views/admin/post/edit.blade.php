@extends('layouts.backend.app')

@section('title', 'Post')

    @push('css')
        <!-- Bootstrap Select Css -->
        <link href="{{ asset('bower_components/bootstrap-select/dist/css/bootstrap-select.css') }}" rel="stylesheet" />
    @endpush

@section('content')
    <h3>{{ trans('new_post') }}</h3>
    <form>
        <div class="form-group">
            <label for="title">{{ trans('post_title') }}</label>
            <input type="text" name="title" class="form-control" value="{{ $post->title }}">
        </div>
        <div class="form-group">
            <label for="image">{{ trans('upload_image') }}</label>
            <input type="file" name="image" onchange="loadFile(event)">
                <img id="img" src="#" alt="image">
        </div>
        <div class="form-group">
            <input type="checkbox" id="publish" class="filled-in" name="status" value="1">
            <label for="publish">{{ trans('Publish') }}</label>
        </div>
        <div class="form-group form-float">
            <div class="form-line {{ $errors->has('categories') ? 'focused error' : '' }}">
                <label for="category">Select Category</label>
                <select name="categories[]" class="selectpicker" multiple
                    data-selected-text-format="count > 3">
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group form-float">
            <div class="form-line {{ $errors->has('tags') ? 'focused error' : '' }}">
                <label for="tag">Select Tags</label>
                <select name="tags[]" class="selectpicker" multiple
                    data-selected-text-format="count > 3">
                    @foreach ($tags as $tag)
                        <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group">
            <label for="body">Body</label>
            <textarea id="id"></textarea>
        </div>
    </form>
@endsection

@push('js')
    <!-- Select Plugin Js -->
    <script src="{{ asset('bower_components/bootstrap-select/dist/js/bootstrap-select.js') }}"></script>
    <!-- TinyMCE -->
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
    <script src="{{ asset('bower_components/tinymce/tinymce.min.js') }}"></script>
    <script>
        tinymce.init(
            {
                selector:"#id",
                plugins:"image",
            }
        );
    </script>
@endpush


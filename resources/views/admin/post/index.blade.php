@extends('layouts.backend.app')

@section('title', 'Post')

    @push('css')

    @endpush
    <link rel="stylesheet" href="{{ asset('bower_components/datatables/media/css/dataTables.bootstrap.css') }}">

@section('content')
    <div class="container-fluid">
        <div class="block-header">
            <a class="btn btn-primary waves-effect" href="{{ route('posts.create') }}">
                <i class="material-icons">add</i>
                <span>{{ trans('new_post') }}</span>
            </a>
        </div>
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>{{ trans('All_posts') }}
                            <span class="badge bg-blue"></span>
                        </h2>
                    </div>
                    <div class="body">
                        <div class="table-responsive">

                            <table id="example" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>{{ trans('title') }}</th>
                                        <th>{{ trans('image') }}</th>
                                        <th>{{ trans('status') }}</th>
                                        <th>{{ trans('view_count') }}</th>
                                        <th>{{ trans('action') }}</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <th>{{ trans('title') }}</th>
                                    <th>{{ trans('image') }}</th>
                                    <th>{{ trans('status') }}</th>
                                    <th>{{ trans('view_count') }}</th>
                                    <th>{{ trans('action') }}</th>
                                </tfoot>
                                <tbody>
                                    @foreach ($posts as $post)
                                        <tr>
                                            <td>{{ Str::limit($post->title, '20') }}</td>
                                            <td>
                                                <img height="100px" width="120px"
                                                    src="{{ asset('storage/post/' . $post->image) }}">
                                            </td>
                                            <td>
                                                @if ($post->status == true)
                                                    <span class="badge bg-blue">{{ trans('Posted') }}</span>
                                                @else
                                                    <span class="badge bg-pink">{{ trans('hidden') }}</span>
                                                @endif
                                            </td>
                                            <td>{{ $post->view_count }}</td>
                                            <td>
                                                <form action="{{ route('posts.destroy', $post->id) }}" method="POST">
                                                    <a href="{{ route('posts.edit', $post->id) }}"
                                                        class="btn btn-info"><i class="material-icons">edit</i></a>
                                                    <a href="{{ route('posts.show', $post->id) }}"
                                                        class="btn btn-success"><i class="material-icons">visibility</i></a>
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" onclick="return ConfirmDelete()"
                                                        class="btn btn-danger"><i class="material-icons">delete</i></button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    @endsection
    @push('js')
        <script src="{{ asset('js/dt.js') }}"></script>
        <script src="{{ asset('bower_components/datatables/media/js/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('bower_components/datatables/media/js/dataTables.bootstrap.min.js') }}"></script>
    @endpush

@extends('layouts.backend.app')

@section('title', 'Post')

    @push('css')
        <link rel="stylesheet" href="{{ asset('vendor/datatables/dataTables.bootstrap4.css') }}">
    @endpush

@section('content')
    <div class="container-fluid">
        <div class="block-header">
            <a class="btn btn-primary waves-effect" href="{{ route('posts.create') }}">
                <i class="fas fa-plus-circle"></i>
                <span>{{ trans('new_post') }}</span>
            </a>
        </div>
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="body">
                        <div class="table-responsive">
                            <table id="dataTable" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>{{ trans('Id') }}</th>
                                        <th>{{ trans('title') }}</th>
                                        <th>{{ trans('image') }}</th>
                                        <th>{{ trans('status') }}</th>
                                        <th>{{ trans('view_count') }}</th>
                                        <th>{{ trans('action') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($posts as $key => $post)
                                        <tr>
                                            <td>{{ ++$key }}</td>
                                            <td>{{ Str::limit($post->title, '20') }}</td>
                                            <td>
                                                <img height="100px" width="120px"
                                                    src="{{ asset('storage/post/' . $post->image) }}">
                                            </td>
                                            <td>
                                                @if ($post->status == true)
                                                    <span class="badge badge-success">{{ trans('Posted') }}</span>
                                                @else
                                                    <span class="badge badge-danger">{{ trans('hidden') }}</span>
                                                @endif
                                            </td>
                                            <td>{{ $post->view_count }}</td>
                                            <td>
                                                <form action="{{ route('posts.destroy', $post->id) }}" method="POST">
                                                    <a href="{{ route('posts.edit', $post->id) }}"
                                                        class="btn btn-info"><i class="fas fa-edit"></i></a>
                                                    <a href="{{ route('posts.show', $post->id) }}"
                                                        class="btn btn-success"><i class="far fa-eye"></i></a>
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" id="delete" onclick="return ConfirmDelete()"
                                                        class="btn btn-danger">
                                                        <i class="fas fa-trash-alt"></i>
                                                    </button>
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
        <script src="{{ asset('vendor/datatables/jquery-3.5.1.js') }}"></script>
        <script src="{{ asset('vendor/datatables/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
        <script src="{{ asset('js/dt.js') }}"></script>
    @endpush

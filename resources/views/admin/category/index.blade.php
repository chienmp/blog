@extends('layouts.backend.app')

@section('title', 'Category')

    @push('css')
        {{--
        <link rel="stylesheet" href="{{ asset('css/material-components-web.min.css') }}"> --}}
        <link rel="stylesheet" href="{{ asset('bower_components/datatables/media/css/dataTables.bootstrap.css') }}">
    @endpush

@section('content')
    <div class="container-fluid">
        <div class="block-header">
            <a class="btn btn-primary waves-effect" href="{{ route('category.create') }}">
                <i class="material-icons">add</i>
                <span>{{ trans('new_cate') }}</span>
            </a>
        </div>
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>{{ trans('All_cates') }}
                            <span class="badge bg-blue"></span>
                        </h2>
                    </div>
                    <div class="body">
                        <div class="table-responsive">

                            <table id="example" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>{{ trans('name') }}</th>
                                        <th>{{ trans('image') }}</th>
                                        <th>{{ trans('action') }}</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <th>{{ trans('name') }}</th>
                                    <th>{{ trans('image') }}</th>

                                    <th>{{ trans('action') }}</th>
                                </tfoot>
                                <tbody>
                                    @foreach ($cates as $cate)
                                        <tr>
                                            <td>{{ $cate->name }}</td>

                                            {{-- <td>{{ $tag->posts->count() }}</td>
                                            --}}
                                            <td>
                                                <img height="100px" width="120px"
                                                    src="{{ asset('storage/category/' . $cate->image) }}">
                                            </td>
                                            <td>
                                                <form action="{{ route('category.destroy', $cate->id) }}" method="POST">
                                                    <a href="{{ route('category.edit', $cate->id) }}" class="btn btn-info"><i class="material-icons">edit</i></a>
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

@extends('admin.tag.index')

@section('title', 'Tag')

@push('css')
<link rel="stylesheet" href="{{ asset('css/material-components-web.min.css') }}">
<link rel="stylesheet" href="{{ asset('bower_components/datatables/media/css/dataTables.material.min.css') }}">
@endpush

@section('content')
<div class="container-fluid">
    <div class="block-header">
        <a class="btn btn-primary waves-effect" href="{{ route('tag.create') }}">
            <i class="material-icons">add</i>
            <span>{{ trans('Add New Tag') }}</span>
        </a>
    </div>
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>{{ trans('All tags') }}
                        <span class="badge bg-blue">{{ $tags->count() }}</span>
                    </h2>
                </div>
                <div class="body">
                    <div class="table-responsive">
                        <table id="example" class="mdl-data-table" style="width:100%">
                            <thead>
                                <tr>
                                    <th>{{ trans('name') }}</th>
                                    <th>{{ trans('created_at') }}</th>
                                    <th>{{ trans('action') }}</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <th>{{ trans('name') }}</th>
                                <th>{{ trans('created_at') }}</th>
                                <th>{{ trans('action') }}</th>
                            </tfoot>
                            <tbody>
                                @foreach($tags as $tag)
                                <tr>
                                    <td>{{ $tag->name }}</td>
                                    <td>{{ $tag->posts->count() }}</td>
                                    <td>{{ $tag->created_at }}</td>
                                    <td a class="text-center">
                                        <a href="{{ route('tag.edit', $tag->id) }}"
                                            class="btn btn-info waves-effect">
                                            <i class="material-icons">edit</i>
                                        </a>
                                        <button class="btn btn-danger waves-effect" type="button"
                                            onclick="deleteTag({{ $tag->id }})">
                                            <i class="material-icons">delete</i>
                                        </button>
                                        <form id="delete-form-{{ $tag->id }}"
                                            action="{{ route('tag.destroy',$tag->id) }}" method="POST"
                                            style="display: none;">
                                            @csrf
                                            @method('DELETE')
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
<script src="{{ asset('bower_components/datatables/media/js/jquery.js') }}"></script>
<script src="{{ asset('bower_components/datatables/media/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('bower_components/datatables/media/js/dataTables.material.min.js') }}"></script>
@endpush

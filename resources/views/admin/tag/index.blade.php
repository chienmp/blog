@extends('admin.tag.index')

@section('title', 'Tag')

    @push('css')
        <link rel="stylesheet" href="{{ asset('css/material-components-web.min.css') }}">
        <link rel="stylesheet" href="{{ asset('bower_components/datatables/media/css/dataTables.material.min.css') }}">
    @endpush

@section('content')
    <div class="container-fluid">
        <div class="block-header">
            <a class="btn btn-primary waves-effect" href="{{ route('admin.tag.create') }}">
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
                                        <th>Position</th>
                                        <th>Office</th>
                                        <th>Age</th>
                                        <th>Start date</th>
                                        <th>Salary</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    @endsection

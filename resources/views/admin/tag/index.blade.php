@extends('layouts.backend.app')

@push('css')
<link rel="stylesheet" href="{{ asset('vendor/datatables/dataTables.bootstrap4.css') }}">
@endpush

@section('content')
<div class="container-fluid">
    <div class="block-header">
        <a class="btn btn-primary waves-effect" href="{{ route('tags.create') }}">
            <i class="fas fa-plus-square"></i>
            <span>{{ trans('Add New Tag') }}</span>
        </a>
    </div>
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">

                <div class="body">
                    <div class="table-responsive">
                        <table id="dataTable" class="table table-striped table-bordered" >
                            <thead>
                                <tr>
                                    <th class="text-center">{{ trans('Id') }}</th>
                                    <th class="text-center">{{ trans('name') }}</th>
                                    <th class="text-center">{{ trans('action') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($tags as $key=>$tag)
                                <tr>
                                    <td>{{ ++$key }}</td>
                                    <td>{{ $tag->name }}</td>
                                    {{-- <td>{{ $tag->posts->count() }}</td> --}}
                                    <td a class="text-center">
                                        <form action="{{ route('tags.destroy', $tag->id) }}" method="POST">
                                            <a href="{{ route('tags.edit', $tag->id) }}"
                                                class="btn btn-info"><i class="fas fa-edit"></i></a>
                                            @csrf
                                            @method('delete')
                                            <button type="submit" onclick="return ConfirmDelete()"
                                                class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
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
</div>
@endsection
@push('js')
<script src="{{ asset('vendor/datatables/jquery-3.5.1.js') }}"></script>
<script src="{{ asset('vendor/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('js/dt.js') }}"></script>
@endpush
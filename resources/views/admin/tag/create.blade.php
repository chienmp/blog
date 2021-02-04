@extends('layouts.backend.app')

@section('title','Tag')

@push('css')

@endpush

@section('content')
<div class="container-fluid">
    <!-- Vertical Layout | With Floating Label -->
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>
                        {{ trans("add_tag") }}
                    </h2>
                </div>
                <div class="body">
                    <form action="{{ route('tags.store') }}" method="POST">
                        @csrf
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text" id="name" class="form-control" name="name"
                                placeholder="{{ trans('tag_name') }}">
                            </div>
                        </div>
                        <a class="btn btn-danger  waves-effect"
                            href="{{ route('tags.index') }}">{{ trans('back') }}</a>
                        <button type="submit" class="btn btn-primary waves-effect">{{ trans('submit') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('script')

@endpush

@extends('layouts.backend.app')

@section('title', 'Dashboard')

@push('css')
<link rel="stylesheet" href="{{ asset('bower/chart.js/dist/Chart.css') }}">
@endpush

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <canvas id="myChart">
                    </canvas>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('js')
<script src="{{ asset('bower/chart.js/dist/Chart.js') }}"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="{{ asset('js/dashboardchart.js') }}"></script>
@endpush

@extends('layouts.frontend.app')

@push('css')
    
@endpush

@section('content')
    <h2><strong>Title of the post</strong></h2>
    <br><br><br>
    <p>  Content of the post....   </p>
    <p>End content & below post image </p>
    <img src="{{ asset('blog-icon.png') }}">

    
@endsection
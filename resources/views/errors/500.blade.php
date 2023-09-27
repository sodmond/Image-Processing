@extends('layouts.error', ['title' => __('Internal Server Error')])

@section('content')
<h1 class="text-white">{{ __('500') }}</h1>
<h2 class="text-white">Internal Server Error</h2>
<h6 class="text-white">Please reload the page or go back to previous page. <br>
    If error persist, contact administrator.</h6>
<h6 class="text-white"><a href="{{ url('/') }}">Click here</a> to go to homepage</h6>
@endsection

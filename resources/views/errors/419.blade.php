@extends('layouts.error', ['title' => __('Page Expired')])

@section('content')
<h1 class="text-white">{{ __('419') }}</h1>
<h2 class="text-white">Page Expired</h2>
<h6 class="text-white">Your session has expired or is invalid.</h6>
<h6 class="text-white"><a href="{{ url('/') }}">Click here</a> to go to homepage</h6>
@endsection

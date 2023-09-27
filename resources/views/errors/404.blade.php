@extends('layouts.error', ['title' => __('Page Not Found')])

@section('content')
<h1 class="text-white">{{ __('404') }}</h1>
<h2 class="text-white">Page Not Found</h2>
<h6 class="text-white">The page you are looking for might have been removed, had its name changed,<br> 
    or is temporarily unavailable.</h6>
<h6 class="text-white"><a href="{{ url('/') }}">Click here</a> to go to homepage</h6>
@endsection

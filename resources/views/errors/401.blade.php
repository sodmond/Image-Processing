@extends('layouts.error', ['title' => __('Unauthorized Access')])

@section('content')
<h1 class="text-white">{{ __('404') }}</h1>
<h2 class="text-white">Unauthorized Access</h2>
<h6 class="text-white">You need to login in order access this page.</h6>
<h6 class="text-white"><a href="{{ url('/') }}">Click here</a> to go to homepage</h6>
@endsection

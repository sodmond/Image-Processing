@extends('layouts.admin', ['title' => 'Dashboard', 'activePage' => 'home'])

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
</div>

<div class="row">
    <div class="col-xl-6 col-lg-6 col-md-6 mb-4">
        <div class="card border-left-danger shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                            Total Processed Images
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ number_format($totalRecords) }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-images fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-6 col-lg-6 col-md-6 mb-4">
        <div class="card border-left-danger shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                            Processed Images (Today)
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ number_format($todayRecords) }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-camera fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12 mb-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h3 class="h6 font-weight-bold">Upload Person's Details & Image</h3>
            </div>
            <div class="card-body">
                @if (session('success'))
                    <div class="alert alert-success" role="alert"><strong>Success!</strong> {{ session('success') }}. <a href="{{ session('img_link') }}"><em>View Image</em></a></div>
                @endif
                @if (count($errors))
                    <div class="alert alert-danger">
                        <strong>Whoops!</strong> There are some problems with your input.<br>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form class="row" action="{{ route('user.image.new') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="col-md-6 my-2">
                        <label for="name">Enter Name:</label>
                        <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}" required>
                    </div>
                    <div class="col-md-6 my-2">
                        <label for="nickname">Enter Nickname:</label>
                        <input type="text" class="form-control" name="nickname" id="nickname" value="{{ old('nickname') }}" required>
                    </div>
                    <div class="col-md-6 my-2">
                        <label for="job">Job Title:</label>
                        <input type="text" class="form-control" name="job" id="job" value="{{ old('job') }}" required>
                    </div>
                    <div class="col-md-6 my-2">
                        <label for="traits">Enter Traits:</label> <small>(3 max. Seperate with comma)</small>
                        <input type="text" class="form-control" name="traits" id="traits" value="{{ old('traits') }}" required>
                    </div>
                    <div class="col-md-12 my-2">
                        <label for="image">Select Image:</label>
                        <input type="file" class="form-control" name="image" id="image" required>
                    </div>
                    <div class="col-md-12 my-2">
                        <input type="submit" class="btn btn-danger btn-user btn-block" value="Submit">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@extends('layouts.admin', ['title' => 'Settings', 'activePage' => 'settings'])

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <div class="col-md-4 mb-2">
        <h1 class="h3 mb-0 text-gray-800">Settings</h1>
    </div>
    <div class="col-12 col-md-8 text-md-right">
        &nbsp;
    </div>
</div>

<div class="row">
    <div class="col">
        @if (session('success'))
            <div class="alert alert-success" role="alert"><strong>Success!</strong> {{ session('success') }}</div>
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
    </div>
</div>

@if (Auth::id() == 1)
<div class="row py-4">
    <div class="col-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-dark">New User Account</h6>
            </div>
            <div class="card-body">
                <div class="row">
                    <fieldset class="col">
                        <form class="row" action="{{ route('user.profile.new') }}" method="post">
                            @csrf
                            <div class="col-md-6 my-2">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}" required>
                            </div>
                            <div class="col-md-6 my-2">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" name="email" value="{{ old('email') }}" required>
                            </div>
                            <div class="col-md-6 my-2">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" name="password" id="password" required>
                            </div>
                            <div class="col-md-6 my-2">
                                <label for="confirm_password">Confirm Password</label>
                                <input type="password" class="form-control" name="password_confirmation" id="confirm_password" required>
                            </div>
                            <div class="col-md-12 my-2">
                                <button type="submit" class="btn btn-danger btn-user btn-block">Submit</button>
                            </div>
                        </form>
                    </fieldset>
                </div>
            </div>
        </div>
    </div>
</div>
@endif

<div class="row">
    <div class="col-lg-12 mb-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-dark">List of Registered User Accounts</h6>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="row">
                            <div class="col mb-4">
                                @if (Auth::id() == 1)
                                    <a class="btn btn-danger btn-sm" href="{{ route('user.settings') }}">
                                        <i class="fa fa-plus"></i> Add New</a>
                                @endif
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Date Created</th>
                                        <th>Last Updated</th>
                                        <th>...</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $rowNum = 1; @endphp
                                    @foreach ($users as $user)
                                        <tr>
                                            <td>{{ $rowNum++ }}</td>
                                            <td id="{{'adminName'.$user->id}}">{{ ucwords($user->name) }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ $user->created_at }}</td>
                                            <td>{{ $user->updated_at }}</td>
                                            <td>@if (($user->id != 1) && (Auth::id() != $user->id))
                                                <input type="hidden" id="{{'deleteAdminUrl'.$user->id}}" value="{{ route('user.profile.delete', ['id' => $user->id]) }}">
                                                <button class="btn btn-danger btn-sm" id="{{'deleteAdminBtn-'.$user->id}}" {{ (Auth::id() != 1) ? 'disabled' : '' }}>
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            @endif</td>
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
</div>
@endsection

@push('custom-scripts')
    <script>
        $('button[id^="deleteAdminBtn"]').click(function() {
            var getBtnId = $(this).attr('id');
            var adminId = getBtnId.split("-")[1];
            var name = $("#adminName"+adminId).text();
            //alert(url);
            var x = confirm('Do you want to delete this User ('+name+')? This process cannot be reversed');
            if (x == true) {
                var url = $('#deleteAdminUrl'+adminId).val();
                window.location.href = url;
                //alert(url);
            }
        });
    </script>
@endpush
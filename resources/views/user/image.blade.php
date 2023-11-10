@extends('layouts.admin', ['title' => 'Image Record', 'activePage' => 'images'])

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <div class="col">
        <h1 class="h3 mb-0 text-gray-800">{{$image->name}}'s Image Record</h1>
    </div>
    <div class="col text-right">
        <button class="btn btn-danger btn-sm" onclick="window.history.back()">
            <i class="fas fa-angle-left"></i> Back
        </button>
    </div>
</div>

<div class="row">
    <div class="col-lg-12 mb-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-dark">Product Details</h6>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-12">
                        @if (count($errors))
                            <div class="alert alert-danger">
                                <strong>Whoops!</strong> Error validating data.<br>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        @if (session('success'))
                            <div class="alert alert-success" role="alert"><strong>Success!</strong> {{ session('success') }}</div>
                        @endif
                        <form action="" method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="image_id" value="{{ $image->id }}">
                            <div class="row mb-4">
                                <label class="col-lg-2 text-lg-right">Name</label>
                                <div class="col-lg-10">
                                    <input type="text" class="form-control" required value="{{ $image->name }}" disabled>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <label class="col-lg-2 text-lg-right">Nickname</label>
                                <div class="col-lg-10">
                                    <input type="text" class="form-control" required value="{{ $image->nickname }}" disabled>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <label class="col-lg-2 text-lg-right">Job</label>
                                <div class="col-lg-10">
                                    <input type="url" class="form-control" required value="{{ $image->job }}" disabled>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <label class="col-lg-2 text-lg-right">Traits</label>
                                <div class="col-lg-10">
                                    <input type="text" class="form-control" value="{{ $image->traits }}" disabled>
                                </div>
                            </div>
                            {{--<div class="row mb-4">
                                <label class="col-lg-3 text-lg-right">Cover Image</label>
                                <div class="col-lg-9">
                                    <input type="file" class="form-control" name="cover" id="cover">
                                    <div class="my-2" style="max-height:200px; overflow-y:scroll; vertical-align:middle;">
                                        <a href="{{ url('storage/'.$product->cover) }}" target="_blank">
                                            <img class="img-fluid" src="{{ asset('public/storage/'.$product->cover) }}" alt="Product Cover Image">
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-lg-9 offset-lg-3">
                                    <button type="submit" class="btn btn-danger col" {{!in_array(Auth::user()->role, [1,2]) ? 'disabled' : ''}}>Save</button>
                                </div>
                            </div>
                            @if (Auth::id() == 1)
                                <div class="row mb-4">
                                    <div class="col-lg-9 offset-lg-3">
                                        <input type="hidden" id="deleteProductUrl" value="{{ route('admin.product.delete', ['id' => $product->id]) }}">
                                        <button type="button" class="btn btn-danger col" id="deleteProductBtn"><i class="fa fa-trash"></i> Delete</button>
                                    </div>
                                </div>
                            @endif--}}
                        </form>
                        <div class="row mb-4">
                            <label class="col-lg-2 text-lg-right">Original Image</label>
                            <div class="col-lg-10 p-3">
                                <img class="img-fluid" src="{{ asset('public/work/resized/'.$image->original_image) }}" alt="Original Image">
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-lg-10 offset-lg-2">
                                <a class="btn btn-danger col" href="{{ url('public/work/processed/'.$image->processed_image) }}" target="_blank">Download Processed Image</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@push('custom-scripts')
    <script>
        $('#deleteProductBtn').click(function() {
            var x = confirm('Do you want to delete this product? This process cannot be reversed');
            if (x == true) {
                var url = $('#deleteProductUrl').val();
                window.location.href = url;
                //alert(url);
            }
        });
        $('#duplicateProductBtn').click(function() {
            var x = confirm('This process will duplicate this product. Do you want to proceed?');
            if (x == true) {
                var url = $('#duplicateProductUrl').val();
                window.location.href = url;
                //alert(url);
            }
        });
    </script>
@endpush
@endsection

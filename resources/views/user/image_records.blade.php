@extends('layouts.admin', ['title' => 'Image Records', 'activePage' => 'images'])

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <div class="col-md-4">
        <h1 class="h3 mb-0 text-gray-800">Image Records</h1>
    </div>
    <div class="col-md-4">&nbsp;</div>
    <div class="col-md-4 text-right">
       &nbsp;
    </div>
</div>

<div class="row">
    <div class="col-lg-12 mb-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-dark">{{ 'List of All Processed Images'}}</h6>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-12">
                        <form action="" method="get" class="row mb-3">
                            <div class="col-sm-12 col-md-8 mb-2">
                                <input type="text" class="form-control" name="search" id="search" placeholder="Search for image records with name" required>
                            </div>
                            <div class="col-sm-12 col-md-4">
                                <button class="btn btn-danger" type="submit"><i class="fas fa-search fa-sm"></i> Search</button>
                            </div>
                        </form>
                        <hr>
                        @isset($_GET['search'])
                            <div class="mb-3 text-danger">Your search result for <em>"{{ $_GET['search'] }}"</em></div>
                        @endisset
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Nickname</th>
                                        <th>Job</th>
                                        <th>Traits</th>
                                        <th>Date Created</th>
                                        <th>...</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $rowNum = 1; @endphp
                                    @foreach ($images as $image)
                                        <tr>
                                            <td>{{ $rowNum++ }}</td>
                                            <td>{{ $image->name }}</td>
                                            <td>{{ $image->nickname }}</td>
                                            <td>{{ $image->job }}</td>
                                            <td>{{ $image->trait }}</td>
                                            <td>{{ $image->created_at }}</td>
                                            <td><a class="btn btn-danger btn-sm" href="{{ route('user.image', ['id' => $image->id, 'code' => $image->image_code]) }}">
                                                <i class="fa fa-eye"></i>
                                            </a></td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="row justify-content-center">{{ $images->links() }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<input type="hidden" id="app_url" value="{{ url('/') }}">
@endsection

@push('custom-scripts')
    <script type="text/javascript">
        $(document).ready(function(){
            var tags = "";
            $("#loader").hide();
            $("#tagLoader").hide();
            $('#pet_type').change(function(){
                $("#loader").show('slow');
                var pet_type_id = $(this).val();
                //alert('Pet Type ID ' + pet_type_id);
                if (pet_type_id != ""){
                    $.ajax({
                        type: 'GET',
                        url: $('#app_url').val() + '/admin/get_categories/' + pet_type_id,
                        success:function(data) {
                            if ($.isEmptyObject(data.error)){
                                var categories = data.cats; 
                                tags = data.tags;
                                var catsOpt = '';
                                categories.forEach(element => {
                                    catsOpt += '<option value="'+ element['id'] +'">'+ element['title'] +'</option>';
                                });
                                $('#category').html(catsOpt);
                                $('#category').selectpicker('refresh');
                                //console.log(tagsOpt);
                            }else{
                                $('#category').html(data.error);
                                $('#category').selectpicker('refresh');
                            }
                        }
                    });
                } else {
                    //$('#tagsDiv').html('<p>Hello</p>');
                    $('#tags').append('<option>1</option>');
                }
                $("#loader").hide('slow');
            });
            $('#category').change(function() {
                $("#tagLoader").show('slow');
                var cat_id = $(this).val(); //alert(cat_id);
                var tagsOpt = '';
                tags.forEach(element => {
                    if (element['food_category_id'] == cat_id) {
                        tagsOpt += '<option value="'+ element['id'] +'">'+ element['slug'] +'</option>';
                    }
                });
                $('#tag').html(tagsOpt);
                $('#tag').selectpicker('refresh');
                $("#tagLoader").hide('slow');
            });
        });
    </script>
@endpush

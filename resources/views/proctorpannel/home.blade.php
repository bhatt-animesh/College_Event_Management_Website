@extends('theme.default')

@section('content')
    <div class="container-fluid mt-3">
        <div class="row">
            <div class="col-lg-3 col-sm-6">
                <div class="card gradient-2">
                    <div class="card-body">
                        <h3 class="card-title text-white">Total Events</h3>
                        <div class="d-inline-block">
                            <h2 class="text-white">{{count($getitem)}}</h2>
                        </div>
                        <span class="float-right display-5 opacity-5"><i class="fa fa-calendar"></i></span>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="card gradient-9">
                    <div class="card-body">
                        <h3 class="card-title text-white">Total Participation</h3>
                        <div class="d-inline-block">
                            <h2 class="text-white">0</h2>
                        </div>
                        <span class="float-right display-5 opacity-5"><i class="fa fa-plus"></i></span>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="card gradient-1">
                    <div class="card-body">
                        <h3 class="card-title text-white">Total SPG Members</h3>
                        <div class="d-inline-block">
                            <h2 class="text-white">25</h2>
                        </div>
                        <span class="float-right display-5 opacity-5"><i class="fa fa-user"></i></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h3>Details:</h3><hr>
                        <h5 style="color: red;">Name : {{$auth_user_d->name}}</h5><hr>
                        <h5 style="color: red;">Email : {{$auth_user_d->email}}</h5><hr>
                        <h5 style="color: red;">Number : {{$auth_user_d->mobile}}</h5><hr>
                    </div>
                </div>
            </div>
        </div>   
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Total Events List (Inter)</h4>
                        <div class="table-responsive" id="table-display">
                        <table class="table table-striped table-bordered zero-configuration">
                            <thead>
                                <tr>
                                    <th>Event Name</th>
                                    <th>Category</th>
                                    <th>Venue</th>
                                    <th>Date</th>
                                    <th>Time</th>
                                    <th>Prize</th>
                                    <th>Team Size</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($events_inter as $item) {
                                    // print_r($item);
                                ?>
                                <tr id="dataid{{$item->id}}">
                                    <td>{{$item->e_name}}</td>
                                    <td>{{@$item['category']->category_name}}</td>
                                    <td>{{$item->e_venue}}</td>
                                    <td>{{$item->e_date}}</td>
                                    <td>{{$item->e_time}}</td>
                                    <td>{{$item->e_prize}}</td>
                                    <td>{{$item->e_team_size}}</td>
                                </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>  
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Total Events List (Intra)</h4>
                        <div class="table-responsive" id="table-display">
                        <table class="table table-striped table-bordered zero-configuration">
                            <thead>
                                <tr>
                                    <th>Event Name</th>
                                    <th>Category</th>
                                    <th>Venue</th>
                                    <th>Date</th>
                                    <th>Time</th>
                                    <th>Team Size</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($events_intra as $item) {
                                    // print_r($item);
                                ?>
                                <tr id="dataid{{$item->id}}">
                                    <td>{{$item->e_name}}</td>
                                    <td>{{@$item['category']->category_name}}</td>
                                    <td>{{$item->e_venue}}</td>
                                    <td>{{$item->e_date}}</td>
                                    <td>{{$item->e_time}}</td>
                                    <td>{{$item->e_team_size}}</td>
                                </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>    
    <!-- #/ container -->
@endsection
@section('script')
<script type="text/javascript">
    $('.table').dataTable({
      aaSorting: [[0, 'DESC']]
    });
    function DeleteData(id) {
        swal({
            title: "Are you sure?",
            text: "Do you want to delete this Order ?",
            type: "warning",
            showCancelButton: true,
            confirmButtonClass: "btn-danger",
            confirmButtonText: "Yes, delete it!",
            cancelButtonText: "No, cancel plz!",
            closeOnConfirm: false,
            closeOnCancel: false,
            showLoaderOnConfirm: true,
        },
        function(isConfirm) {
            if (isConfirm) {
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url:"{{ URL::to('admin/orders/destroy') }}",
                    data: {
                        id: id
                    },
                    method: 'POST',
                    success: function(response) {
                        if (response == 1) {
                            swal({
                                title: "Approved!",
                                text: "Order has been deleted.",
                                type: "success",
                                showCancelButton: true,
                                confirmButtonClass: "btn-danger",
                                confirmButtonText: "Ok",
                                closeOnConfirm: false,
                                showLoaderOnConfirm: true,
                            },
                            function(isConfirm) {
                                if (isConfirm) {
                                    $('#dataid'+id).remove();
                                    swal.close();
                                    // location.reload();
                                }
                            });
                        } else {
                            swal("Cancelled", "Something Went Wrong :(", "error");
                        }
                    },
                    error: function(e) {
                        swal("Cancelled", "Something Went Wrong :(", "error");
                    }
                });
            } else {
                swal("Cancelled", "Your record is safe :)", "error");
            }
        });
    }

    function StatusUpdate(id,status) {
        swal({
            title: "Are you sure?",
            text: "Do you want to change status?",
            type: "warning",
            showCancelButton: true,
            confirmButtonClass: "btn-danger",
            confirmButtonText: "Yes, change it!",
            cancelButtonText: "No, cancel plz!",
            closeOnConfirm: false,
            closeOnCancel: false,
            showLoaderOnConfirm: true,
        },
        function(isConfirm) {
            if (isConfirm) {
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url:"{{ URL::to('admin/orders/update') }}",
                    data: {
                        id: id,
                        status: status
                    },
                    method: 'POST', //Post method,
                    dataType: 'json',
                    success: function(response) {
                        swal({
                            title: "Approved!",
                            text: "Status has been changed.",
                            type: "success",
                            showCancelButton: true,
                            confirmButtonClass: "btn-danger",
                            confirmButtonText: "Ok",
                            closeOnConfirm: false,
                            showLoaderOnConfirm: true,
                        },
                        function(isConfirm) {
                            if (isConfirm) {
                                swal.close();
                                location.reload();
                            }
                        });
                    },
                    error: function(e) {
                        swal("Cancelled", "Something Went Wrong :(", "error");
                    }
                });
            } else {
                swal("Cancelled", "Something went wrong :)", "error");
            }
        });
    }

    $(document).on("click", ".open-AddBookDialog", function () {
         var myBookId = $(this).data('id');
         $(".modal-body #bookId").val( myBookId );
    });

    function assign(){     
        var bookId=$("#bookId").val();
        var driver_id = $('#driver_id').val();
        var CSRF_TOKEN = $('input[name="_token"]').val();
        $('#preloader').show();
        $.ajax({
            headers: {
                'X-CSRF-Token': CSRF_TOKEN 
            },
            url:"{{ URL::to('admin/orders/assign') }}",
            method:'POST',
            data:{'bookId':bookId,'driver_id':driver_id},
            dataType:"json",
            success:function(data){
                $('#preloader').hide();
                if (data == 1) {
                    location.reload();
                }
            },error:function(data){
               
            }
        });
    }
</script>
@endsection
@extends('theme.default')

@section('content')

    <div class="container-fluid mt-3">
    @if($auth_user_d->password == '$2y$10$cz.misN9VdQQj/u5MuMgg.nj43Jax/Wgg/UaqUY.2vhXKU4nbsMDK')
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Hello, {{$auth_user_d->name}}</strong> Kindly Please Change Your Profile Password Thank You !!!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
        </div>
    @endif 
        <div class="row">
            <div class="col-lg-3 col-sm-6">
                <div class="card gradient-2">
                    <div class="card-body">
                        <h3 class="card-title text-white">Total Events</h3>
                        <div class="d-inline-block">
                            <h2 class="text-white">{{count($getitems)}}</h2>
                        </div>
                        <span class="float-right display-5 opacity-5"><i class="fa fa-calendar"></i></span>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="card gradient-9">
                    <div class="card-body">
                        <h3 class="card-title text-white">Registered Events</h3>
                        <div class="d-inline-block">
                            <h2 class="text-white">0</h2>
                        </div>
                        <span class="float-right display-5 opacity-5"><i class="fa fa-plus"></i></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h3>HOD & DR Details:</h3><hr>
                        <h5 style="color: red;">Name : {{$auth_user_d->name}}</h5><hr>
                        <h5 style="color: red;">Email : {{$auth_user_d->email}}</h5><hr>
                        <h5 style="color: red;">Number : {{$auth_user_d->mobile}}</h5><hr>
                        <h5 style="color: red;">Department Name : {{$hod_details->department_name}}</h5><hr>
                        <h5 style="color: red;">DR Name : {{$hod_details->dr_name}}</h5><hr>
                        <h5 style="color: red;">DR Contact Number: {{$hod_details->dr_con}}</h5><hr>
                    </div>
                </div>
            </div>
        </div>   
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Events List(Which Registerd By HOD):</h4>
                        <div class="table-responsive" id="table-display">
                        <table class="table table-striped table-bordered zero-configuration">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Event Name</th>
                                    <th>Gender(Male/Female/Both)</th>
                                    <th>Coordinator Name</th>
                                    <th>Coordinator No.</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($getitems as $item) {
                                        // print_r($item);
                                    ?>
                                    <tr id="dataid{{$item->id}}">
                                        <td>#</td>
                                        <td>{{$item->e_name}}</td>
                                        <td>{{$item->e_gender}}</td>
                                        <td>{{$item->e_c_name}}</td>
                                        <td>{{$item->e_c_contact}}</td>
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
@extends('theme.default')

@section('content')


    <div class="container-fluid mt-3">
    @if($auth_user_d->type == 1)
        <div class="row">
            <div class="col-lg-3 col-sm-6">
                <div class="card gradient-1">
                    <div class="card-body">
                        <h3 class="card-title text-white">Event Categories</h3>
                        <div class="d-inline-block">
                            <h2 class="text-white">{{count($getcategory)}}</h2>
                        </div>
                        <span class="float-right display-5 opacity-5"><i class="fa fa-list-alt"></i></span>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="card gradient-2">
                    <div class="card-body">
                        <h3 class="card-title text-white">Events</h3>
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
                        <h3 class="card-title text-white">Results Uploaded</h3>
                        <div class="d-inline-block">
                            <h2 class="text-white">{{count($get_results)}}</h2>
                        </div>
                        <span class="float-right display-5 opacity-5"><i class="fa fa-plus"></i></span>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="card gradient-3">
                    <div class="card-body">
                        <h3 class="card-title text-white">Users</h3>
                        <div class="d-inline-block">
                            <h2 class="text-white">{{count($getusers)}}</h2>
                        </div>
                        <span class="float-right display-5 opacity-5"><i class="fa fa-users"></i></span>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="card gradient-4">
                    <div class="card-body">
                        <h3 class="card-title text-white">Total Participants</h3>
                        <div class="d-inline-block">
                            <h2 class="text-white">{{count($get_parti)}}</h2>
                        </div>
                        <span class="float-right display-5 opacity-5"><i class="fa fa-star"></i></span>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="card gradient-7">
                    <div class="card-body">
                        <h3 class="card-title text-white">Total DRS</h3>
                        <div class="d-inline-block">
                            <h2 class="text-white">{{count($hod_dep)}}</h2>
                        </div>
                        <span class="float-right display-5 opacity-5"><i class="fa fa-list-alt"></i></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Recent Event Add</h4>
                        <div class="table-responsive" id="table-display">
                            @include('theme.todayorderstable')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @elseif($auth_user_d->type == 3)
        <div class="row">
            <div class="col-lg-3 col-sm-6">
                <div class="card gradient-1">
                    <div class="card-body">
                        <h3 class="card-title text-white">Event Categories</h3>
                        <div class="d-inline-block">
                            <h2 class="text-white">{{count($getcategory)}}</h2>
                        </div>
                        <span class="float-right display-5 opacity-5"><i class="fa fa-list-alt"></i></span>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="card gradient-2">
                    <div class="card-body">
                        <h3 class="card-title text-white">Events</h3>
                        <div class="d-inline-block">
                            <h2 class="text-white">{{count($getitems)}}</h2>
                        </div>
                        <span class="float-right display-5 opacity-5"><i class="fa fa-calendar"></i></span>
                    </div>
                </div>
            </div>
        </div>  
    @endif    
    </div>
    <!-- Modal -->
    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <form method="post" id="assign">
                {{csrf_field()}}
                <div class="modal-body">
                    <div class="form-group">
                        <label for="category_id" class="col-form-label">Order ID:</label>
                        <input type="text" class="form-control" id="bookId" name="bookId" readonly="">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" onclick="assign()" data-dismiss="modal">Save</button>
                </div>
                </form>
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
@extends('theme.default')

@section('content')
<style type="text/css">
    .pac-container {
    z-index: 10000 !important;
}
</style>
<div class="row page-titles mx-0">
    <div class="col p-md-0">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{URL::to('/admin/home')}}">Dashboard</a></li>
            <li class="breadcrumb-item active"><a href="javascript:void(0)">Events</a></li>
        </ol>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addProduct" data-whatever="@addProduct">Add Event</button>

        <!-- Add Item -->
        <div class="modal fade" id="addProduct" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add New Event</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    
                    <form id="add_product" enctype="multipart/form-data">
                    <div class="modal-body">
                        <span id="msg"></span>
                        @csrf
                        <div class="form-group">
                            <label for="cat_id" class="col-form-label">Category:</label>
                            <select name="cat_id" class="form-control" id="cat_id">
                                <option value="">Select Category</option>
                                <?php
                                foreach ($getcategory as $category) {
                                ?>
                                <option value="{{$category->id}}">{{$category->category_name}}</option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="item_name" class="col-form-label">Event Name:</label>
                            <input type="text" class="form-control" name="event_name" id="event_name" placeholder="Event Name">
                        </div>
                        <div class="form-group">
                            <label for="price" class="col-form-label">Venue:</label>
                            <input type="text" class="form-control" name="venue" id="venue" placeholder="Venue Name">
                        </div>
                        <div class="form-group">
                            <label for="delivery_time" class="col-form-label">Date:</label>
                            <input type="date" class="form-control" name="date" id="date" placeholder="Date Of Event">
                        </div>
                        <div class="form-group">
                            <label for="delivery_time" class="col-form-label">Start Time:</label>
                            <input type="time" class="form-control" name="time" id="time" placeholder="Time Of Event Start">
                        </div>
                        <div class="form-group">
                            <label for="delivery_time" class="col-form-label">End Time:</label>
                            <input type="time" class="form-control" name="e_time" id="e_time" placeholder="Time Of Event End">
                        </div>
                        <div class="form-group">
                            <label for="type" class="col-form-label">Event Type:</label>
                            <select  class="form-control" id="type" name="type">
                                <option value="intra" selected>Intra</option>
                                <option value="inter">Inter</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="team_size" class="col-form-label">Team size:</label>
                            <input type="text" class="form-control" name="team_size" id="team_size" placeholder="Team Size">
                        </div>
                        <div class="form-group">
                            <label for="gender" class="col-form-label">Gender:</label>
                            <select  class="form-control" id="gender" name="gender">
                                <option value="both" selected>Both</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="register_by" class="col-form-label">Register By:</label>
                            <select  class="form-control" id="register_by" name="register_by">
                                <option value="individual" selected>Individual</option>
                                <option value="team">Team Event</option>
                                <option value="hod">H.O.D</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="coordinator_name" class="col-form-label">Coordinator Name:</label>
                            <input type="text" class="form-control" name="coordinator_name" id="coordinator_name" placeholder="Event Coordinator Name">
                        </div>
                        <div class="form-group">
                            <label for="coordinator_no" class="col-form-label">Coordinator Number:</label>
                            <input type="text" class="form-control" name="coordinator_no" id="coordinator_no" placeholder="Event Coordinator Number">
                        </div>
                        <div class="form-group">
                            <label for="prize" class="col-form-label">Prize (Required For Inter Only):</label>
                            <input type="text" class="form-control" name="prize" id="prize" placeholder="Event Prize in RS">
                        </div>
                        <div class="form-group">
                            <label for="desc" class="col-form-label">Description:</label>
                            <textarea class="form-control" rows="5" name="description" id="description" placeholder="Event Description"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="rules" class="col-form-label">Rules:</label>
                            <textarea class="form-control" rows="5" name="rules" id="rules" placeholder="Event Rules"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="guidelines" class="col-form-label">Guidelines:</label>
                            <textarea class="form-control" rows="5" name="guidelines" id="guidelines" placeholder="Event Guidelines"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="colour" class="col-form-label">Select Event images(Optional):</label>
                            <input type="file" multiple="true" class="form-control" name="file[]" id="file" required="" accept=".png, .jpg, .jpeg">
                            <input type="hidden" name="removeimg" id="removeimg">
                        </div>
                        <div class="gallery"></div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Edit Item -->
        <div class="modal fade" id="EditProduct" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabeledit" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <form method="post" name="editproduct" class="editproduct" id="editproduct" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabeledit">Edit Item</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <span id="emsg"></span>
                        <div class="modal-body">
                            <input type="hidden" class="form-control" id="id" name="id">
                            <div class="form-group">
                                <label for="getcat_id" class="col-form-label">Category:</label>
                                <select name="getcat_id" class="form-control" id="getcat_id">
                                    <option value="">Select Category</option>
                                    <?php
                                    foreach ($getcategory as $category) {
                                    ?>
                                    <option value="{{$category->id}}">{{$category->category_name}}</option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                            <label for="item_name" class="col-form-label">Event Name:</label>
                            <input type="text" class="form-control" name="getevent_name" id="getevent_name" placeholder="Event Name">
                        </div>
                        <div class="form-group">
                            <label for="price" class="col-form-label">Venue:</label>
                            <input type="text" class="form-control" name="getvenue" id="getvenue" placeholder="Venue Name">
                        </div>
                        <div class="form-group">
                            <label for="delivery_time" class="col-form-label">Date:</label>
                            <input type="date" class="form-control" name="getdate" id="getdate" placeholder="Date Of Event">
                        </div>
                        <div class="form-group">
                            <label for="delivery_time" class="col-form-label">Time:</label>
                            <input type="time" class="form-control" name="gettime" id="gettime" placeholder="Time Of Event">
                        </div>
                        <div class="form-group">
                            <label for="type" class="col-form-label">Event Type:</label>
                            <select  class="form-control" id="gettype" name="gettype">
                                <option value="intra" selected>Intra</option>
                                <option value="inter">Inter</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="team_size" class="col-form-label">Team size:</label>
                            <input type="text" class="form-control" name="getteam_size" id="getteam_size" placeholder="Team Size">
                        </div>
                        <div class="form-group">
                            <label for="gender" class="col-form-label">Gender:</label>
                            <select  class="form-control" id="getgender" name="getgender">
                                <option value="both" selected>Both</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="register_by" class="col-form-label">Register By:</label>
                            <select  class="form-control" id="getregister_by" name="getregister_by">
                                <option value="student" selected>Student</option>
                                <option value="hod">H.O.D</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="coordinator_name" class="col-form-label">Coordinator Name:</label>
                            <input type="text" class="form-control" name="getcoordinator_name" id="getcoordinator_name" placeholder="Event Coordinator Name">
                        </div>
                        <div class="form-group">
                            <label for="coordinator_no" class="col-form-label">Coordinator Number:</label>
                            <input type="text" class="form-control" name="getcoordinator_no" id="getcoordinator_no" placeholder="Event Coordinator Number">
                        </div>
                        <div class="form-group">
                            <label for="prize" class="col-form-label">Prize (Required For Inter Only):</label>
                            <input type="text" class="form-control" name="getprize" id="getprize" placeholder="Event Prize in RS">
                        </div>
                        <div class="form-group">
                            <label for="desc" class="col-form-label">Description:</label>
                            <textarea class="form-control" rows="5" name="getdescription" id="getdescription" placeholder="Event Description"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="rules" class="col-form-label">Rules:</label>
                            <textarea class="form-control" rows="5" name="getrules" id="getrules" placeholder="Event Rules"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="guidelines" class="col-form-label">Guidelines:</label>
                            <textarea class="form-control" rows="5" name="getguidelines" id="getguidelines" placeholder="Event Guidelines"></textarea>
                        </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btna-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- row -->

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <span id="message"></span>
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">All Events</h4>
                    <a href="{{ URL::to('admin/events/export/1') }}" class="btn btn-success">Export Sports List</a>
                    <a href="{{ URL::to('admin/events/export/2') }}" class="btn btn-primary">Export Technical List</a>
                    <a href="{{ URL::to('admin/events/export/3') }}" class="btn btn-success">Export Cultural List</a>
                    <a href="{{ URL::to('admin/events/export/4') }}" class="btn btn-primary">Export All List</a>
                    <div class="table-responsive" id="table-display">
                        @include('theme.eventstable')
                    </div>
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
$(document).ready(function() {
     
    $('#add_product').on('submit', function(event){
        event.preventDefault();
        var form_data = new FormData(this);
        form_data.append('file',$('#file')[0].files);
        $.ajax({
            url:"{{ URL::to('admin/events/store') }}",
            method:"POST",
            data:form_data,
            cache: false,
            contentType: false,
            processData: false,
            dataType: "json",
            success: function(result) {
                var msg = '';
                $('div.gallery').html('');  
                if(result.error.length > 0)
                {
                    for(var count = 0; count < result.error.length; count++)
                    {
                        msg += '<div class="alert alert-danger">'+result.error[count]+'</div>';
                    }
                    $('#msg').html(msg);
                    setTimeout(function(){
                      $('#msg').html('');
                    }, 5000);
                }
                else
                {
                    msg += '<div class="alert alert-success mt-1">'+result.success+'</div>';
                    ProductTable();
                    $('#message').html(msg);
                    $("#addProduct").modal('hide');
                    $("#add_product")[0].reset();
                    ProductTable();
                    setTimeout(function(){
                      $('#message').html('');
                    }, 5000);
                }
            },
        })
    });

    $('#editproduct').on('submit', function(event){
        event.preventDefault();
        var form_data = new FormData(this);
        $.ajax({
            url:"{{ URL::to('admin/events/update') }}",
            method:'POST',
            data:form_data,
            cache: false,
            contentType: false,
            processData: false,
            dataType: "json",
            success: function(result) {
                var msg = '';
                if(result.error.length > 0)
                {
                    for(var count = 0; count < result.error.length; count++)
                    {
                        msg += '<div class="alert alert-danger">'+result.error[count]+'</div>';
                    }
                    $('#emsg').html(msg);
                    setTimeout(function(){
                      $('#emsg').html('');
                    }, 5000);
                }
                else
                {
                    msg += '<div class="alert alert-success mt-1">'+result.success+'</div>';
                    ProductTable();
                    $('#message').html(msg);
                    $("#EditProduct").modal('hide');
                    $("#editproduct")[0].reset();
                    ProductTable();
                    setTimeout(function(){
                      $('#message').html('');
                    }, 5000);
                }
            },
        });
    });
});
function GetData(id) {
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url:"{{ URL::to('admin/events/show') }}",
        data: {
            id: id
        },
        method: 'POST', //Post method,
        dataType: 'json',
        success: function(response) {
            jQuery("#EditProduct").modal('show');
            $('#id').val(response.ResponseData.id);
            $('#getcat_id').val(response.ResponseData.e_category);
            $('#getevent_name').val(response.ResponseData.e_name);
            $('#getvenue').val(response.ResponseData.e_venue);
            $('#gettype').val(response.ResponseData.e_type);
            $('#gettime').val(response.ResponseData.e_time);
            $('#getteam_size').val(response.ResponseData.e_team_size);
            $('#getrules').val(response.ResponseData.e_rules);
            $('#getprize').val(response.ResponseData.e_prize);
            $('#getregister_by').val(response.ResponseData.e_parti);
            $('#getprice').val(response.ResponseData.e_jud_cri);
            $('#getguidelines').val(response.ResponseData.e_guidlines);
            $('#getgender').val(response.ResponseData.e_gender);
            $('#getdescription').val(response.ResponseData.e_description);
            $('#getdate').val(response.ResponseData.e_date);
            $('#getprice').val(response.ResponseData.e_category);
            $('#getcoordinator_name').val(response.ResponseData.e_c_name);
            $('#getcoordinator_no').val(response.ResponseData.e_c_contact);            
        },
        error: function(error) {

            // $('#errormsg').show();
        }
    })
}
function StatusUpdate(id,status) {
    swal({
        title: "Are you sure?",
        text: "Do you want to delete this item ?",
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
                url:"{{ URL::to('admin/events/status') }}",
                data: {
                    id: id,
                    status: status
                },
                method: 'POST', //Post method,
                dataType: 'json',
                success: function(response) {
                    swal({
                        title: "Approved!",
                        text: "Item has been deleted.",
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
                            ProductTable();
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
function ProductTable() {
    $.ajax({
        url:"{{ URL::to('admin/events/list') }}",
        method:'get',
        success:function(data){
            $('#table-display').html(data);
            $(".zero-configuration").DataTable()
        }
    });
}
 $(document).ready(function() {
     var imagesPreview = function(input, placeToInsertImagePreview) {
          if (input.files) {
              var filesAmount = input.files.length;
              $('div.gallery').html('');
              var n=0;
              for (i = 0; i < filesAmount; i++) {
                  var reader = new FileReader();
                  reader.onload = function(event) {
                       $($.parseHTML('<div>')).attr('class', 'imgdiv').attr('id','img_'+n).html('<img src="'+event.target.result+'" class="img-fluid"><span id="remove_"'+n+' onclick="removeimg('+n+')">&#x2716;</span>').appendTo(placeToInsertImagePreview); 
                      n++;
                  }
                  reader.readAsDataURL(input.files[i]);                                  
             }
          }
      };

     $('#file').on('change', function() {
         imagesPreview(this, 'div.gallery');
     });
 
});
var images = [];
function removeimg(id){
    images.push(id);
    $("#img_"+id).remove();
    $('#remove_'+id).remove();
    $('#removeimg').val(images.join(","));
}

$('#price').keyup(function(){
    var val = $(this).val();
    if(isNaN(val)){
         val = val.replace(/[^0-9\.]/g,'');
         if(val.split('.').length>2) 
             val =val.replace(/\.+$/,"");
    }
    $(this).val(val); 
});

$('#getprice').keyup(function(){
    var val = $(this).val();
    if(isNaN(val)){
         val = val.replace(/[^0-9\.]/g,'');
         if(val.split('.').length>2) 
             val =val.replace(/\.+$/,"");
    }
    $(this).val(val); 
});
</script>
@endsection
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
            <li class="breadcrumb-item active"><a href="javascript:void(0)">DRS List</a></li>
        </ol>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addProduct" data-whatever="@addProduct">Add DRS</button>

        <!-- Add Item -->
        <div class="modal fade" id="addProduct" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add New DRS</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    
                    <form id="add_product" enctype="multipart/form-data">
                    <div class="modal-body">
                        <span id="msg"></span>
                        @csrf
                        <div class="form-group">
                            <label for="cat_id" class="col-form-label">HOD Name:</label>
                            <select name="hod_name" class="form-control" id="hod_name">
                                <option value="">Select HOD :</option>
                                <?php
                                foreach ($gethod as $hod) {
                                ?>
                                <option value="{{$hod->id}}">{{$hod->name}}</option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="dr_name_b" class="col-form-label">DR Name (Boy):</label>
                            <input type="text" class="form-control" name="dr_name_b" id="dr_name_b" placeholder="DR Name">
                        </div>
                        <div class="form-group">
                            <label for="dr_contact_b" class="col-form-label">DR Contact (Boy):</label>
                            <input type="text" class="form-control" name="dr_contact_b" id="dr_conact_b" placeholder="DR Contact">
                        </div>
                        <div class="form-group">
                            <label for="dr_name_g" class="col-form-label">DR Name (Girl):</label>
                            <input type="text" class="form-control" name="dr_name_g" id="dr_name_g" placeholder="DR Name">
                        </div>
                        <div class="form-group">
                            <label for="dr_contact_g" class="col-form-label">DR Contact (Girl):</label>
                            <input type="text" class="form-control" name="dr_contact_g" id="dr_conact_g" placeholder="DR Contact">
                        </div>
                        <div class="form-group">
                            <label for="department_name" class="col-form-label">Department Name:</label>
                            <select  class="form-control" id="department_name" name="department_name">
                                <option selected>Select Department:</option>
                                <option value="ME">ME</option>
                                <option value="CIVIL">CIVIL</option>
                                <option value="CS">CS</option>
                                <option value="EEE">EEE</option>
                                <option value="BCA">BCA</option>
                                <option value="ANIMATION">ANIMATION</option>
                                <option value="SPA">SPA</option>
                                <option value="SOD">SOD</option>
                                <option value="SOM">SOM</option>
                                <option value="BBA">BBA</option>
                                <option value="BCOM">BCOM</option>
                                <option value="1Year">1Year</option>
                                <option value="PIHM">PIHM</option>
                                <option value="SSH">SSH</option>
                                <option value="MBA">MBA</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                    </form>
                </div>
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
                    <h4 class="card-title">DRS List</h4>
                    <div class="table-responsive" id="table-display">
                        @include('theme.drstable')
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
        $.ajax({
            url:"{{ URL::to('admin/drs/store') }}",
            method:"POST",
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
            url:"{{ URL::to('admin/drs/update') }}",
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
        url:"{{ URL::to('admin/drs/show') }}",
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
                url:"{{ URL::to('admin/drs/status') }}",
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
        url:"{{ URL::to('admin/drs/list') }}",
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
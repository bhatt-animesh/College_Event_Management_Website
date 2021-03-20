@extends('theme.default')

@section('content')
<style type="text/css">
    .pac-container {
    z-index: 10000 !important;
}
</style>
<div id="preloader" style='display: none;'>
        <div class="loader">
            <img src="{!! asset('public/front/images/loader.gif') !!}" style="width: 80px;">
        </div>
</div>
<div class="row page-titles mx-0">
    <div class="col p-md-0">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{URL::to('/admin/home')}}">Dashboard</a></li>
            <li class="breadcrumb-item active"><a href="javascript:void(0)">Register Events</a></li>
        </ol>

        <!-- Edit Item -->
        <div class="modal fade" id="EditProduct" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabeledit" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <form method="post" name="editproduct" class="editproduct" id="editproduct" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabeledit">Register Team:</h5>
                            <button type="button" onclick="remove()" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <br><h6 style="color: red;">&nbsp;&nbsp;Note : All Participants Must Be Register On Website</h6><hr>
                        <span id="emsg"></span>
                        <div class="modal-body team_form">
                        <input type="hidden" class="form-control" id="id" name="id">
                        <input type="hidden" id="gethodid" name="gethodid" value="{{$auth_user_d->id}}">
                        <input type="hidden" id="getdrname" name="getdrname" value="{{$hod_details->dr_name}}">
                        <input type="hidden" id="getdrcontact" name="getdrcontact" value="{{$hod_details->dr_con}}">
                        <input type="hidden" id="getdepartment" name="getdepartment" value="{{$hod_details->department_name}}">
                        <div class='form-group'>
                            <label for='name' class='col-form-label'>Team Name:</label>
                            <input type='text' class='form-control' name='getteamname' id='getteamname' placeholder='Name'>
                        </div>
                        <div class='form-group'>
                            <label for='name' class='col-form-label'>Team Leader Name:</label>
                            <input type='text' class='form-control' name='getleadername' id='getleadername' placeholder='Name'>
                        </div>
                        <div class='form-group'>
                            <label for='name' class='col-form-label'>Team Leader Email:</label>
                            <input type='email' class='form-control' name='getleaderemail' id='getleaderemail' placeholder='Name'>
                        </div>
                        <div class='form-group'>
                            <label for='contact' class='col-form-label'>Team Leader Contact No:</label>
                            <input type='mobile' class='form-control' name='getmobile' id='getmobile' placeholder='Mobile Number'>
                        </div>
                    </div>
                        <div class="modal-footer">
                            <button id="close" type="button" class="btn btna-secondary" onclick="remove()" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Register Now</button>
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
                    <div class="table-responsive" id="table-display">
                        @include('theme.hodeventstable')
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
        $("#preloader").show();
        event.preventDefault();
        var form_data = new FormData(this);
        form_data.append('file',$('#file')[0].files);
        $.ajax({
            url:"{{ URL::to('admin/hodreg/store') }}",
            method:"POST",
            data:form_data,
            cache: false,
            contentType: false,
            processData: false,
            dataType: "json",
            success: function(result) {
                $("#preloader").hide();
                var msg = '';
                $('div.gallery').html('');  
                if(result.error.length > 0)
                {
                    for(var count = 0; count < result.error.length; count++)
                    {
                        msg += '<div class="alert alert-danger">'+result.error[count]+'</div>';
                    }
                    $('#emsg').html(msg);
                    setTimeout(function(){
                      $('#emsg').html('');
                    }, 50000);
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
        $("#preloader").show();
        event.preventDefault();
        var form_data = new FormData(this);
        $.ajax({
            url:"{{ URL::to('admin/hodreg/store') }}",
            method:'POST',
            data:form_data,
            cache: false,
            contentType: false,
            processData: false,
            dataType: "json",
            success: function(result) {
                $("#preloader").hide();
                var msg = '';
                if(result.error.length > 0)
                {
                    for(var count = 0; count < result.error.length; count++)
                    {
                        msg += '<div class="alert alert-danger">'+result.error[count]+'</div>';
                    }
                    $('#emsg').html(msg);
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
    var html=""
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url:"{{ URL::to('admin/hodreg/show') }}",
        data: {
            id: id
        },
        method: 'POST', //Post method,
        dataType: 'json',
        success: function(response) {
            for(var x=0; x<response.ResponseData.e_team_size; x++){
               html += "<div class='form-group par'><label for='email' class='col-form-label'>Participant Email "+(x+1)+" :</label><input class='form-control' type='email' name='emailp[]' id='email_"+(x+1)+"' placeholder='Member Email'>";
              }
            $(".team_form").append(html);
            jQuery("#EditProduct").modal('show');
            $('#id').val(response.ResponseData.id);
            //$('#getteam_size').val(response.ResponseData.e_team_size);
        },
        error: function(error) {

            // $('#errormsg').show();
        }
    })
}
function remove(){
    $(".par").remove();
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
                url:"{{ URL::to('admin/hodreg/store') }}",
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
        url:"{{ URL::to('admin/hodreg/list') }}",
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
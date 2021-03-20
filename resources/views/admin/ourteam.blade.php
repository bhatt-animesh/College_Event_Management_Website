@extends('theme.default')

@section('content')

<div class="row page-titles mx-0">
    <div class="col p-md-0">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{URL::to('/admin/home')}}">Dashboard</a></li>
            <li class="breadcrumb-item active"><a href="javascript:void(0)">Our team</a></li>
        </ol>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addBanner" data-whatever="@addBanner">Add Team Member</button>
        <!-- Add Promation Banner -->
        <div class="modal fade" id="addBanner" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add New Team Member</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    
                    <form id="add_banner" enctype="multipart/form-data">
                    <div class="modal-body">
                        <span id="msg"></span>
                        @csrf
                        <div class="form-group">
                            <label for="name" class="col-form-label">Name:</label>
                            <input type="text" class="form-control" name="name" id="name" placeholder="Member Name">
                        </div>
                        <div class="form-group">
                            <label for="c_name" class="col-form-label">Committee Name:</label>
                            <select name="c_name" class="form-control" id="c_name">
                                <option value="" selected>Select Committee</option>
                                <option value="Core">Core</option>
                                <option value="Cultural">Cultural</option>
                                <option value="Documentation">Documentation</option>
                                <option value="Food and accomodation">Food and Accomodation</option>
                                <option value="Invitation">Invitation</option>
                                <option value="Poster and social">Poster and Social</option>
                                <option value="Photography and video">Photography and Video</option>
                                <option value="Sponsership">Sponsership</option>
                                <option value="Sports">Sports</option>
                                <option value="Store">Store</option>
                                <option value="Website">Website</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="price" class="col-form-label">Mobile Number:</label>
                            <input type="text" class="form-control" name="mobile" id="mobile" placeholder="Mobile Number">
                        </div>
                        <div class="form-group">
                            <label for="image" class="col-form-label">Image:</label>
                            <input type="file" class="form-control" name="image" id="image" accept=".png, .jpg, .jpeg">
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

        <!-- Edit Promation Banner -->
        <div class="modal fade" id="EditBanner" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabeledit" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <form method="post" name="editbanner" class="editbanner" id="editbanner" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabeledit">Edit Team Member</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <span id="emsg"></span>
                        <div class="modal-body">
                        <div class="form-group">
                            <label for="name" class="col-form-label">Name:</label>
                            <input type="text" class="form-control" name="name" id="name" placeholder="Member Name">
                        </div>
                        <div class="form-group">
                            <label for="c_name" class="col-form-label">Committee Name:</label>
                            <input type="text" class="form-control" name="c_name" id="c_name" placeholder="Committee Name">
                        </div>
                        <div class="form-group">
                            <label for="price" class="col-form-label">Mobile Number:</label>
                            <input type="text" class="form-control" name="mobile" id="mobile" placeholder="Mobile Number">
                        </div>
                            <input type="hidden" class="form-control" id="id" name="id">
                            <input type="hidden" class="form-control" id="old_img" name="old_img">
                            <div class="form-group">
                                <label for="image" class="col-form-label">Select image:</label>
                                <input type="file" class="form-control" name="image" id="image" accept=".png, .jpg, .jpeg">
                            </div>
                            <div class="gallerys"></div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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
                    <h4 class="card-title">All Team Member Info</h4>
                    <div class="table-responsive" id="table-display">
                        @include('theme.ourteamtable')
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
     
    $('#add_banner').on('submit', function(event){
        event.preventDefault();
        var form_data = new FormData(this);
        $.ajax({
            url:"{{ URL::to('admin/ourteam/store') }}",
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
                    BannerTable();
                    $('#message').html(msg);
                    $("#addBanner").modal('hide');
                    $("#add_banner")[0].reset();
                    $('.gallery').html('');
                    setTimeout(function(){
                      $('#message').html('');
                    }, 5000);
                }
            },
        })
    });

    $('#editbanner').on('submit', function(event){
        event.preventDefault();
        var form_data = new FormData(this);
        $.ajax({
            url:"{{ URL::to('admin/ourteam/update') }}",
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
                    BannerTable();
                    $('#message').html(msg);
                    $("#EditBanner").modal('hide');
                    $("#editbanner")[0].reset();
                    $('.gallery').html('');
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
        url:"{{ URL::to('admin/ourteam/show') }}",
        data: {
            id: id
        },
        method: 'POST', //Post method,
        dataType: 'json',
        success: function(response) {
            jQuery("#EditBanner").modal('show');
            $('#id').val(response.ResponseData.id);
            $('#getis_admin').val(response.ResponseData.is_admin);

            $('.gallerys').html("<img src="+response.ResponseData.img+" class='img-fluid' style='max-height: 200px;'>");
            $('#old_img').val(response.ResponseData.image);
        },
        error: function(error) {

            // $('#errormsg').show();
        }
    })
}
function DeleteData(id) {
    // dd(id);
    swal({
        title: "Are you sure?",
        text: "Do you want to delete this banner?",
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
                url:"{{ URL::to('admin/ourteam/destroy') }}",
                data: {
                    id: id
                },
                method: 'POST',
                success: function(response) {
                    if (response == 1) {
                        swal({
                            title: "Approved!",
                            text: "Promation Banner has been deleted.",
                            type: "success",
                            showCancelButton: true,
                            confirmButtonClass: "btn-danger",
                            confirmButtonText: "Ok",
                            closeOnConfirm: false,
                            showLoaderOnConfirm: true,
                        },
                        function(isConfirm) {
                            if (isConfirm) {
                                BannerTable();
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
function BannerTable() {
    $.ajax({
        url:"{{ URL::to('admin/ourteam/list') }}",
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
              $('.gallery').html('');
              $('.gallerys').html('');
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

     $('#image').on('change', function() {
         imagesPreview(this, '.gallerys');
         imagesPreview(this, '.gallery');
     });
 
});
var images = [];
function removeimg(id){
    images.push(id);
    $("#img_"+id).remove();
    $('#remove_'+id).remove();
    $('#removeimg').val(images.join(","));
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
</script>
@endsection
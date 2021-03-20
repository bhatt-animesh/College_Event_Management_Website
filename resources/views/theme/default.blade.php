<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Lakshya - Admin Pannel</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{!! asset('public/assets/images/favicon.png') !!}">
    <!-- Pignose Calender -->
    <link href="{!! asset('public/assets/plugins/pg-calendar/css/pignose.calendar.min.css') !!}" rel="stylesheet">
    <!-- Chartist -->
    <link rel="stylesheet" href="{!! asset('public/assets/plugins/chartist/css/chartist.min.css') !!}">
    <link rel="stylesheet" href="{!! asset('public/assets/plugins/chartist-plugin-tooltips/css/chartist-plugin-tooltip.css') !!}">

    <link href="{!! asset('public/assets/plugins/tables/css/datatable/dataTables.bootstrap4.min.css') !!}" rel="stylesheet">
    <!-- Custom Stylesheet -->
    <link href="{!! asset('public/assets/plugins/sweetalert/css/sweetalert.css') !!}" rel="stylesheet">
    <link href="{!! asset('public/assets/css/style.css') !!}" rel="stylesheet">

</head>
<body>

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="loader">
            <img src="{!! asset('public/front/images/loader.gif') !!}" style="width: 80px;">
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->

    <div id="main-wrapper">

        @include('theme.header')
        @include('theme.sidebar')
        <div class="content-body">
            @yield('content')
        </div>
        <!-- /#page-wrapper -->
        <div class="card-content collapse show">
          <div class="card-body">
            <div class="row my-2">
              <div class="col-lg-4 col-md-6 col-sm-12">
                <div class="form-group">
                  <!-- Modal Change Password-->
                  <div class="modal fade text-left" id="ChangePasswordModal" tabindex="-1" role="dialog" aria-labelledby="RditProduct"
                  aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <label class="modal-title text-text-bold-600" id="RditProduct">Change Password</label>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div id="errors" style="color: red;"></div>
                        
                        <form method="post" id="change_password_form">
                        {{csrf_field()}}
                          <div class="modal-body">
                            <label>Old Passwod: </label>
                            <div class="form-group">
                                <input type="password" placeholder="Enter Old Password" class="form-control" name="oldpassword" id="oldpassword">
                            </div>

                            <label>New Password: </label>
                            <div class="form-group">
                                <input type="password" placeholder="Enter New Password" class="form-control" name="newpassword" id="newpassword">
                            </div>

                            <label>Confirm Password: </label>
                            <div class="form-group">
                                <input type="password" placeholder="Enter Confirm Password" class="form-control" name="confirmpassword" id="confirmpassword">
                            </div>

                          </div>
                          <div class="modal-footer">
                            <input type="reset" class="btn btn-outline-secondary btn-lg" data-dismiss="modal"
                            value="close">
                            <input type="button" onclick="changePassword()" class="btn btn-outline-primary btn-lg" value="Submit">
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>

                  <!-- Modal Settings-->
                  <div class="modal fade text-left" id="Selltings" tabindex="-1" role="dialog" aria-labelledby="RditProduct"
                  aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <label class="modal-title text-text-bold-600" id="RditProduct">Setting</label>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div id="errors" style="color: red;"></div>
                        
                        <form method="post" id="settings">
                        {{csrf_field()}}
                          <div class="modal-body">

                            <label>Tax (%): </label>
                            <div class="form-group">
                                <input type="text" placeholder="Enter Tax in percentage (%)" value="{{{Auth::user()->tax}}}" class="form-control" name="tax" id="tax">
                            </div>

                            <label>Get current Location: </label>
                            <div class="form-group">
                                <a href="#" class="badge badge-primary px-2" onclick="getLocation()" >
                                    Click here to get your current location
                                </a>
                            </div>

                            <label>Latitude: </label>
                            <div class="form-group">
                                <input type="text" class="form-control" name="lat" id="lat" value="{{{Auth::user()->lat}}}" readonly="">
                            </div>

                            <label>Longitude</label>
                            <div class="form-group">
                                <input type="text" class="form-control" name="lang" id="lang" value="{{{Auth::user()->lang}}}" readonly="">
                            </div>

                            <label>Delivery Charge: </label>
                            <div class="form-group">
                                <input type="text" placeholder="Delivery Charge" value="{{{Auth::user()->delivery_charge}}}" class="form-control" name="delivery_charge" id="delivery_charge">
                            </div>

                            <label>Max. Order QTY: </label>
                            <div class="form-group">
                                <input type="text" placeholder="Max. Order QTY" value="{{{Auth::user()->max_order_qty}}}" class="form-control" name="max_order_qty" id="max_order_qty">
                            </div>

                            <label>Min. Order Amount: </label>
                            <div class="form-group">
                                <input type="text" placeholder="Min. Order Amount" value="{{{Auth::user()->min_order_amount}}}" class="form-control" name="min_order_amount" id="min_order_amount">
                            </div>

                            <label>Max. Order Amount: </label>
                            <div class="form-group">
                                <input type="text" placeholder="Max. Order Amount" value="{{{Auth::user()->max_order_amount}}}" class="form-control" name="max_order_amount" id="max_order_amount">
                            </div>

                          </div>
                          <div class="modal-footer">
                            <input type="reset" class="btn btn-outline-secondary btn-lg" data-dismiss="modal"
                            value="close">
                            <input type="button" class="btn btn-outline-primary btn-lg" onclick="settings()"  value="Submit">
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>

                </div>
              </div>
            </div>
          </div>
        </div>

    </div>
    <!-- /#wrapper -->

    @include('theme.script')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
    <script type="text/javascript">
        function myFunction() {
          alert("You don't have rights in Demo Admin panel");
        }
    </script>
    <script type="text/javascript">
        function getLocation() {
          if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(showPosition);
          } else { 
            x.innerHTML = "Geolocation is not supported by this browser.";
          }
        }

        function showPosition(position) {

            $('#lat').val(position.coords.latitude);
            $('#lang').val(position.coords.longitude);
        }
    </script>
    <script type="text/javascript">
        function changePassword(){     
            var oldpassword=$("#oldpassword").val();
            var newpassword=$("#newpassword").val();
            var confirmpassword=$("#confirmpassword").val();
            var CSRF_TOKEN = $('input[name="_token"]').val();
            
            if($("#change_password_form").valid()) {
                $('#preloader').show();
                $.ajax({
                    headers: {
                        'X-CSRF-Token': CSRF_TOKEN 
                    },
                    url:"{{ url('admin/changePassword') }}",
                    method:'POST',
                    data:{'oldpassword':oldpassword,'newpassword':newpassword,'confirmpassword':confirmpassword},
                    dataType:"json",
                    success:function(data){
                      $('#preloader').hide();
                        $("#loading-image").hide();
                        if(data.error.length > 0)
                        {
                            var error_html = '';
                            for(var count = 0; count < data.error.length; count++)
                            {
                                error_html += '<div class="alert alert-danger mt-1">'+data.error[count]+'</div>';
                            }
                            $('#errors').html(error_html);
                            setTimeout(function(){
                                $('#errors').html('');
                            }, 10000);
                        }
                        else
                        {
                            location.reload();
                        }
                    },error:function(data){
                       
                    }
                });
            }
        }

        function settings(){     
            var currency=$("#currency").val();
            var tax=$("#tax").val();
            var delivery_charge=$("#delivery_charge").val();
            var max_order_qty=$("#max_order_qty").val();
            var min_order_amount=$("#min_order_amount").val();
            var max_order_amount=$("#max_order_amount").val();
            var lat=$("#lat").val();
            var lang=$("#lang").val();
            var CSRF_TOKEN = $('input[name="_token"]').val();
            
            if($("#settings").valid()) {
                $('#preloader').show();
                $.ajax({
                    headers: {
                        'X-CSRF-Token': CSRF_TOKEN 
                    },
                    url:"{{ url('admin/settings') }}",
                    method:'POST',
                    data:{'currency':currency,'tax':tax,'lat':lat,'lang':lang,'delivery_charge':delivery_charge,'max_order_qty':max_order_qty,'min_order_amount':min_order_amount,'max_order_amount':max_order_amount},
                    dataType:"json",
                    success:function(data){
                      $('#preloader').hide();
                        $("#loading-image").hide();
                        if(data.error.length > 0)
                        {
                            var error_html = '';
                            for(var count = 0; count < data.error.length; count++)
                            {
                                error_html += '<div class="alert alert-danger mt-1">'+data.error[count]+'</div>';
                            }
                            $('#errors').html(error_html);
                            setTimeout(function(){
                                $('#errors').html('');
                            }, 10000);
                        }
                        else
                        {
                            location.reload();
                        }
                    },error:function(data){
                       
                    }
                });
            }
        }

        $(document).ready(function() {
            $( "#settings" ).validate({
                rules :{
                    currency:{
                        required: true
                    },
                    tax: {
                        required: true,
                    },                    
                },

            });        
        });

        $(document).ready(function() {
            $( "#change_password_form" ).validate({
                rules :{
                    oldpassword:{
                        required: true,
                        minlength:6
                    },
                    newpassword: {
                        required: true,
                        minlength:6,
                        maxlength:12,

                    },
                    confirmpassword: {
                        required: true,
                        equalTo: "#newpassword",
                        minlength:6,

                    },
                    
                },

            });        
        });
        var noticount = 0;

        (function noti() {
          var CSRF_TOKEN = $('input[name="_token"]').val();
          $.ajax({
              headers: {
                  'X-CSRF-Token': CSRF_TOKEN 
              },
              url:"{{ url('admin/getorder') }}",
              method: 'GET', //Get method,
              dataType:"json",
              success:function(response){
                noticount = localStorage.getItem("count");

                $('#notificationcount').text(response);
                if (response != 0) {
                  if (noticount != response) {
                    localStorage.setItem("count", response);

                    var audio = new Audio('https://infotechgravity.com/staging/public/assets/notification/notification.mp3');
                    audio.play();
                  }
                }else{
                  localStorage.setItem("count", response);
                }
                setTimeout(noti, 5000);
              }
          });
        })();

        function clearnoti(){
            var CSRF_TOKEN = $('input[name="_token"]').val();
            
            $.ajax({
                headers: {
                    'X-CSRF-Token': CSRF_TOKEN 
                },
                url:"{{ url('admin/clearnotification') }}",
                dataType:"json",
                success:function(response){
                    console.log(response);
                }
            });
        }
        $('#tax').keyup(function(){
            var val = $(this).val();
            if(isNaN(val)){
                 val = val.replace(/[^0-9\.]/g,'');
                 if(val.split('.').length>2) 
                     val =val.replace(/\.+$/,"");
            }
            $(this).val(val); 
        });

        $('#delivery_charge').keyup(function(){
            var val = $(this).val();
            if(isNaN(val)){
                 val = val.replace(/[^0-9\.]/g,'');
                 if(val.split('.').length>2) 
                     val =val.replace(/\.+$/,"");
            }
            $(this).val(val); 
        });

        $('#min_order_amount').keyup(function(){
            var val = $(this).val();
            if(isNaN(val)){
                 val = val.replace(/[^0-9\.]/g,'');
                 if(val.split('.').length>2) 
                     val =val.replace(/\.+$/,"");
            }
            $(this).val(val); 
        });

        $('#max_order_qty').keyup(function(){
            var val = $(this).val();
            if(isNaN(val)){
                 val = val.replace(/[^0-9\.]/g,'');
                 if(val.split('.').length>2) 
                     val =val.replace(/\.+$/,"");
            }
            $(this).val(val); 
        });

        $('#max_order_amount').keyup(function(){
            var val = $(this).val();
            if(isNaN(val)){
                 val = val.replace(/[^0-9\.]/g,'');
                 if(val.split('.').length>2) 
                     val =val.replace(/\.+$/,"");
            }
            $(this).val(val); 
        });
    </script>
</body>

</html>
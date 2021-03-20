<!DOCTYPE html>
<html class="h-100" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Register</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/images/favicon.png">
    <link href="{{asset('public/assets/css/style.css')}}" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    
</head>

<?php 
$message = "";
echo $message;?>
<body class="h-100">
    <div class="login-form-bg h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100">
                <div class="col-xl-6">
                    <div class="form-input-content">
                        <div class="card login-form mb-0">
                            <div class="card-body pt-5">
                                <a class="text-center" href="#"><center><img src="{!! asset('public/assets/images/logo.png') !!}" height="70" width="120" alt=""></center></a>
                                <form method="POST" class="mt-5 mb-5 login-input" action="{{ route('register') }}">
                                    @csrf
                                    <div class="form-group row">
                                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Name">
                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                    </div>
                                    <div class="form-group row">
                                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email">
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                    </div>
                                    <div class="form-group row">
                                            <input id="mobile" type="tel" class="form-control @error('mobile') is-invalid @enderror" name="mobile" value="{{ old('mobile') }}" required  placeholder="Mobile Number" pattern="[0-9]{4}[0-9]{3}[0-9]{3}">
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                    </div>
                                    <div class="form-group row">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="gender" value="male" checked>
                                            <label class="form-check-label" for="exampleRadios1">
                                                Male
                                            </label>
                                        </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="gender" value="female">
                                            <label class="form-check-label" for="exampleRadios2">
                                                Female
                                            </label>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                            <input id="college_id" type="text" class="form-control" name="college_id" required  value="{{ old('college_id') }}" placeholder="College ID(Registration No)">
                                    </div>
                                    <div class="form-group row">
                                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Password">
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                    </div>
                                    <div class="form-group row">
                                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm Password">
                                    </div>
                                    <div class="form-group row">
                                            <select name="college" class="custom-select mb-3 item" id="college_list" required>
                                                <option value="" selected>College Name</option>
                                                <option value="Poornima University">Poornima University</option>
                                                <option value="Other">Other College</option>
                                            </select> 
                                    </div>
                                    <button type="submit" class="btn login-form__btn submit w-100">
                                        {{ __('Register') }}
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
$(document).ready(function() {
  $("#college_list").change(function(){
    if($("#college_list").val()=="Other"){
      var html='<div class="form-group row" id="other_college"><input id="text" type="text" class="form-control name="college_name" required placeholder="Other College Name"></div>';
      $(html).insertAfter($("#college_list").parent());
    }else{
      $("#college_list").attr("name","college");
      $("#other_college").remove();
    }
  });
});
    </script>
    <!--**********************************
        Scripts
    ***********************************-->
    <script src="{{asset('public/assets/plugins/common/common.min.js')}}"></script>
    <script src="{{asset('public/assets/js/custom.min.js')}}"></script>
    <script src="{{asset('public/assets/js/settings.js')}}"></script>
    <script src="{{asset('public/assets/js/gleek.js')}}"></script>
    <script src="{{asset('public/assets/js/styleSwitcher.js')}}"></script>
</body>
</html>

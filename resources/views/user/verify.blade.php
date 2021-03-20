<!DOCTYPE html>
<html>
<head>
<script>
 	function mob(){
	if(screen.width<600) document.getElementsByClassName('container')[0].style.transform = 'scale(1.5)';
	else document.getElementsByClassName('container')[0].style.transform = 'scale(1)'}
	setInterval(() => {
		mob();
	},100 );
	</script>
	<title>SignUp and Login</title>
	<link rel="stylesheet" type="text/css" href="{{asset('public/assets/front/css/style1.css')}}">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="icon" href="{!! asset('public/assets/front/images/favicon.jpg') !!}" type="image/jpg" sizes="16x16">
	
</head>
<?php $panel = "";?>
@if ($error_message == "Invalid OTP Please Try Again." )
		<?php $panel = '<span class="invalid-feedback" role="alert">
            <strong style="color:red;">Invalid OTP Please Try Again.</strong>
        </span>';?>
@elseif ($error_message == "Invalid Email Address")
        <?php $panel = '<span class="invalid-feedback" role="alert">
            <strong style="color:red;">Somthing Went Worng Contact To +91 8224986701</strong>
        </span>';?>
@elseif ($error_message == "OTP Sended Successfully !")
        <?php $panel = '<span class="invalid-feedback" role="alert">
            <strong style="color:green;">OTP Sended Successfully !</strong>
        </span>';?>
@else
    <?php $panel = "";?>
@endif    
<body>
<section class="big"><br><br><br><br><br><br><br><br><br><br>
<div  class="container" id="container">
<div class="form-container sign-up-container">
</div>
<div class="form-container sign-in-container">
<form method="POST"  action="{{ url('/verified') }}">
        @csrf
	<h1 style="color: white;">OTP Verification</h1>
	<input id="otp" type="text" class="form-control @error('otp') is-invalid @enderror" name="otp" required autocomplete="otp" autofocus placeholder="Enter OTP">
        <?php echo $panel;?>
        <a href="{{ url('/resend') }}">{{ __('Did not recive OTP ? Resend Now') }}</a>
	<button type="submit"> {{ __('Verify') }}</button>
	</form>
</div>
<div class="overlay-container">
	<div class="overlay">
		<div class="overlay-panel overlay-right">
			<h1>Please Verify Your Account</h1>
			<h4>Enter OTP You have Received On your Email : <b>{{$auth_user_d->email}}</b></h4>
		</div>
	</div>
</div>
</div>
<h2 class="text-center text-white"><a href="{{ url('/') }}">Back to home</a></h2>
<script type="text/javascript">
	const signUpButton = document.getElementById('signUp');
	const signInButton = document.getElementById('signIn');
	const container = document.getElementsByClassName('container')[0];
</script>

</div>
</section>
</body>

</html>
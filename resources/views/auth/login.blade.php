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
	
</head>

<body>
<?php $panel = "container";?>
@error('email')	
	@if ($message == "These credentials do not match our records." )
		<?php $panel = "container";?>
	@elseif ($message == "Invalid Poornima Email ID." OR "The email has already been taken." )
		<?php $panel = "container right-panel-active";?>
	@else
		<?php $panel = "container";?>
	@endif    
@enderror
@error('mobile')
	@if ($message == "The mobile has already been taken.")
		<?php $panel = "container right-panel-active";?>
	@else
		<?php $panel = "container";?>
	@endif    
@enderror
@error('password')
	@if ($message == "The password do not match.")
		<?php $panel = "container right-panel-active";?>
	@else
		<?php $panel = "container";?>
	@endif    
@enderror
<section class="big"><br><br><br><br><br><br><br><br><br><br>
<div  class="<?php echo $panel;?>" id="container">
<div class="form-container sign-up-container">
<form method="POST" action="{{ route('register') }}">
    @csrf
	<h1 style="color: white;">Create Account</h1>
	
	<span>or use your email for registration</span>
	<input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Name">
    @error('name')
        <span class="invalid-feedback" role="alert">
            <strong style="color:red;">{{ $message }}</strong>
        </span>
    @enderror
	<input id="mobile" type="tel" class="form-control @error('mobile') is-invalid @enderror" name="mobile" value="{{ old('mobile') }}" required  placeholder="Mobile Number" pattern="[0-9]{4}[0-9]{3}[0-9]{3}">
    @error('mobile')
        <span class="invalid-feedback" role="alert">
            <strong style="color:red;">{{ $message }}</strong>
        </span>
    @enderror
	<input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email">
    @error('email')
        <span class="invalid-feedback" role="alert">
            <strong style="color:red;">{{ $message }}</strong>
        </span>
    @enderror
	<input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Password">
    @error('password')
        <span class="invalid-feedback" role="alert">
            <strong style="color:red;">{{ $message }}</strong>
        </span>
    @enderror
	<input id="password-confirm_r" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm Password">
	<select style="width:95%; height:5% ;margin-top:5px;margin-bottom:5px;" name="gender">
		<option>Select Gender</option>
		<option value="male">Male</option>
		<option value="female">Female</option>
    </select>    
	<input id="college_id" type="text" class="form-control" name="college_id" required  value="{{ old('college_id') }}" placeholder="College ID(Registration No)">
	<button type="submit">
      {{ __('Register') }}
    </button>
</form>
</div>
<div class="form-container sign-in-container">
<form method="POST"  action="{{ route('login') }}">
        @csrf
	<h1 style="color: white;">Sign In</h1>
	<input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email">

    @error('email')
        <span class="invalid-feedback" role="alert">
            <strong style="color:red;">{{ $message }}</strong>
        </span>
    @enderror
    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">
    @error('password')
        <span class="invalid-feedback" role="alert">
        <strong style="color:red;">{{ $message }}</strong>
        </span>
    @enderror

    @if (Route::has('password.request'))
        <a href="{{ url('/forgot') }}">{{ __('Forgot Your Password?') }}</a>
    @endif
	<button type="submit"> {{ __('Login') }}</button>
	</form>
</div>
<div class="overlay-container">
	<div class="overlay">
		<div class="overlay-panel overlay-left">
			<h1>Welcome Back!</h1>
			<p>To keep connected with us please login with your personal info</p>
			<button class="ghost" id="signIn">Sign In</button>
		</div>
		<div class="overlay-panel overlay-right">
			<h1>Hello, Friend!</h1>
			<p>Do not have an account</p>
			<button class="ghost" id="signUp">Register</button>
		</div>
	</div>
</div>
</div>
<h2 class="text-center text-white"><a href="{{ url('/') }}">Back to home</a></h2>
<script type="text/javascript">
	const signUpButton = document.getElementById('signUp');
	const signInButton = document.getElementById('signIn');
	const container = document.getElementsByClassName('container')[0];

	signUpButton.addEventListener('click', () => {
		container.classList.add("right-panel-active");
	});
	signInButton.addEventListener('click', () => {
		container.classList.remove("right-panel-active");
	});
</script>

</div>
</section>
</body>

</html>
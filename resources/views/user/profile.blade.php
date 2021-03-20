<!DOCTYPE html>
<html lang="en">

<head>
	<title>PU Lakshya 2021</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="utf-8">
	<meta name="keywords"
		content="Lakshya 2021,Pu Lakshya,Poornima University College fest,Lakshya poornima,college fest 2020,lakshya 2021 jaipur">
	<meta name="description" content="LAKSHYA Is An Inter University Sports, Cultural Fest Which Is Hosted By The University Annually. It Provides An Opportunity To All The Students Of Various Colleges/University 											
To Compete And Showcase Their Talent In Various Fields Of Club, Sports And Cultural Events.">
	<script
		type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
		integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
	<!-- bootstrap-css -->
	<link href="{!! asset('public/assets/front/css/bootstrap.css') !!}" rel="stylesheet" type="text/css" media="all" />
	<!--// bootstrap-css -->
	<!-- css -->
	<link rel="stylesheet" href="{!! asset('public/assets/front/css/style.css') !!}" type="text/css" media="all" />
	<link href="{!! asset('public/assets/front/css/jQuery.lightninBox.css') !!}" rel="stylesheet" type="text/css"
		media="all" />
	<link rel="stylesheet" href="{!! asset('public/assets/front/css/css/flexslider.css') !!}" type="text/css"
		media="screen" property="" />
	<!-- animation -->
	<link href="{!! asset('public/assets/front/css/aos.css') !!}" rel="stylesheet" type="text/css" media="all" />
	<link rel="icon" href="{!! asset('public/assets/front/images/favicon.jpg') !!}" type="image/jpg" sizes="16x16">
	<!-- //animation effects-css-->
	<!-- //animation -->
	<!--// css -->
	<!-- font-awesome icons -->
	<link href="{!! asset('public/assets/front/css/font-awesome.css') !!}" rel="stylesheet">
	<!-- //font-awesome icons -->
	<!-- font -->
	<link href="/fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700,800" rel="stylesheet">
	<link href="/fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
	<link href="/fonts.googleapis.com/css?family=Oswald:400,500,600,700" rel="stylesheet">
	<!-- //font -->
	<script src="{!! asset('public/assets/front/js/jquery-2.2.3.min.js') !!}"></script>
	<script src="{!! asset('public/assets/front/js/bootstrap.js') !!}"></script>
	<style>
.modal1 {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 5; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width:100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.modal-content1 {
  background-image: url("images/avback.jpg");
  color: white;
  margin: auto;
  float: right;
  padding: 20px;
  border: none;
  width: 30%;
  height: 80vh;
}

/* The Close Button */
.close {
  color: white;
  text-align: center;
  font-size: 35px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: white;
  text-decoration: bold;
  cursor: pointer;
}
.avatar {
  vertical-align: middle;
  width: 30px;
  height: 30px;
  border-radius: 10%;
 }
 .box {
  background-color: white;
  width: 550px;
  text-align:left;
  border: black;
  height:500px;
  padding: 50px;
  /* margin: 100px; */
}

</style>
</head>
<div class="bgback3">
    @include('usertheme.header')
	<script>
//alert("hi");
$(document).ready(function(){
    $("#overlay-text").hide();
    $(".card").hover(function(){
        $("#overlay-text").toggle(750);
    });
})
</script>
<center>
<div class="box" style="font-family:georgia; padding-left:50px;background-color:rgba(0,0,0,0.8);box-shadow: 5px 5px black inset 2px 2px red; !!}');width:auto;color:white;font-size:1.2em;">
<h3 style="color:#c0c0c0;">My Profile</h3><br>
<ul>
    	<li><span style="color:#ffd700;">Name:</span> <span style="color:#c0c0c0;"> {{$auth_user_d->name}}</li><br>
    	<li><span style="color:#ffd700;">Mail:</span><span style="color:#c0c0c0;"> {{$auth_user_d->email}}</li><br>
    	<li><span style="color:#ffd700;">Gender:</span> <span style="color:#c0c0c0;">{{$auth_user_d->gender}}</li><br>
    	<li><span style="color:#ffd700;">College Name:</span><span style="color:#c0c0c0;"> {{$auth_user_d->college}}</li><br>
    	<li><span style="color:#ffd700;">College Id: </span><span style="color:#c0c0c0;">{{$auth_user_d->college_id}}</li><br>
    	<li><span style="color:#ffd700;">My Events: </li>
    </ul>
	
	<?php
								foreach ( $myevents as $events) {
						   ?>
		<div class="row mt-3">
			<div class="col-lg-4 col-md-4 col-sm-12">
				<h4 class="text-white text-uppercase">{{$events->events.e_name}}</h4>
			</div>
			<div class="col-lg-4 col-md-4 col-sm-12">
				<h4 class="text-white text-uppercase"></h4>
			</div>
			<div class="col-lg-4 col-md-4 col-sm-12">
				<h4 class="text-white text-uppercase"></h4>
			</div>
				
		</div>

		<?php
        						}
        					?>

	</div>
</center>
<!-- footer -->
@include('usertheme.footer')
		<!-- //footer -->

		<!-- js for portfolio lightbox -->
		<script src="{!! asset('public/assets/front/js/jQuery.lightninBox.js') !!}"></script>
		<script type="text/javascript">
			$(".lightninBox").lightninBox();
		</script>
		<!-- /js for portfolio lightbox -->
		<!-- flexSlider -->
		<script defer src="{!! asset('public/assets/front/js/jquery.flexslider.js') !!}"></script>
		<script type="text/javascript">
			$(window).load(function () {
				$('.flexslider').flexslider({
					animation: "slide",
					start: function (slider) {
						$('body').removeClass('loading');
					}
				});
			});
		</script>
		<!-- //flexSlider -->

		<script type="text/javascript" src="{!! asset('public/assets/front/js/move-top.js') !!}"></script>
		<script type="text/javascript" src="{!! asset('public/assets/front/js/easing.js') !!}"></script>

		<script src="{!! asset('public/assets/front/js/jarallax.js') !!}"></script>
		<script src="{!! asset('public/assets/front/js/SmoothScroll.min.js') !!}"></script>
		<script type="text/javascript">
			/* init Jarallax */
			$('.jarallax').jarallax({
				speed: 0.5,
				imgWidth: 1366,
				imgHeight: 768
			})
		</script><!-- here stars scrolling icon -->
		<script type="text/javascript">
			$(document).ready(function () {
				/*
					var defaults = {
					containerID: 'toTop', // fading element id
					containerHoverID: 'toTopHover', // fading element hover id
					scrollSpeed: 1200,
					easingType: 'linear' 
					};
				*/

				$().UItoTop({ easingType: 'easeOutQuart' });

			});
		</script>
		<!-- //here ends scrolling icon -->
		<!-- scrolling script -->
		<script type="text/javascript">
			jQuery(document).ready(function ($) {
				$(".scroll").click(function (event) {
					event.preventDefault();
					$('html,body').animate({ scrollTop: $(this.hash).offset().top }, 1000);
				});
			});
		</script>
		<!-- //scrolling script -->
		<!-- animation effects-js files-->
		<script src="{!! asset('public/assets/front/js/aos.js') !!}"></script><!-- //animation effects-js-->
		<script src="{!! asset('public/assets/front/js/aos1.js') !!}"></script><!-- //animation effects-js-->
		<!-- animation effects-js files-->
	</section>
</body>

</html>
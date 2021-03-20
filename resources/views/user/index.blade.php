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
		<link rel="icon" href="{!! asset('public/assets/front/images/favicon.jpg') !!}" type="image/jpg" sizes="16x16">
	<!-- animation -->
	<link href="{!! asset('public/assets/front/css/aos.css') !!}" rel="stylesheet" type="text/css" media="all" />
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
			display: none;
			/* Hidden by default */
			position: fixed;
			/* Stay in place */
			z-index: 5;
			/* Sit on top */
			padding-top: 100px;
			/* Location of the box */
			left: 0;
			top: 0;
			width: 100%;
			/* Full width */
			height: 100%;
			/* Full height */
			overflow: auto;
			/* Enable scroll if needed */
			background-color: rgb(0, 0, 0);
			/* Fallback color */
			background-color: rgba(0, 0, 0, 0.4);
			/* Black w/ opacity */
		}

		/* Modal Content */
		.modal-content1 {
			background-image: url("{!! asset('public/assets/front/images/avback.jpg') !!}");
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
	</style>
</head>

<body>
	<section class="site">
		<!-- w3-banner -->
		<div class="w3-banner jarallax">
			<div class="wthree-different-dot">
				<div class="head">
					@include('usertheme.header')
				</div>
				<!-- banner -->
				<div class="banner">
					<div class="container">
						<div class="slider">

							<script src="{!! asset('public/assets/front/js/responsiveslides.min.js') !!}"></script>
							<script>
								// You can also use "$(window).load(function() {"
								$(function () {
									// Slideshow 4
									$("#slider3").responsiveSlides({
										auto: true,
										pager: true,
										nav: true,
										speed: 500,
										namespace: "callbacks",
										before: function () {
											$('.events').append("<li>before event fired.</li>");
										},
										after: function () {
											$('.events').append("<li>after event fired.</li>");
										}
									});
								});
							</script>
							<div id="top" class="callbacks_container-wrap">
								<ul class="rslides" id="slider3">
									<li>
										<div class="slider-info" data-aos="fade-left">
											<h1 style="text-shadow: 2px 2px black"><b><u>Poornima univeristy Presents
											</h1>
											</font></b></u>
											<h3><b>PU Lakshya 2021</h3></b>
											<h2><b>March 4-6, 2021</h2>
											</font></b>
											<div class="more-button">
												<a href="#" data-toggle="modal" data-target="#myModal1">More About
													Lakshya</a>
											</div>
										</div>
									</li>
									<li>
										<div class="slider-info" data-aos="fade-left">
											<h2>PARTY OF THIS YEAR</h2>
											</font>
											<h3>Lakshya Sports and Cultural Event</h3>
											<h2><b>The biggest Fest of the year is here</h2>
											</font></b>
											<div class="more-button">
												<a href="#" data-toggle="modal" data-target="#myModal1">More About
													Lakshya</a>
											</div>
										</div>
									</li>
									<li>
										<div class="slider-info" data-aos="fade-left">
											<h2>This time even more bigger</font>
											</h2>
											<h3>Fill your life</h3>
											<h2><b>With Joy , Fun and Loads of Adventure </b></h2>
											</font>
											<div class="more-button">
												<a href="#" data-toggle="modal" data-target="#myModal1">More About
													Lakshya</a>
											</div>
										</div>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
				<!-- //banner -->
			</div>
		</div>
		<!-- //w3-banner -->
		<!-- modal -->
		<div class="modal about-modal fade" id="myModal1" tabindex="-1" role="dialog">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
								aria-hidden="true">&times;</span></button>
						<h4 class="modal-title">PU Lakshya 2021</h4>
					</div>
					<div class="modal-body">
						<div class="agileits-w3layouts-info">
							<img src="{!! asset('public/assets/front/images/b1.jpg') !!}" alt="" />
							<p>LAKSHYA Is An Inter University Sports, Cultural Fest Which Is Hosted By The University
								Annually. It Provides An Opportunity To All The Students Of Various Colleges/University
								To Compete And Showcase Their Talent In Various Fields Of Club, Sports And Cultural
								Events. The Fest Will Be Organised From January 21 to 24 2020 Comprising Of Many Type Of
								Activities Along With Heckathon Event And National Level American Football Championship.
								The Fest Comes Up With Many Cultural Activities This Time With Cultural Evenings Which
								Will Make The Students Enjoy To The Fullest.<br> ↪ Fully Enthusiastic Environment<br>
								↪ More Than 50 Technical And Cultural Events<br>
								↪ Participants From Various Colleges Around India</p>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- //modal -->
		<div class="banner-bottom" id="about">
			<div class="container">
				<h3 class="heading-agileinfo" data-aos="zoom-in">Major Events at Glance<span>Lakshya Is A Professionally
						Managed Event</span></h3>

				<div class="col-md-4 agileits_services_grid" data-aos="fade-right">
					<div class="w3_agile_services_grid1">
						<img src="{!! asset('public/assets/front/images/a1.jpg') !!}" alt=" " class="img-responsive">
					</div>
					<h3>Cultural Programs </h3>
					<p>We know that the students who sing and dance well gets very less opportunities to showcase their
						talents. Cultural events such as dance competetion, singing competetion, fashion shows and AD
						MAD are organized.</p>

				</div>
				<div class="w3ls_banner_bottom_grids">
					<div class="col-md-4 agileits_services_grid" data-aos="fade-right">
						<div class="w3_agile_services_grid1">
							<img src="{!! asset('public/assets/front/images/a2.jpg') !!}" alt=" "
								class="img-responsive">
							<div class="w3_blur"></div>
						</div>
						<h3>Sports Activities</h3>
						<p>To let the students of PU and other colleges, face the competence in different kind of
							sports, such as track events, field events, soccer and basketball. Lakshya involves inter
							college as well as intra college sports competetion.
						</p>

					</div>
					<div class="col-md-4 agileits_services_grid" data-aos="fade-right">
						<div class="w3_agile_services_grid1">
							<img src="{!! asset('public/assets/front/images/a3.jpg') !!}" alt=" "
								class="img-responsive">
							<div class="w3_blur"></div>
						</div>
						<h3>Club Events</h3>
						<p>Club events are basically indoor events including games and other activities such as open
							mic, chess championship, scavenger hunt and IPL Auction. Thease events are for fun &
							entertainment of students of different Universities.</p>
					</div>


					<div class="col-md-4 agileits_services_grid" data-aos="fade-up">
						<div class="w3_agile_services_grid1">
							<img src="{!! asset('public/assets/front/images/a4.jpg') !!}" alt=" "
								class="img-responsive">
							<div class="w3_blur"></div>
						</div>
						<h3>Technical Events</h3>
						<p> The technical events such as hackathons, codesmith, robowar, and lan gaming competition are
							held in Lakshya.</p>

					</div>
				</div>

				<div class="col-md-4 agileits_services_grid" data-aos="fade-left">
					<div class="w3_agile_services_grid1">
						<img src="{!! asset('public/assets/front/images/a5.jpg') !!}" alt=" " class="img-responsive">
						<div class="w3_blur"></div>
					</div>
					<h3>Non-Stop Party</h3>
					<p>Endless DJ parties, gatherings, bonfire, Celebrity night are waiting for you.</p>

					<div class="clearfix"> </div>
				</div>
			</div>
		</div>
		<!-- services -->
		<div class="services jarallax" id="services">
			<h3 class="heading-agileinfo" data-aos="zoom-in">Services<span class="thr"></span></h3>
			<div class="container">

				<div class="col-md-4 ser-1" data-aos="fade-right">
					<div class="grid1">

						<h4>Food and Accomodation Services</h4>
						<p>All kinds of accomodotion and food services are available for guests.</p>
					</div>
				</div>
				<div class="col-md-4 ser-1" data-aos="fade-down">
					<div class="grid1">

						<h4>24X7 assistance</h4>
						<p>Proper assistance will be provided at all time. </p>
					</div>
				</div>
				<div class="col-md-4 ser-1" data-aos="fade-left">
					<div class="grid1">

						<h4>Emergency Services</h4>
						<p>Services like ambulance and medical assistance will be provided in case of any injury while
							playing outdoors sports games.</p>
					</div>
				</div>


				<div class="clearfix"></div>

			</div>
		</div>
		<!-- //services -->

		<!-- Portfolio section -->
		<section class="portfolio-agileinfo" id="gallery">
			<div class="container">
				<h3 class="heading-agileinfo" data-aos="zoom-in">Gallery<span></span></h3>
				<div class="gallery-grids">
					<div class="tab_img">

						<div class="col-md-3 col-sm-6 col-xs-6 portfolio-grids" data-aos="zoom-in">
							<a href="{!! asset('public/assets/front/images/g1.jpg') !!}"
								class="b-link-stripe b-animate-go lightninBox" data-lb-group="1">
								<img src="{!! asset('public/assets/front/images/g1.jpg') !!}" class="img-responsive"
									alt="w3ls" />
								<div class="b-wrapper">
									<i class="fa fa-search-plus" aria-hidden="true"></i>

								</div>
							</a>
						</div>
						<div class="col-md-3 col-sm-6 col-xs-6 portfolio-grids" data-aos="zoom-in">
							<a href="{!! asset('public/assets/front/images/g3.jpg') !!}"
								class="b-link-stripe b-animate-go lightninBox" data-lb-group="1">
								<img src="{!! asset('public/assets/front/images/g3.jpg') !!}" class="img-responsive"
									alt="w3ls" />
								<div class="b-wrapper">
									<i class="fa fa-search-plus" aria-hidden="true"></i>

								</div>
							</a>
						</div>
						<div class="col-md-3 col-sm-6 col-xs-6 portfolio-grids" data-aos="zoom-in">
							<a href="{!! asset('public/assets/front/images/g4.jpg') !!}"
								class="b-link-stripe b-animate-go lightninBox" data-lb-group="1">
								<img src="{!! asset('public/assets/front/images/g4.jpg') !!}" class="img-responsive"
									alt="w3ls" />
								<div class="b-wrapper">
									<i class="fa fa-search-plus" aria-hidden="true"></i>

								</div>
							</a>
						</div>
						<div class="col-md-3 col-sm-6 col-xs-6 portfolio-grids" data-aos="zoom-in">
							<a href="{!! asset('public/assets/front/images/g5.jpg') !!}"
								class="b-link-stripe b-animate-go lightninBox" data-lb-group="1">
								<img src="{!! asset('public/assets/front/images/g5.jpg') !!}" class="img-responsive"
									alt="w3ls" />
								<div class="b-wrapper">
									<i class="fa fa-search-plus" aria-hidden="true"></i>

								</div>
							</a>
						</div>
						<div class="col-md-3 col-sm-6 col-xs-6 portfolio-grids" data-aos="zoom-in">
							<a href="{!! asset('public/assets/front/images/g6.jpg') !!}"
								class="b-link-stripe b-animate-go lightninBox" data-lb-group="1">
								<img src="{!! asset('public/assets/front/images/g6.jpg') !!}" class="img-responsive"
									alt="w3ls" />
								<div class="b-wrapper">
									<i class="fa fa-search-plus" aria-hidden="true"></i>

								</div>
							</a>
						</div>
						<div class="col-md-3 col-sm-6 col-xs-6 portfolio-grids" data-aos="zoom-in">
							<a href="{!! asset('public/assets/front/images/g7.jpg') !!}"
								class="b-link-stripe b-animate-go lightninBox" data-lb-group="1">
								<img src="{!! asset('public/assets/front/images/g7.jpg') !!}" class="img-responsive"
									alt="w3ls" />
								<div class="b-wrapper">
									<i class="fa fa-search-plus" aria-hidden="true"></i>

								</div>
							</a>
						</div>
						<div class="col-md-3 col-sm-6 col-xs-6 portfolio-grids" data-aos="zoom-in">
							<a href="{!! asset('public/assets/front/images/g8.jpg') !!}"
								class="b-link-stripe b-animate-go lightninBox" data-lb-group="1">
								<img src="{!! asset('public/assets/front/images/g8.jpg') !!}" class="img-responsive"
									alt="w3ls" />
								<div class="b-wrapper">
									<i class="fa fa-search-plus" aria-hidden="true"></i>

								</div>
							</a>
						</div>
						<div class="col-md-3 col-sm-6 col-xs-6 portfolio-grids" data-aos="zoom-in">
							<a href="{!! asset('public/assets/front/images/g2.jpg') !!}"
								class="b-link-stripe b-animate-go lightninBox" data-lb-group="1">
								<img src="{!! asset('public/assets/front/images/g2.jpg') !!}" class="img-responsive"
									alt="w3ls" />
								<div class="b-wrapper">
									<i class="fa fa-search-plus" aria-hidden="true"></i>

								</div>
							</a>
						</div>

						<div class="clearfix"> </div>
					</div>

				</div>
			</div>
		</section>
		<!-- event schedule -->
		<div class="event-time " id="event">
			<div class="container">
				<h3 class="heading-agileinfo" data-aos="zoom-in">News & Events<span>Events Is A Professionally Managed
						Event</span></h3>
				<div class="testi-info">
					
					<!-- Tab panes -->
					<div class="tab-content">
						<div role="tabpanel" class="tab-pane active" id="testi">
							<div class="eventmain-info">
								<div class="event-subinfo">
									<div class="col-md-6  w3-latest-grid">
										<div class="col-md-6 col-xs-6 event-right eventtxt-right" data-aos="fade-down">
											<img src="{!! asset('public/assets/front/images/g7.jpg') !!}"
												class="img-responsive" alt="">
										</div>
										<div class="col-md-6 col-xs-6 event-left" data-aos="fade-right">
											<h5>8-10 March,2021</h5>

											<p>
											</p>
											<h6>
												<span class="icon-event" aria-hidden="true"></span>
											</h6>
											<a href="#" data-toggle="modal" data-target="#myModal">view details</a>
										</div>
										<div class="clearfix"> </div>
									</div>
									<div class="col-md-6 w3-latest-grid">
										<div class="col-md-6 col-xs-6 event-right" data-aos="fade-up">
											<img src="{!! asset('public/assets/front/images/g1.jpg') !!}"
												class="img-responsive" alt="">
										</div>
										<div class="col-md-6 col-xs-6 event-left in-news" data-aos="fade-right">
										<h5>8-10 March,2021</h5>

											<p>
											</p>
											<h6>
												<span class="icon-event" aria-hidden="true"></span>
											</h6>
											<a href="#" data-toggle="modal" data-target="#myModal">view details</a>
										</div>
										<div class="clearfix"> </div>
									</div>
									<div class="clearfix"> </div>
								</div>
								<div class="event-subinfo">
									<div class="col-md-6 w3-latest-grid">
										<div class="col-md-6 col-xs-6 event-right  eventtxt-right" data-aos="fade-down">
											<img src="{!! asset('public/assets/front/images/g3.jpg') !!}"
												class="img-responsive" alt="">
										</div>
										<div class="col-md-6 col-xs-6 event-left" data-aos="fade-left">
										<h5>8-10 March,2021</h5>

											<p>
											</p>
											<h6>
												<span class="icon-event" aria-hidden="true"></span> 
											</h6>
											<a href="#" data-toggle="modal" data-target="#myModal">view details</a>
										</div>
										<div class="clearfix"> </div>
									</div>
									<div class="col-md-6 w3-latest-grid">
										<div class="col-md-6 col-xs-6 event-right" data-aos="fade-up">
											<img src="{!! asset('public/assets/front/images/g5.jpg') !!}"
												class="img-responsive" alt="">
										</div>
										<div class="col-md-6 col-xs-6 event-left in-news" data-aos="fade-right">
										<h5>8-10 March,2021</h5>

											<p>
											</p>
											<h6>
												<span class="icon-event" aria-hidden="true"></span> 
											</h6>
											<a href="#" data-toggle="modal" data-target="#myModal">view details</a>
										</div>

										<div class="clearfix"> </div>
									</div>
									<div class="clearfix"> </div><br>
									<b><a href="{{ url('/events') }}">Load More</a></b>
								</div>
							</div>
						</div>

						<div role="tabpanel" class="tab-pane" id="profile">
							<div class="eventmain-info">
								<div class="event-subinfo">
									<div class="col-md-6 w3-latest-grid">
										<div class="col-md-6 col-xs-6 event-right eventtxt-right">
											<img src="{!! asset('public/assets/front/images/g8.jpg') !!}"
												class="img-responsive" alt="">
										</div>
										<div class="col-md-6 col-xs-6 event-left">
											<h5>31 Dec,2017.</h5>

											<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit
											</p>
											<h6>
												<span class="icon-event" aria-hidden="true">venue:</span> Madison Avenue
											</h6>
											<a href="#" data-toggle="modal" data-target="#myModal">view details</a>
										</div>
										<div class="clearfix"> </div>
									</div>
									<div class="col-md-6 w3-latest-grid">
										<div class="col-md-6 col-xs-6 event-right">
											<img src="{!! asset('public/assets/front/images/g7.jpg') !!}"
												class="img-responsive" alt="">
										</div>
										<div class="col-md-6 col-xs-6 event-left in-news">
											<h5>31 Dec,2017.</h5>

											<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit
											</p>
											<h6>
												<span class="icon-event" aria-hidden="true">venue:</span> Madison Avenue
											</h6>
											<a href="#" data-toggle="modal" data-target="#myModal">view details</a>
										</div>
										<div class="clearfix"> </div>
									</div>
									<div class="clearfix"> </div>
								</div>
								<div class="event-subinfo">
									<div class="col-md-6 w3-latest-grid">
										<div class="col-md-6 col-xs-6 event-right  eventtxt-right">
											<img src="{!! asset('public/assets/front/images/g6.jpg') !!}"
												class="img-responsive" alt="">
										</div>
										<div class="col-md-6 col-xs-6 event-left">
											<h5>31 Dec,2017.</h5>

											<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit
											</p>
											<h6>
												<span class="icon-event" aria-hidden="true">venue:</span> Madison Avenue
											</h6>
											<a href="#" data-toggle="modal" data-target="#myModal">view details</a>
										</div>
										<div class="clearfix"> </div>
									</div>
									<div class="col-md-6 w3-latest-grid">
										<div class="col-md-6 col-xs-6 event-right">
											<img src="{!! asset('public/assets/front/images/g5.jpg') !!}"
												class="img-responsive" alt="">
										</div>
										<div class="col-md-6 col-xs-6 event-left in-news">
											<h5>31 Dec,2017.</h5>

											<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit
											</p>
											<h6>
												<span class="icon-event" aria-hidden="true">venue:</span> Madison Avenue
											</h6>
											<a href="#" data-toggle="modal" data-target="#myModal">view details</a>
										</div>
										<div class="clearfix"> </div>
									</div>
									<div class="clearfix"> </div><br>
									<b><button>Load More</button></b>

								</div>
							</div>
						</div>

						<div role="tabpanel" class="tab-pane" id="messages">
							<div class="eventmain-info">
								<div class="event-subinfo">
									<div class="col-md-6 w3-latest-grid">
										<div class="col-md-6 col-xs-6 event-right eventtxt-right">
											<img src="{!! asset('public/assets/front/images/g4.jpg') !!}"
												class="img-responsive" alt="">
										</div>
										<div class="col-md-6 col-xs-6 event-left">
											<h5>31 Dec,2018.</h5>

											<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit
											</p>
											<h6>
												<span class="icon-event" aria-hidden="true">venue:</span>Madison Avenue
											</h6>
											<a href="#" data-toggle="modal" data-target="#myModal">view details</a>
										</div>
										<div class="clearfix"> </div>
									</div>
									<div class="col-md-6 w3-latest-grid">
										<div class="col-md-6 col-xs-6 event-right">
											<img src="{!! asset('public/assets/front/images/g3.jpg') !!}"
												class="img-responsive" alt="">
										</div>
										<div class="col-md-6 col-xs-6 event-left in-news">
											<h5>31 Dec,2018.</h5>

											<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit
											</p>
											<h6>
												<span class="icon-event" aria-hidden="true">venue:</span>Madison Avenue
											</h6>
											<a href="#" data-toggle="modal" data-target="#myModal">view details</a>
										</div>
										<div class="clearfix"> </div>
									</div>
									<div class="clearfix"> </div>
								</div>
								<div class="event-subinfo">
									<div class="col-md-6 w3-latest-grid">
										<div class="col-md-6 col-xs-6 event-right  eventtxt-right">
											<img src="{!! asset('public/assets/front/images/g2.jpg') !!}"
												class="img-responsive" alt="">
										</div>
										<div class="col-md-6 col-xs-6 event-left">
											<h5>31 Dec,2018.</h5>

											<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit
											</p>
											<h6>
												<span class="icon-event" aria-hidden="true">venue:</span>Madison Avenue
											</h6>
											<a href="#" data-toggle="modal" data-target="#myModal">view details</a>
										</div>
										<div class="clearfix"> </div>
									</div>
									<div class="col-md-6 w3-latest-grid">
										<div class="col-md-6 col-xs-6 event-right">
											<img src="{!! asset('public/assets/front/images/g1.jpg') !!}"
												class="img-responsive" alt="">
										</div>
										<div class="col-md-6 col-xs-6 event-left in-news">
											<h5>31 Dec,2018.</h5>

											<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit
											</p>
											<h6>
												<span class="icon-event" aria-hidden="true">venue:</span>Madison Avenue
											</h6>
											<a href="#" data-toggle="modal" data-target="#myModal">view details</a>
										</div>
										<div class="clearfix"> </div>
									</div>
									<div class="clearfix"> </div><br>
									<b><button>Load More</button></b>
								</div>
							</div>
						</div>
						<div role="tabpanel" class="tab-pane" id="profile">
							<div class="eventmain-info">
								<div class="event-subinfo">
									<div class="col-md-6 w3-latest-grid">
										<div class="col-md-6 col-xs-6 event-right eventtxt-right">
											<img src="{!! asset('public/assets/front/images/g8.jpg') !!}"
												class="img-responsive" alt="">
										</div>
										<div class="col-md-6 col-xs-6 event-left">
											<h5>31 Dec,2017.</h5>

											<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit
											</p>
											<h6>
												<span class="icon-event" aria-hidden="true">venue:</span> Madison Avenue
											</h6>
											<a href="#" data-toggle="modal" data-target="#myModal">view details</a>
										</div>
										<div class="clearfix"> </div>
									</div>
									<div class="col-md-6 w3-latest-grid">
										<div class="col-md-6 col-xs-6 event-right">
											<img src="{!! asset('public/assets/front/images/g7.jpg') !!}"
												class="img-responsive" alt="">
										</div>
										<div class="col-md-6 col-xs-6 event-left in-news">
											<h5>31 Dec,2017.</h5>

											<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit
											</p>
											<h6>
												<span class="icon-event" aria-hidden="true">venue:</span> Madison Avenue
											</h6>
											<a href="#" data-toggle="modal" data-target="#myModal">view details</a>
										</div>
										<div class="clearfix"> </div>
									</div>
									<div class="clearfix"> </div>
								</div>
								<div class="event-subinfo">
									<div class="col-md-6 w3-latest-grid">
										<div class="col-md-6 col-xs-6 event-right  eventtxt-right">
											<img src="{!! asset('public/assets/front/images/g6.jpg') !!}"
												class="img-responsive" alt="">
										</div>
										<div class="col-md-6 col-xs-6 event-left">
											<h5>31 Dec,2017.</h5>

											<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit
											</p>
											<h6>
												<span class="icon-event" aria-hidden="true">venue:</span> Madison Avenue
											</h6>
											<a href="#" data-toggle="modal" data-target="#myModal">view details</a>
										</div>
										<div class="clearfix"> </div>
									</div>
									<div class="col-md-6 w3-latest-grid">
										<div class="col-md-6 col-xs-6 event-right">
											<img src="{!! asset('public/assets/front/images/g5.jpg') !!}"
												class="img-responsive" alt="">
										</div>
										<div class="col-md-6 col-xs-6 event-left in-news">
											<h5>31 Dec,2017.</h5>

											<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit
											</p>
											<h6>
												<span class="icon-event" aria-hidden="true">venue:</span> Madison Avenue
											</h6>
											<a href="#" data-toggle="modal" data-target="#myModal">view details</a>
										</div>
										<div class="clearfix"> </div>
									</div>
									<div class="clearfix"> </div><br>
									<b><button>Load More</button></b>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- //event schedule -->

		<!-- //Team section -->
		<!-- Stats -->
		<div class="stats news-w3layouts jarallax">
			<div class="container">
				<div class="stats-agileinfo agileits-w3layouts">
					<div class="col-sm-3 col-xs-6 stats-grid" data-aos="fade-right">
						<div class="stats-img">
							<i class="fa fa-users" aria-hidden="true"></i>
						</div>
						<p>Hours of music were played</p>
						<div class='numscroller numscroller-big-bottom' data-slno='1' data-min='0' data-max='30'
							data-delay='.5' data-increment="100">30</div>
					</div>
					<div class="col-sm-3 col-xs-6 stats-grid" data-aos="fade-up">
						<div class="stats-img w3-agileits">
							<i class="fa fa-calendar-check-o" aria-hidden="true"></i>
						</div>
						<p>Participations Last Year</p>
						<div class='numscroller numscroller-big-bottom' data-slno='1' data-min='0' data-max='1500'
							data-delay='8' data-increment="10"></div>
					</div>
					<div class="col-sm-3 col-xs-6 stats-grid" data-aos="fade-down">
						<div class="stats-img w3-agileits">
							<i class="fa fa-briefcase" aria-hidden="true"></i>
						</div>
						<p>Total Events Held Last Year</p>
						<div class='numscroller numscroller-big-bottom' data-slno='1' data-min='0' data-max='65'
							data-delay='.75' data-increment="1">5000</div>
					</div>
					<div class="col-sm-3 col-xs-6 stats-grid" data-aos="fade-left">
						<div class="stats-img w3-agileits">
							<i class="fa fa-trophy" aria-hidden="true"></i>
						</div>
						<p>Prize money distributed last year</p>
						<div class='numscroller numscroller-big-bottom' data-slno='1' data-min='0' data-max='150000'
							data-delay='8' data-increment="1000"></div>
					</div>
					<div class="clearfix"></div>
				</div>
				<!-- Progressive-Effects-Animation-JavaScript -->
				<script type="text/javascript"
					src="{!! asset('public/assets/front/js/numscroller-1.0.js') !!}"></script>
				<!-- //Progressive-Effects-Animation-JavaScript -->
			</div>
		</div>
		<!-- //Stats -->



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
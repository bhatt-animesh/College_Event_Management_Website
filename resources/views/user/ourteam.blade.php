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
      <link rel="stylesheet" href="{!! asset('public/assets/front/css/flexslider.css') !!}" type="text/css"
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
      <!-- w3-banner -->
      <div class="w3-banner1 jarallax">
      <div class="wthree-different-dot">
      <div class="head">
         <div class="container d-inline">
            <div class="navbar-top">
               <!-- Brand and toggle get grouped for better mobile display -->
               <div class="navbar-header">
                  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                     data-target="#bs-example-navbar-collapse-1">
                  <span class="sr-only">Toggle navigation</span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  </button>
                  <div class="navbar-brand logo ">
                     <a href="index.html"><img src="{!! asset('public/assets/front/images/logo.png') !!}"
                        alt=" " class="img-responsive"></a>
                  </div>
               </div>
               <!-- Collect the nav links, forms, and other content for toggling -->
               <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                  <ul class="nav navbar-nav link-effect-4 " style="display:inline;">
                     <li class="active first-list"><a href="index.html">Home</a></li>
                     <li><a href="{{ url('/events') }}">Events</a></li>
                     <li><a href="{{ url('/gallery') }}">Gallery</a></li>
                     <li><a href="{{ url('/results') }}">Results</a></li>
                     <li><a href="{{ url('/ourteam') }}">Our Team</a></li>
                     <li><a href="#">About Us</a></li>
                     @if (Route::has('login'))
                     @auth
                     <li><a href="{{ url('/admin/logout') }}">Logout</a></li>
                     <li>
                        <a id="myBtn" href="team.html">
                           <center><img src="{!! asset('public/assets/front/images/avtar.png') !!}"
                              alt="Avatar" class="avatar"></center>
                        </a>
                     </li>
                     @else
                     <li><a href="{{ route('login') }}">Register/Login</a></li>
                     @endauth
                     @endif
                  </ul>
               </div>
               <!-- /.navbar-collapse -->
            </div>
         </div>
      </div>
      <!-- Team section -->
      <section class="team" id="team">
         <div class="container p-5">
            <h3 class="heading-agileinfo" data-aos="zoom-in" style="font-size: 30px;">Core Team</h3>
            <section class="slider">
               <div class="flexslider">
                  <ul class="slides">
                     <li>
                        <div class="item g1">
                           <div class="team-grid-top">
						   <?php
								foreach ( $ourteam_core as $banner) {
						   ?>
                              <div class="col-md-3 team1" data-aos="fade-right">
                                 <div class="inner-team1">
                                    <img src="{!! asset('public/images/ourteam/'.$banner->image) !!}" alt="" />
                                    <h3>{{$banner->name}}</h3>
                                    <h4>{{$banner->committee_name}} Committee</h4>
                                    <p>Mobile Number : +91{{$banner->mobile}}</p>
                                 </div>
                              </div>
							<?php
        						}
        					?>
                              <div class="clearfix"></div>
                           </div>
                           <div class="clearfix"></div>
                        </div>
                     </li>
                  </ul>
               </div>
               <br><br>
               <h3 class="heading-agileinfo" data-aos="zoom-in" style="font-size: 30px;">Cultural Committee</h3>
               <div class="flexslider">
                  <ul class="slides">
                     <li>
                        <div class="item g1">
                           <div class="team-grid-top">
						   <?php
								foreach ( $ourteam_cal as $banner) {
						   ?>
                              <div class="col-md-3 team1" data-aos="fade-right">
							  <div class="inner-team1">
                                    <img src="{!! asset('public/images/ourteam/'.$banner->image) !!}" alt="" />
                                    <h3>{{$banner->name}}</h3>
                                    <h4>{{$banner->committee_name}} Committee</h4>
                                    <p>Mobile Number : +91{{$banner->mobile}}</p>
                                 </div>
                              </div>
							<?php
        						}
        					?>
                              <div class="clearfix"></div>
                           </div>
                           <div class="clearfix"></div>
                        </div>
                     </li>
                  </ul>
               </div>
               <br><br>
               <h3 class="heading-agileinfo" data-aos="zoom-in" style="font-size: 30px;">Documentation Committee</h3>
               <div class="flexslider">
                  <ul class="slides">
                     <li>
                        <div class="item g1">
                           <div class="team-grid-top">
						   <?php
								foreach ( $ourteam_doc as $banner) {
						   ?>
                              <div class="col-md-3 team1" data-aos="fade-right">
							  <div class="inner-team1">
                                    <img src="{!! asset('public/images/ourteam/'.$banner->image) !!}" alt="" />
                                    <h3>{{$banner->name}}</h3>
                                    <h4>{{$banner->committee_name}} Committee</h4>
                                    <p>Mobile Number : +91{{$banner->mobile}}</p>
                                 </div>
                              </div>
							  <?php
        						}
        					?>
                              <div class="clearfix"></div>
                           </div>
                           <div class="clearfix"></div>
                        </div>
                     </li>
                  </ul>
               </div>
               <br><br>
               <h3 class="heading-agileinfo" data-aos="zoom-in" style="font-size: 30px;">Food and Accomodation committee</h3>
               <div class="flexslider">
                  <ul class="slides">
                     <li>
                        <div class="item g1">
                           <div class="team-grid-top">
						   <?php
								foreach ( $ourteam_food as $banner) {
						   ?>
                              <div class="col-md-3 team1" data-aos="fade-right">
							  <div class="inner-team1">
                                    <img src="{!! asset('public/images/ourteam/'.$banner->image) !!}" alt="" />
                                    <h3>{{$banner->name}}</h3>
                                    <h4>{{$banner->committee_name}} Committee</h4>
                                    <p>Mobile Number : +91{{$banner->mobile}}</p>
                                 </div>
                              </div>
                              <?php
        						}
        					?>
                              <div class="clearfix"></div>
                           </div>
                           <div class="clearfix"></div>
                        </div>
                     </li>
                  </ul>
               </div>
               <br><br>
               <h3 class="heading-agileinfo" data-aos="zoom-in" style="font-size: 30px;">Invitation Committee</h3>
               <div class="flexslider">
                  <ul class="slides">
                     <li>
                        <div class="item g1">
                           <div class="team-grid-top">
						   <?php
								foreach ( $ourteam_invi as $banner) {
						   ?>
                              <div class="col-md-3 team1" data-aos="fade-right">
							  <div class="inner-team1">
                                    <img src="{!! asset('public/images/ourteam/'.$banner->image) !!}" alt="" />
                                    <h3>{{$banner->name}}</h3>
                                    <h4>{{$banner->committee_name}} Committee</h4>
                                    <p>Mobile Number : +91{{$banner->mobile}}</p>
                                 </div>
                              </div>
                              <?php
        						}
        					?>
                              <div class="clearfix"></div>
                           </div>
                           <div class="clearfix"></div>
                        </div>
                     </li>
                  </ul>
               </div>
               <br><br>
               <h3 class="heading-agileinfo" data-aos="zoom-in" style="font-size: 30px;">Poster and social media committee</h3>
               <div class="flexslider">
                  <ul class="slides">
                  <li>
                     <div class="item g1">
                        <div class="team-grid-top">
						<?php
								foreach ( $ourteam_poster as $banner) {
						   ?>
                           <div class="col-md-3 team1" data-aos="fade-right">
						   <div class="inner-team1">
                                    <img src="{!! asset('public/images/ourteam/'.$banner->image) !!}" alt="" />
                                    <h3>{{$banner->name}}</h3>
                                    <h4>{{$banner->committee_name}} Committee</h4>
                                    <p>Mobile Number : +91{{$banner->mobile}}</p>
                                 </div>
                           </div>
                           <?php
        						}
        					?>
                           <div class="clearfix"></div>
                        </div>
                        <div class="clearfix"></div>
                     </div>
                  </li>
               </div>
               <br><br>
               <h3 class="heading-agileinfo" data-aos="zoom-in" style="font-size: 30px;">Photography and videography committee</h3>
               <div class="flexslider">
                  <ul class="slides">
                     <li>
                        <div class="item g1">
                           <div class="team-grid-top">
						   <?php
								foreach ( $ourteam_photo as $banner) {
						   ?>
                              <div class="col-md-3 team1" data-aos="fade-right">
							  <div class="inner-team1">
                                    <img src="{!! asset('public/images/ourteam/'.$banner->image) !!}" alt="" />
                                    <h3>{{$banner->name}}</h3>
                                    <h4>{{$banner->committee_name}} Committee</h4>
                                    <p>Mobile Number : +91{{$banner->mobile}}</p>
                                 </div>
                              </div>
                              <?php
        						}
        					?>
                              <div class="clearfix"></div>
                           </div>
                           <div class="clearfix"></div>
                        </div>
                     </li>
                  </ul>
               </div>
               <br><br>
               <h3 class="heading-agileinfo" data-aos="zoom-in" style="font-size: 30px;">Sponsership committee</h3>
               <div class="flexslider">
                  <ul class="slides">
                     <li>
                        <div class="item g1">
                           <div class="team-grid-top">
						   <?php
								foreach ( $ourteam_spon as $banner) {
						   ?>
                              <div class="col-md-3 team1" data-aos="fade-right">
							  <div class="inner-team1">
                                    <img src="{!! asset('public/images/ourteam/'.$banner->image) !!}" alt="" />
                                    <h3>{{$banner->name}}</h3>
                                    <h4>{{$banner->committee_name}} Committee</h4>
                                    <p>Mobile Number : +91{{$banner->mobile}}</p>
                                 </div>
                              </div>
                              <?php
        						}
        					?>
                              <div class="clearfix"></div>
                           </div>
                           <div class="clearfix"></div>
                        </div>
                     </li>
                  </ul>
               </div>
               <br><br>
               <h3 class="heading-agileinfo" data-aos="zoom-in" style="font-size: 30px;">Sports Committee</h3>
               <div class="flexslider">
                  <ul class="slides">
                     <li>
                        <div class="item g1">
                           <div class="team-grid-top">
						   <?php
								foreach ( $ourteam_sports as $banner) {
						   ?>
                              <div class="col-md-3 team1" data-aos="fade-right">
							  <div class="inner-team1">
                                    <img src="{!! asset('public/images/ourteam/'.$banner->image) !!}" alt="" />
                                    <h3>{{$banner->name}}</h3>
                                    <h4>{{$banner->committee_name}} Committee</h4>
                                    <p>Mobile Number : +91{{$banner->mobile}}</p>
                                 </div>
                              </div>
                              <?php
        						}
        					?>
                              <div class="clearfix"></div>
                           </div>
                           <div class="clearfix"></div>
                        </div>
                     </li>
                  </ul>
               </div>
               <br><br>
               <h3 class="heading-agileinfo" data-aos="zoom-in" style="font-size: 30px;">Store Committee</h3>
               <div class="flexslider">
                  <ul class="slides">
                     <li>
                        <div class="item g1">
                           <div class="team-grid-top">
						   <?php
								foreach ( $ourteam_store as $banner) {
						   ?>
                              <div class="col-md-3 team1" data-aos="fade-right">
							  <div class="inner-team1">
                                    <img src="{!! asset('public/images/ourteam/'.$banner->image) !!}" alt="" />
                                    <h3>{{$banner->name}}</h3>
                                    <h4>{{$banner->committee_name}} Committee</h4>
                                    <p>Mobile Number : +91{{$banner->mobile}}</p>
                                 </div>
                              </div>
                              <?php
        						}
        					?>
                              <div class="clearfix"></div>
                           </div>
                           <div class="clearfix"></div>
                        </div>
                     </li>
                  </ul>
               </div>
               <br><br>
               <h3 class="heading-agileinfo" data-aos="zoom-in" style="font-size: 30px;">Website committee</h3>
               <div class="flexslider">
                  <ul class="slides">
                     <li>
                        <div class="item g1">
                           <div class="team-grid-top">
						   <?php
								foreach ( $ourteam_website as $banner) {
						   ?>
                              <div class="col-md-3 team1" data-aos="fade-right">
							  <div class="inner-team1">
                                    <img src="{!! asset('public/images/ourteam/'.$banner->image) !!}" alt="" />
                                    <h3>{{$banner->name}}</h3>
                                    <h4>{{$banner->committee_name}} Committee</h4>
                                    <p>Mobile Number : +91{{$banner->mobile}}</p>
                                 </div>
                              </div>
                              <?php
        						}
        					?>
                              <div class="clearfix"></div>
                           </div>
                           <div class="clearfix"></div>
                        </div>
                     </li>
                  </ul>
               </div>
            </section>
         </div>
      </section>
      <!-- //Team section -->
      <!-- /Portfolio section -->
      <!-- Clients -->
      <div class="clients-main jarallax" id="client">
         <div class="container">
            <!-- Owl-Carousel -->
            <h3 class="heading-agileinfo" data-aos="zoom-in">TESTIMONIALS<span class="thr"></span></h3>
            <div class="cli-ent" data-aos="fade-down">
               <section class="slider">
                  <div class="flexslider">
                     <ul class="slides">
                        <li>
                           <div class="item g1">
                              <div class="agile-dish-caption">
                                 <img class="lazyOwl" src="{!! asset('public/assets/front/images/1.png') !!}" alt="" />
                                 <h4>Divyank Tiwari</h4>
                                 <h3><font color="white">Chair Students' Council</h3>
                                 </font>
                              </div>
                              <div class="clearfix"></div>
                              <p class="para-w3-agile"><span class="fa fa-quote-left" aria-hidden="true"></span>When you think you can't do it, that is the moment where you can make history, at lakshya we find that moment of glory</p>
                           </div>
                        </li>
                        <li>
                           <div class="item g1">
                              <div class="agile-dish-caption">
                                 <img class="lazyOwl" src="{!! asset('public/assets/front/images/3.png') !!}" alt="" />
                                 <h4>Vatsal Aryan Bhatnagar</h4>
                                 <h3><font color="white">Co-Chair Students' Council</h3>
                                 </font
                              </div>
                              <div class="clearfix"></div>
                              <p class="para-w3-agile"><span class="fa fa-quote-left" aria-hidden="true"></span>Sometimes dreams come true at lakshya we give you chance to do so</p>
                           </div>
                        </li>
                        <li>
                           <div class="item g1">
                              <div class="agile-dish-caption">
                                 <img class="lazyOwl" src="{!! asset('public/assets/front/images/2.png') !!}" alt="" />
                                 <h4>Ayush Ranjan</h4>
                                 <h3><font color="white">Co-Chair Students' Council</h3>
                                 </font
                              </div>
                              <div class="clearfix"></div>
                              <p class="para-w3-agile"><span class="fa fa-quote-left" aria-hidden="true"></span>An event is not over until everyone is tired of talking about it, and Lakshya is that    event.
                              </p>
                           </div>
                        </li>
                     </ul>
                  </div>
               </section>
            </div>
            <!--// Owl-Carousel -->
         </div>
      </div>
      <!-- footer -->
      <div class="footer">
         <div class="container">
            <div class="f-bg-w3l">
               <div class="container">
                  <div class="row">
                     <div class="col-lg-4 col-md-4 ">
                        <img src="{!! asset('public/assets/front/images/logo.png') !!}" alt="logo" class="image-fluid">
                     </div>
                     <div class="col-lg-4 col-md-4">
                        <h2 style="color: white; font-family: mv boli; ">Contact Information</h2>
                        <br>
                        <ul class="footer-information text-color-4 font-weight-normal medium-title-oswald">
                           <i style="font-size:24px; color: white; padding-right: 11px;" class="fa">&#9819;</i><font color="white">POORNIMA UNIVERSITY JAIPUR</li></font><br><br>
                           <i style="font-size:24px; color: white; padding-right: 12px;" class="fa">&#xf095;</i><a href="tel:+91"><font color="white">+91 8282823769</a></font></li><br><br>
                           <i style="font-size:24px; color:white; padding-right: 7px;" class="fa">&#xf003;</i><font color="white">  lakshya@poornima.edu.in</a></li></font><br><br>
                           <i style="font-size:24px; color:white; padding-right: 18px" class="fa">&#xf041;</i><a href="https://g.page/poornimauniversity?share"><font color="white">POORNIMA UNIVERSITY JAIPUR <br>(Click to open on map)</a></li></font>
                        </ul>
                     </div>
                     <div class="col-lg-4 col-md-4">
                        <ul class="social_agileinfo">
                           <li><a href="https://www.facebook.com/poornimauniversity" class="w3_facebook"><i class="fa fa-facebook"></i></a></li>
                           <li><a href="https://twitter.com/Poornima_Univ" class="w3_twitter"><i class="fa fa-twitter"></i></a></li>
                           <li><a href="https://www.instagram.com/poornima.university/?hl=en" class="w3_instagram"><i class="fa fa-instagram"></i></a></li>
                           <li><a href="https://www.poornima.edu.in/" class="w3_google"><i class="fa fa-google-plus"></i></a></li>
                        </ul>
                     </div>
                  </div>
               </div>
               <div class="clearfix"> </div>
            </div>
         </div>
         <p class="copyright" data-aos="zoom-in">Copyright © 2021  All Rights Reserved | Lakshya</a></p>
      </div>
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
         $(window).load(function(){
           $('.flexslider').flexslider({
         	animation: "slide",
         	start: function(slider){
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
         	speed: 0.5		})
      </script><!-- here stars scrolling icon -->
      <script type="text/javascript">
         $(document).ready(function() {
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
         jQuery(document).ready(function($) {
         	$(".scroll").click(function(event){		
         		event.preventDefault();
         		$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
         	});
         });
      </script> 
      <!-- //scrolling script -->
      <!-- animation effects-js files-->
      <script src="{!! asset('public/assets/front/js/aos.js') !!}"></script><!-- //animation effects-js-->
      <script src="{!! asset('public/assets/front/js/aos1.js') !!}"></script><!-- //animation effects-js-->
      <!-- animation effects-js files-->
   </body>
</html>
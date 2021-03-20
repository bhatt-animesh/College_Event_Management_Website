<html>
<head>
<title> Events</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta charset="utf-8">
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta name="keywords" content="New Party Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link rel="icon" href="{!! asset('public/assets/front/images/favicon.jpg') !!}" type="image/jpg" sizes="16x16">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
<!--font awesome-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!--page Style-->
<style>
.bgback1{
  background-image: url("{!! asset('public/assets/front/images/mid1.jpg	') !!}") ;
  background-size:100% 100%;
  background-repeat:no-repeat;
  

}
.caps{
	font-weight:bold;
}
.filter:hover{
	background-color:black; 
	border:2px solid white;
	}

.avatar {
  vertical-align: middle;
  width: 30px;
  height: 30px;
  border-radius: 10%;
 }
 .filter{
	text-shadow:5px 5px 7px black;
	text-align:center;
 }
 #participer:hover{
	color:white;
	background-color:green;
 }
 #eventTitle{
	text-shadow:5px 0px 10px red;
	color:white;
	text-align:center;
	
 }
</style>
</head>
<body class="bgback1">
<div>
<center><a href="{{ url('/') }}" class=" btn btn-warning mt-3 w-100 justify-content-center">BACK TO HOME</a></center>
	<!-- -nav -->
<div class="container mb-5">
	<div class="row">
		<h1 class="mt-3 w-100 text-center" id="eventTitle">Events</h1>
	</div>
	<div class="row border-bottom border-white text-uppercase my-5 align-items-center text-white justify-content-center">
		<div class="col-lg-4 col-md-4 col-sm-12 justify-content-center filter" id="button1">
			<a class="tag"><h4 class=" text-white text-center">Sports</h4></a>
		</div>
		<div class="col-lg-4 col-md-4 col-sm-12  filter" id="button2">
			<a class="tag"> <h4 class="text-white text-center">Technical</h4></a>
		</div>
		<div class="col-lg-4 col-md-4 col-sm-12   filter" id="button3">
			<a class="tag"><h4 class="text-white text-center">Cultural</h4></a>
		</div>
	</div>
	
	</div>
	<div class="container">
  @if($message ?? '')
  <div class="alert alert-success" role="alert" >{{$message ?? ''}}<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button></div>
  @else

  @endif
  
    <div class="row" id='table-display' >
    	@include('usertheme.event_list')
  </div>
</div>
  </body>
</section>
</div>
<!--START OF ADD MEMBERS SCRIPT-->

<script>
var n=0;
function addMembers(size){
  if(n<size){
    n++;
  $('#addMembers').append('<div class="mb-3 input-group" id="'+n+'"><input type="text" placeholder="Name" id="p_name" name="p_name[]" class="form-control" required/><input type="text" placeholder="Email" id="p_name" name="p_email[]" class="form-control mx-3" required/><a id="'+n+'" class="btn btn-danger btn-sm" onclick="removeMember('+n+') ">&times;</a></div>');
  }
  
  
}
function removeMember(n){
  $('div[id = '+n+']').remove();
  n--;
}
</script>
<!--END OF ADD MEMBERS SCRIPT-->
<section>
<!-- EVENT DETAILS MODAL -->
<!-- Modal -->
<div class="modal fade bg-transparent"  id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog modal-dialog-scrollable modal-lg">
<div class="modal-content" >
  <div class="modal-header">
    <h2 class="modal-title text-uppercase" id="exampleModalLabel"><span  id="getevent_namee"></span></h2>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  <div class="modal-body">
    <div class="container" style="overflow-x: hidden;">

  <p><span class="caps">Event Name :</span>	<span  id="getevent_name"></span><!--Enter Event name here--></p>
  <p><span class="caps">Event Venue :</span><span  id="getvenue"></span>	<!--Enter Event venue here--></p>
  <p><span class="caps">Date : <i class="fas fa-calendar"></i> </span><span  id="getdate"></span>	<!--Enter Event date here--></p>
  <p><span class="caps">Time : <i class="far fa-clock"></i> </span><span  id="gettime"></span> - <span  id="getendtime"></span>	<!--Enter Event time here--></p>
  <p><span class="caps">Gender : </span><span  id="getgender"></span>	<!--Enter gender here--></p>
  <p><span class="caps">Team Size : </span><span  id="getteam_size"></span>	<!--Enter team size here--></p>
  <p class="caps" style="color:red;">Coordinator Name: </span><span  id="getcoordinator_name"></span>	<!--Enter Coordinator's name here--></p>
  <p class="caps" style="color:red;">Coordinator Contact : </span><span  id="getcoordinator_no"></span>	<!--Enter Coordinator's contact no  here--></p>
  <h3 class="my-3">Description : </h3><span  id="getdescription"></span>
  <h5>
  
    <!--Event details here-->
  </h5>
  <h3 class="my-3">Rules and regulations  :</h3><span  id="getrules"></span>
  <h5> 
  
    <!--Rules and regulations here-->
  </h5>
	<table width="90%" class="px-3">
		<tr>
			<th colspan="2" class=" border text-center"><h3>Prize Distribution</h3></th>
		</tr>
		<tr  class=" border ">
			<td><h4	 >Winner &nbsp; <i class=" ml-5 px-3  border-left fas fa-rupee-sign text-warning">
			
			<span  id="getprize"></span>
					
			</i></h4></td>
		</tr>
		<tr  class=" border ">
			<td><h4	 >Runner Up &nbsp; <i class="ml-1 px-3  border-left fas fa-rupee-sign text-secondary">
			
			<span  id="getrprize"></span>
					
			</i></h4></td>
		</tr>
	</table>
<!--Participation section-->


@if($auth_user_d)     
<section style="margin-top: 3em;" id="dada">    
</section>         
@else
 <section style="margin-top: 3em;"><div class="alert alert-warning" role="alert">
 Please <a href="{{ route('login') }}" class="alert-link">Login </a> To Participate
</div></section>      
@endif

  </div>
</div>
</div>
</div>
<!-- EVENT DETAILS MODAL END -->
</section>
</div>
<!-- page scripts -->
<script>
function GetData(id) {
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url:"{{ URL::to('/events/show') }}",
        data: {
            id: id
        },
        method: 'POST', //Post method,
        dataType: 'json',
        success: function(response) {
			var html='';
			console.log("xy"+response.par);
			//
            $('#id').html(response.ResponseData.id);
            $('#getevent_name').html(response.ResponseData.e_name);
			      $('#getevent_namee').html(response.ResponseData.e_name);
            $('#getvenue').html(response.ResponseData.e_venue);
            $('#gettype').html(response.ResponseData.e_type);
            $('#gettime').html(response.ResponseData.e_time);
            $('#getteam_size').html(response.ResponseData.e_team_size);
            $('#getrules').html(response.ResponseData.e_rules);
            $('#getprize').html(response.ResponseData.e_prize);
			      $('#getrprize').html(response.ResponseData.e_r_prize);
            $('#getregister_by').html(response.ResponseData.e_parti);
            $('#getprice').html(response.ResponseData.e_jud_cri);
            $('#getguidelines').html(response.ResponseData.e_guidlines);
            $('#getgender').html(response.ResponseData.e_gender);
            $('#getdescription').html(response.ResponseData.e_description);
            $('#getdate').html(response.ResponseData.e_date);
            $('#getendtime').html(response.ResponseData.e_time_e);
            $('#getcoordinator_name').html(response.ResponseData.e_c_name);
            $('#getcoordinator_no').html(response.ResponseData.e_c_contact); 
			if(response.par == "yes"){
				html += '<div class="alert alert-warning" role="alert">Already Participated </div>';
			}else if(response.par == "no"){
				if(response.ResponseData.e_parti=="hod"){
				html += '<div class="mt-3 alert alert-primary font-weight-bold" role="alert">HOD will register for this event</div>';
				}else if(response.ResponseData.e_parti=="individual"){
					html += '<form method="POST" action="{{url('participate/solo')}}">';
          html += '@csrf';
          html += ' <input type="hidden" id="event_id" name="event_id" value="'+response.ResponseData.id+'">';
					html += '<div class="container-fluid"><div class="row"><div class="col-12"><input type="submit" value="Participate" id="participer" class="btn btn-block btn-outline-success rounded-lg"/></div></div></div>';
					html += '</form>';
				}else{
					html += '<form method="POST" action="{{url('/participate/team')}}">';
          html += '@csrf';
          html += ' <input type="hidden" id="event_id" name="event_id" value="'+response.ResponseData.id+'">';
					html += '<div class="container"><div class="row"><div class="col-auto"><div class="mb-3">';
          html += '<input type="text" name="team_name" id="team_name" placeholder="Team Name" class="form-control" required>';
          html += '</div>';
          html += '<div class="mb-3"><input type="email" placeholder="Team Leaders Email" name="leader_email" class="form-control" required></div>';
          html += '<div class="mb-3"><a onclick="addMembers('+response.ResponseData.e_team_size+');" class="btn btn-primary" >Add member</a></div><div id="addMembers" class=" mb-3"></div>';
          html += '</div></div></div>';
					html += '<div class="container-fluid"><div class="row"><div class="col-12"><input type="submit" value="Participate" id="participer" class="btn btn-block btn-outline-success rounded-lg"/></div></div></div>';
					html += '</form>';
				} 
			}
			   
			$('#dada').html(html);     
        },
        error: function(error) {

            // $('#errormsg').show();
        }
    })
}

    $(document).ready(function(){
      $("#button1").click(function(){
              $('#table-display').hide();
          $.ajax({
            url:"{{ URL::to('/events/sports') }}",
            method:'get',
            success:function(data){
              $('#table-display').html(data);
              $('#table-display').fadeIn("slow");
            }
          });
      });
    });
  
    $(document).ready(function(){
      $("#button2").click(function(){

		$('#table-display').hide();
   $.ajax({
            url:"{{ URL::to('/events/technical') }}",
            method:'get',
            success:function(data){

				$('#table-display').html(data);
              $('#table-display').fadeIn("slow");            }
          });
      });
    });
  
    $(document).ready(function(){
      $("#button3").click(function(){
		$("#table-display").hide();
          $.ajax({
            url:"{{ URL::to('/events/cultural') }}",
            method:'get',
            success:function(data){
				$('#table-display').html(data);
              $('#table-display').fadeIn("slow");     
            }
          });
      });
    });  
</script>
      <!-- animation effects-js files-->
      <script src="{!! asset('public/assets/front/js/aos.js') !!}"></script><!-- //animation effects-js-->
      <script src="{!! asset('public/assets/front/js/aos1.js') !!}"></script><!-- //animation effects-js-->
      <!-- animation effects-js files-->
    </section>
  </body>
  
  </html>
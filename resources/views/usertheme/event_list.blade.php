<?php
				foreach ( $events_intra as $events) {
			?>
                <div class="col-lg-4 col-md-4 col-sm-12 mb-5 text-center" >
                    <div class="card shadow-lg p-3"style="background-color:rgba(0,0,0,0.8);" >
                        <div class="text-white text-uppercase"> 
                            <h4 class="card-title m-3 text-warning">{{$events->e_name}}</h4>
                            <h5 class="card-subtitle m-2 text-left" style="color:#ffd700;">Event date : <span class="text-white"><?php echo date('d-m-Y', strtotime($events->e_date));?> <!--DATABASE DATA HERE --> </span> </h5>
                            <h5 class="card-subtitle m-2 text-left" style="color:#ffd700;">Event time : <span class="text-white">{{$events->e_time}} - {{$events->e_time_e}}</span></h5>
                            <h5 class="card-subtitle m-2 text-left" style="color:#ffd700;">Event venue :<span class="text-white">{{$events->e_venue}}</span> </h5>
                            <h5 class="card-subtitle m-2 text-left" style="color:#ffd700;">Event for  : <span class="text-white">{{$events->e_gender}}</span></h5>
                            <h5 class="card-subtitle m-2 text-left" style="color:#ffd700;">Team size : <span class="text-white">{{$events->e_team_size}}</span></h5>
                            <div class="link d-flex mt-5 justify-content-center">
                          <p class="card-text text-white text-center"><button onclick="GetData({{$events->id}});" class="btn btn-warning" data-toggle="modal" data-target="#exampleModal">Read more</button></p>
                            <!-- <p class="card-text text-white text-center">Participation Will Be On Soon</p> -->
                               <a href="#" class="card-link text-warning"></a>
                            </div>
                        </div>
                    </div>
                </div>
<?php 
	}
?>
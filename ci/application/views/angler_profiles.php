<section class="anglers container">
	<h1>New Zealand Fishing Club Members</h1>
	<p>New Zealand is a world class Fishing Location. Our waters are second to none when it comes to an incredible variety of fish species, including Snapper, trevally, terakihi, kingfish, kahawai, Gurnard, Blue Cod, blue moki, john dory, Hapuka and plenty more.</p>
	<?php //print_r($region); ?>

	<?php foreach ($user as $key => $value) {
		# code...

		echo '<div class="col-xs-6 col-sm-6 col-md-3 col-lg-2 col-xl-2">';
		echo '<h4 class="center">'.$value->username.'</h4>';       		  	
		    								
		    				if($value->profile_img==!NULL){				
		                                        
		                                    $image_properties = array(
		                                    	 'src'   => '../assets/img/uploads/'.$value->profile_img,
		                                        'alt'   => 'NZ Fishing Club',
		                                        'class' => 'avatar',
		                                        
		                                        'height'=> '170',
		                                        'title' => 'profile photos'
		                                    );

		                                    // echo anchor('mypage/profile?id='.$value->id , img($image_properties) );
		                    }else{

		                    				
		                                    $image_properties = array(
		                                    	'src'   => '../assets/img/placeholder-avatar.jpg',
		                                        'alt'   => 'NZ Fishing Club',
		                                        'class' => 'avatar',
		                                        
		                                        'height'=> '170',
		                                        'title' => 'profile photos'
		                                    );
	                                    	
		                                    
		                    }

		    								echo '<div class="img-wrap">';
	                                    	echo anchor('mypage/profile?id='.$value->id , img($image_properties) );
	                                    	echo '</div>';

		echo '</div>';

	}
	?>


	
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
		<nav class="center">
			  <ul class="pagination">
				    <li><a href="#" aria-label="Previous"><span aria-hidden="true">&laquo;</span></a></li>
				    <li class="active"><a href="#">1 <span class="sr-only">(current)</span></a></li>
				    <li><a href="#">2 </a></li>
				    <li><a href="#" aria-label="Next"><span aria-hidden="true">&raquo;</span></a></li>
			  </ul>
		</nav>
	</div>



</section>
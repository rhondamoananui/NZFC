 <!-- Database content goes into this div -->
	<div class="container">   
<!-- 	  	<aside class="col-xs-0 col-sm-0 col-md-3 col-lg-3 col-xl-3 height100">
<?php
echo '<br>';
		      					$image_properties = array(
								        'src'   => 'assets/img/ads/2ed476f0624119fe500d087b4961ac25.jpg',
								        //'alt'   => 'Me, demonstrating how to eat 4 slices of pizza at one time',
								        //'class' => 'post_images',
								        'width' => '100%'
								        //'height'=> '200',
								 
								);

								echo img($image_properties);
								echo '<br>';


										$image_properties = array(
								        'src'   => 'assets/img/ads/gopro-hd-hero.jpg',
								        //'alt'   => 'Me, demonstrating how to eat 4 slices of pizza at one time',
								        //'class' => 'post_images',
								        'width' => '100%'
								        //'height'=> '200',
								 
								);

								echo img($image_properties);
								echo '<br>';


										$image_properties = array(
								        'src'   => 'assets/img/ads/ima.jpeg',
								        //'alt'   => 'Me, demonstrating how to eat 4 slices of pizza at one time',
								        //'class' => 'post_images',
								        'width' => '100%'
								        //'height'=> '200',
								 
								);

								echo img($image_properties);
								echo '<br>';

?>
	  	</aside> -->

	    <div class="posts col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
	    	
	    	<!-- Name of person who wrote the message -->
	    	<?php
	    

	    	foreach ($post as $key => $value) {
	    	

		    	//<!-- who wrote the post -->
		    	//<!-- timestamp -->
		    	echo '<h4 class="user">'.$value->from_user.'</h4>  <span class="col-grey">'.date('D d M Y', strtotime($value->timestamp)).'</span>';

		    	//<!-- The message -->
		    	echo '<p>'.$value->post.'</p>';

		    	echo '<hr>';
			}
	    	?>

	    </div>


	  	<!-- <aside class="col-xs-0 col-sm-0 col-md-3 col-lg-3 col-xl-3 height100">
<?php
echo '<br>';
		      					$image_properties = array(
								        'src'   => 'assets/img/ads/ad.JPG',
								        //'alt'   => 'Me, demonstrating how to eat 4 slices of pizza at one time',
								        //'class' => 'post_images',
								        'width' => '100%'
								        //'height'=> '200',
								 
								);

								echo img($image_properties);
								echo '<br>';


										$image_properties = array(
								        'src'   => 'assets/img/ads/1206966.jpg',
								        //'alt'   => 'Me, demonstrating how to eat 4 slices of pizza at one time',
								        //'class' => 'post_images',
								        'width' => '100%'
								        //'height'=> '200',
								 
								);

								echo img($image_properties);
								echo '<br>';


										$image_properties = array(
								        'src'   => 'assets/img/ads/055704181be3321ed4c48aa79a223ba4.jpg',
								        //'alt'   => 'Me, demonstrating how to eat 4 slices of pizza at one time',
								        //'class' => 'post_images',
								        'width' => '100%'
								        //'height'=> '200',
								 
								);

								echo img($image_properties);
								echo '<br>';

?>



	  	</aside> -->


	</div>
</section>
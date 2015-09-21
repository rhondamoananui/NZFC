


<?php

$amount_post = count($post);

$this->session->set_userdata('amount_post', $amount_post);


 ?>
<p><?php 

	// the output should look like this:
	// 4 posts
	// 1 post 
	echo$amount_post; 

	if ($amount_post == 1){
		echo ' post';
	}
	else{
		echo ' posts';
	}

?> 
</p><br>
<hr>
	<div class="wrap-all">
		
		<!-- Ads will go in the aside -->
		<aside class="col-xs-0 col-sm-0 col-md-3 col-lg-3 col-xl-3 height100"> 
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




		</aside>
			
		<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
			
			<!-- if the user is logged in show the form -->
			<?php if($this->session->userdata('user_data')) { ?>
					
					<?php echo form_open_multipart('forum/post?id='.$_GET['id']);?>
						
							<label>Add a New Post:</label><br>
							<textarea class="form-control" type="text" rows="5" id="comment" placeholder="Fishing off the Rocks" name="post"></textarea>
							<button type="submit" class="btn btn-primary">ADD POST</button>
						
					</form>

			<?php } ?>

				<hr>

					<!-- display all forum posts -->
					<?php foreach ($post as $key => $value) { ?>
						
					
				  	<div class="media-left media-top">
				    
				    	<?php
					                                        $image_properties = array(

					                                        'src'   => '../assets/img/uploads/'.$value->avatar,
					                                        'alt'   => 'NZ Fishing Club',
					                                        'class' => 'media-object',
					                                        'width' => '100',
					                                        // 'height'=> '50',
					                                        'title' => 'profile photos'
					                                    );

					                                    echo img($image_properties);
					                                    ?>

				      	<h5 class="center"><?php echo $value->username; ?></h5>
				      	<h6 class="center">Admiral</h6>
				   
				  	</div>


				  	<div class="media-body">
				    
				    	<p><?php echo $value->post ?></p>
				    	<p><?php echo date('D d M Y', strtotime($value->date)) ?></p> 
						
				  	</div>
				  
				  	<hr>

					<?php } ?>
				  

		</div>
				<!-- Ads will go in the aside -->
		<aside class="col-xs-0 col-sm-0 col-md-3 col-lg-3 col-xl-3 height100"> 
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



		</aside>
	</div>
			


	
</section>
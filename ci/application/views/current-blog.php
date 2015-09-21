<!-- This is the page that has the 8 most recent blogs -->
<!-- On the left are 8 blog listings -->
<!-- On the right are the 8 most recent blog headlines -->
<section class="container">
	<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 col-xl-8">
		
		
		<?php foreach ($blog as $key => $value) {
					?>
		<div class="col-sm-6 col-md-4">
		    <div class="thumbnail" style="height:100%;">

		    	<!-- BLOG LISTING - image, headline and description -->
		      	<?php
		      							echo '<div class="blog-img center">';
	                                        $image_properties = array(

	                                        'src'   => '../assets/img/blogs/'.$value->filename,
	                                        'alt'   => 'NZ Fishing Club',
	                                        'class' => 'avatar',
	                                        'width' => '190',
	                                        'height'=> '150',
	                                        'title' => 'profile photos'
	                                    );

	                                    echo img($image_properties);

	                                    echo "</div>";
	                                    ?>

		      <div class="caption" style="height:210px;">
		        <h3 style="color:#59b4dc;"><?php echo $value->headline; ?></h3>
		        <p><?php echo $value->meta_desc; ?></p>
				

				<!-- blog listing button READ MORE BUTTON -->
		        <!-- this button links to the article page using id as the $_GET['id'] -->
		        <p class="bottom-button">
		        	
		        	<?php echo anchor('blog/article?id='.$value->id, 'READ MORE ', 'class="btn btn-blog full-width"  role="button"'); ?>
		        </p>
		      </div>
		    </div>
	  	</div>
<?php } ?>

		



		
	</div>


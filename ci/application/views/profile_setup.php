<div class="container">
	
	<h1>Create a Profile</h1>
	<h4>step 2 of 2</h4>

		<?php echo form_open_multipart('register/do_upload');?>
		
			<div class="form-content container">
				<fieldset>
					<legend>Upload Profile Image</legend>
					<input type="file" name="userfile" size="20" />
				</fieldset>
			  
			  	<fieldset>
			  		<legend>Select Cover Image</legend>
				    	
				    	<?php foreach ($cover as $key => $value) {
						

					    	echo '<div class="radio">';
		      				echo '<label><input type="radio" name="cover_img_id" value="'.$value->id.'" >';


		      					$image_properties = array(
								        'src'   => 'assets/img/cover/'.$value->filename,
								        //'alt'   => 'Me, demonstrating how to eat 4 slices of pizza at one time',
								        //'class' => 'post_images',
								        'width' => '200',
								        //'height'=> '200',
								        'title' => 'That was quite a night',
								        'rel'   => 'lightbox'
								);

								echo img($image_properties);
	

		      				echo '</label>';
		    				echo '</div>';
		    			} ?>
	    			

				    
	  			</fieldset>
  			</div>

		  	<!-- Single button -->
			<div class="btn-group form-button">
				<input type="submit" value="upload" class="btn btn-primary"/>
			</div>
		</form>
</div>
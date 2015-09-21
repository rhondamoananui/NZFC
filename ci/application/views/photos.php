<section class="container">

	<h1>New Zealand Fishing Club's Photo Gallery</h1>
	<p>Send your favourite fishing photo's to pics@nzfishingclub.co.nz.  Be sure to include a caption. Your image will be aproved by Admin & included in our gallery</p>
	
	
<?php foreach ($files as $key => $value) {
	// echo "<pre>";
	// print_r($value);
 ?>

	<div class="col-xs-12 col-sm-3 col-md-3 col-lg-2 col-xl-2" > <!-- style="height:200px;" -->
	    <div class="gallery">     		  		
	    								<?php
	                                        $image_properties = array(

	                                        'src'   => '../assets/img/gallery/'.$value->filename,
	                                        'alt'   => $value->alt_text,
	                                        'class' => 'photo',
	                                        // 'width' => '170',
	                                        'height'=> '150',
	                                        'title' => $value->img_title
	                                    );

	                                    // link to the actual image
	                                    echo anchor('assets/img/gallery/'.$value->filename, img($image_properties));
	                                    ?>
		</div> 
	    <!-- <p class="center"><?php echo $value->caption; ?></p> -->
	   
	    

	</div>

<?php } ?>

</section>
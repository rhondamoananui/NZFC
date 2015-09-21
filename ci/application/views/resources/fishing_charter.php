	<div class="resource-main col-lg-10 col-xl-10">  

		<h1 class="resource-headline"><?php echo $charter[0]->charter_name; ?></h1>
		<blockquote cite="http://<?php echo $charter[0]->website; ?>" >
	    	<p class="resource-p center"><?php echo nl2br($charter[0]->description); ?></p>
		</blockquote>
	       

		

		


		<!-- CONTACT DETAILS -->
		<div class="charter-main-info" style="background-color:#59b4dc;padding:16px;"> <!-- col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 -->
			<div class="contact-details" > 
				<div class="charter-phone ">
					<h3>
		                <i class="fa fa-phone" style="padding:16px;"></i> <?php echo '  '.$charter[0]->phone; ?>
		               </h3>
		           </div>
		           
		 
				<div class="charter-phone">
					<h3>
		                   <i class="fa fa-envelope-o" style="padding:16px;"></i> <?php echo '  '.mailto($charter[0]->email); ?>
		            </h3>
		           </div>
		            

				<div class="charter-phone">
					<h3>
		                   <i class="fa fa-globe" style="padding:16px;"></i> <a href="http://<?php echo $charter[0]->website; ?>" class="anchor"> <?php echo '  '.$charter[0]->website; ?></a>
		            </h3>
		        </div>
		            
			</div> 

			<div class="main-charter-img">
				<div class="media-left">
					<?php
				        $image_properties = array(
				        'src'   => 'assets/img/charter/'.$charter[0]->filename,
				        'alt'   => 'NZ Fishing Club',
				        'class' => 'charter-photos media-object',
				        //'width' => '450'
				        'height' => '300'
				    );

				    echo img($image_properties);
				    ?>

				</div>
			</div>

		</div>			


		<!-- RATES -->
		<div class="charter-rates">

			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
	            <h3 style="color:#59b4dc;">Charter Information</h3>
	            <blockquote cite="http://<?php echo $charter[0]->website; ?>" >
	            	<p><?php echo nl2br($charter[0]->description1); ?></p>
	            </blockquote>

	        </div>

	    </div>

	


	    <?php echo anchor('resources/fishing_charters', 'BACK TO CHARTERS', 'title="Charters" class="btn btn-primary" style="margin:16px;"'); ?>

	</div>

</section>
    <div class="resource-main col-lg-10 col-xl-10">  

        <h1 class="resource-headline"><?php echo $campground[0]->campground_name; ?></h1>
        <p class="resource-p"><?php echo $campground[0]->description; ?></p>
           

        

        


        <!-- CONTACT DETAILS -->
        <div class="charter-main-info" style="background-color:#59b4dc;padding:16px;"> <!-- col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 -->
            <div class="contact-details" > 
                <div class="charter-phone ">
                    <h3>
                        <i class="fa fa-phone fa-2x" style="padding:16px;"></i> <?php echo '  '.$campground[0]->phone; ?>
                       </h3>
                   </div>
                   
         
                <div class="charter-phone">
                    <h3>
                           <i class="fa fa-envelope-o fa-2x" style="padding:16px;"></i> <?php echo '  '.$campground[0]->email; ?>
                    </h3>
                   </div>
                    

                <div class="charter-phone">
                    <h3>
                           <i class="fa fa-globe fa-2x" style="padding:16px;"></i> <?php echo '  '.$campground[0]->website; ?>
                    </h3>
                   </div>
                    
            </div> 

            <div class="main-charter-img">
                <div class="media-left">
                    <?php
                        $image_properties = array(
                        'src'   => 'assets/img/charter/'.$campground[0]->main_img,
                        'alt'   => 'NZ Fishing Club',
                        'class' => 'media-object',
                        'width' => '450'
                    );

                    echo img($image_properties);
                    ?>

                </div>
            </div>

        </div>          


        <!-- RATES -->
        <div class="charter-rates">

            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <h4 style="color:#59b4dc;">Amenities</h4>
                <p><?php echo $campground[0]->description1; ?></p>
            </div>

        </div>

        <!-- VESSEL -->
        <div class="charter-vessel">

            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <h4 style="color:#59b4dc;">Other</h4>
                <p><?php echo $campground[0]->description2; ?></p>
            </div>

        </div>

    


        <?php echo anchor('resources/campgrounds', 'BACK TO CAMPGROUNDS', 'title="Campgrounds" class="btn btn-primary" style="margin:16px;"'); ?>

    </div>

</section>
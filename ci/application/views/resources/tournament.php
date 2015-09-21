<div class="resource-main col-lg-10 col-xl-10">  

    <h1 class="resource-headline"><?php echo $tournament[0]->tournament_name; ?></h1>
    <p class="resource-p"><?php echo $tournament[0]->description; ?></p>
       

    <!-- CONTACT DETAILS -->
        <div class="charter-main-info" style="background-color:#59b4dc;padding:16px;"> <!-- col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 -->
            <div class="contact-details" > 
                <div class="charter-phone ">
                    <h3>
                        <i class="fa fa-phone" style="padding:16px;color:#fff;"></i> <?php echo '  '.$tournament[0]->phone; ?>
                    </h3>
                </div>
                   
         
                <div class="charter-phone">
                    <h3>
                           <i class="fa fa-envelope-o" style="padding:16px;color:#fff;"></i> <?php echo '  '.$tournament[0]->email; ?>
                    </h3>
                </div>
                    

                <div class="charter-phone">
                    <h3>
                           <i class="fa fa-globe" style="padding:16px;color:#fff;"></i> <?php echo '  '.$tournament[0]->website; ?>
                    </h3>
                </div>

                <div class="charter-phone">
                    <h3>
                           <i class="fa fa-usd" style="padding:16px;color:#fff;"></i> <?php echo '  '.$tournament[0]->ticket_price; ?>
                    </h3>
                </div>

                <div class="charter-phone">
                    <h3>
                           <i class="fa fa-calendar" style="padding:16px;color:#fff;"></i> <?php echo '  '.$tournament[0]->date; ?>
                    </h3>
                </div>
                    
            </div> 

            <div class="main-charter-img">
                <div class="media-left">
                    <?php
                        $image_properties = array(
                        'src'   => 'assets/img/charter/'.$tournament[0]->main_img,
                        'alt'   => 'NZ Fishing Club',
                        'class' => 'media-object',
                        'width' => '450'
                    );

                    echo img($image_properties);
                    ?>

                </div>
            </div>

        </div>

    


        <!-- Descriptions -->
        <div class="charter-rates">

            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <h4 style="color:#59b4dc;">Boundary Information</h4>
                <p><?php echo $tournament[0]->description1; ?></p>
            </div>

        </div>

        <div class="charter-rates">

            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <h4 style="color:#59b4dc;">Other Information</h4>
                <p><?php echo $tournament[0]->description2; ?></p>
            </div>

        </div>


        <?php echo anchor('resources/fishing_tournaments', 'BACK TO TOURNAMENTS', 'title="Tournaments" class="btn btn-primary" style="margin:16px;"'); ?>

    </div>

</section>
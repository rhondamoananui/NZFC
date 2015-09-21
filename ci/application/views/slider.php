<!-- 
Image Slider section on the home page
all slider images must be the same width and height
-->
<section class="slider-section">
    <h1 class="center hide" style="color:#368889; font-family: 'cabinbold';">Discover New Zealand's Fishing Community</h1>
    <div class="container"> <!-- end of container div is on content.php -->
        <div class="slider-box">
            <div class=" col-lg-9 col-md-9 col-sm-12 col-xs-12 slide"><!-- main_slider -->
                <div class="slider">
            		<ul class="bxslider">
                        <?php foreach ($slider as $key => $value) { ?>
                  		<li>

                            
                            
                             
                            <?php
                                $image_properties = array(
                                'src'   => 'assets/img/slider/'.$value->filename,
                                'alt'   => $value->alt_text,
                                'class' => 'slider-img',
                                'width' => '838',
                                'height'=> '384',
                                'title' => $value->img_title,
                                'rel'   => 'lightbox'
                                );

                                echo img($image_properties);
                            ?>
                        </li>
                        <?php } ?>

                        
        	      	</ul>
                </div>
            </div> <!-- col -->
        
            <!-- This area is the main call to action button & the facebook pluggin, to the right of the slider images -->
            <div class="col-lg-3 col-md-3 col-sm-0 col-xs-0 social" > <!-- social content-background -->
                
                <!-- Main Call To Action Button -->
                <div class="main-cta">
                    <!-- <h2>Join Us Today</h2> -->
                    <?php
                                $image_properties = array(
                                'src'   => 'assets/img/join.png',
                                'alt'   => 'register with nz fishing club',
                                'class' => 'join-cta',
                                'width' => '258',
                                'height'=> '90'
                                // 'title' => $value->img_title,
                                // 'rel'   => 'lightbox'
                                );

                                echo img($image_properties);
                            ?>
                    <!-- <h5><em>It's free!</em></h5> -->
                    <br>

                    <?php
                                $image_properties = array(
                                'src'   => 'assets/img/register-button.png',
                                'alt'   => 'register button',
                                'class' => 'register-button'
                                // 'width' => '1000',
                                // 'height'=> '384',
                                // 'title' => $value->img_title,
                                // 'rel'   => 'lightbox'
                                );

                                // echo img($image_properties);
                            ?>
                    <?php echo anchor('ossn/', 'CLICK HERE&nbsp;<i class="fa fa-chevron-circle-right fa-1.5"></i>', 'title="sign up" class="btn btn-success"'); ?>
                </div>
                <br>

                <div>
                    <?php
                                $image_properties = array(
                                'src'   => 'assets/img/fb-plugin.png',
                                'alt'   => 'facebook plugin',
                                'class' => 'facebook',
                                'width' => '294',
                                'height'=> '226'
                                // 'title' => $value->img_title,
                                // 'rel'   => 'lightbox'
                                );

                                echo img($image_properties);
                            ?>
                </div>
                <!-- Facebook Plugin Social Plugin - uncomment the code below to activate facebook plugin -->
                <!-- <div 
                    class="fb-page" 
                    data-href="https://www.facebook.com/nzfishingclub" 
                    data-width="300" 
                    data-hide-cover="false" 
                    data-show-facepile="true" 
                    data-show-posts="false">

                    <div class="fb-xfbml-parse-ignore">
                        <blockquote cite="https://www.facebook.com/nzfishingclub">
                            <a href="https://www.facebook.com/nzfishingclub">NZ Fishing Club</a>
                        </blockquote>
                    </div>

                </div> -->




            </div>

        </div> <!-- end slider-box -->
    </div>
</section>

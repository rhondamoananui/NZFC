<div class="advertising-bottom container">

    <div>
                                    <?php
                                        $image_properties = array(
                                        'src'   => 'assets/img/ads/long.jpg',
                                        'alt'   => 'NZ Fishing Club',
                                        'class' => 'profile-img',
                                        'width' => '730',
                                        'height'=> '130',
                                        'title' => 'profile photos'
                                    );

                                    echo img($image_properties);
                                    ?>
    </div>



</div>

<section class="group-sec">
    <h3 class="center hide">Recent Activity</h3>
    <div class="row">
    	<div class="container">

    		<div class="padding"></div>
    		<div class="list-group col-lg-4 col-md-4 col-sm-6">
                <div class="group-box">
            		  <a href="#" class="list-group-item active" style="background-color: #007db4;   background: -webkit-gradient(radial, center center, 0, center center, 460, from(#007db4), to(#2F2727));">
            		    Recent Club Members
            		  </a>


                      <!-- for each of the most recent 4 members -->
                      <!-- display their username, profile image, registration date -->
                      <!-- link to each members page using id as $_GET -->
                    <?php foreach ($members as $key => $value) { 
                        
                    echo '<a href="'.base_url("mypage/profile?id=".$value->id.'" class="list-group-item">');
                    
                    if($value->profile_img==!NULL){ 

                                        // the members profile image
                                        $image_properties = array(

                                        'src'   => 'assets/img/uploads/'.$value->profile_img,
                                        'alt'   => 'NZ Fishing Club',
                                        'class' => 'avatar-img',
                                        'width' => '50',
                                        'height'=> '50',
                                        'title' => 'profile photos'
                                    );

                                    echo img($image_properties);

                    }else{

                                            
                                            $image_properties = array(
                                                'src'   => 'assets/img/placeholder-avatar.jpg',
                                                'alt'   => 'NZ Fishing Club',
                                                'class' => 'avatar-img',
                                                'width' => '50',
                                                'height'=> '50',
                                                'title' => 'profile photos'
                                            );
                                            

                                            echo img($image_properties);
                            }

                                    ?>  


                            <div class="members">
                                <!-- The members name -->
                            	<h4><?php echo $value->username; ?></h4>

                                <!-- The date of registration -->
                            	<h6>member since <?php echo $value->date;  ?></h6> 
                        	</div>

            		    <!-- </div> -->
                    </a>
                    
                    <?php } ?>
                      <div class="list-group-item">
                        <?php
                            echo anchor('anglers', 'VIEW ANGLERS', 'title="anglers" class="btn-members btn-1"'); 
                                    ?>
                            <!-- <div class="members">
                                
                            </div> -->
                        </div>
                     
                </div>
            </div>


            <div class="list-group col-lg-4 col-md-4 col-sm-6">
                <div class="group-box">
                      <a href="#" class="list-group-item active" style="background-color: #368889;   background: -webkit-gradient(radial, center center, 0, center center, 460, from(#368889), to(#2F2727));">
                        Recent Forum Posts
                      </a>


                      <!-- for each of the 4 most recent forum posts -->
                      <!-- display the username, profile image, date & post -->
                      <!-- link to each post page using id as $_GET -->
                    <?php foreach ($posts as $key => $value) { 
                        
                    echo '<a href="'.base_url("forum/post?id=".$value->forum_topic_id.'" class="list-group-item">');
                   
                    if($value->avatar==!NULL){  

                                        // the members profile image
                                        $image_properties = array(

                                        'src'   => 'assets/img/uploads/'.$value->avatar,
                                        'alt'   => 'NZ Fishing Club',
                                        'class' => 'avatar-img',
                                        'width' => '50',
                                        'height'=> '50',
                                        'title' => 'profile photos'
                                    );

                                    echo img($image_properties);

                            }else{

                                            
                                            $image_properties = array(
                                                'src'   => 'assets/img/placeholder-avatar.jpg',
                                                'alt'   => 'NZ Fishing Club',
                                                'class' => 'avatar-img',
                                                'width' => '50',
                                                'height'=> '50',
                                                'title' => 'profile photos'
                                            );
                                            

                                            echo img($image_properties);
                            }
                                    ?>


                            <div class="members">
                                <!-- The members name -->
                                <h4><?php echo $value->username; ?></h4>

                                <!-- The date of registration -->
                                <h6><?php echo substr($value->post, 0, 50) ;  ?></h6> 
                            </div>

                        <!-- </div> -->
                    </a>
                    
                    <?php } ?>


                      <div class="list-group-item">
                        <?php
                            echo anchor('forum', 'VIEW FORUM', 'title="forum" class="btn-members btn-2"'); 
                                    ?>
                            <!-- <div class="members">
                                
                            </div> -->
                        </div>
                     
                </div>
            </div>




<div class="list-group col-lg-4 col-md-4 col-sm-6">
                <div class="group-box">
                      <a href="#" class="list-group-item active" style="background-color: #2eb34e; background: -webkit-gradient(radial, center center, 0, center center, 460, from(#2eb34e), to(#2F2727));">
                        Recent Fishing Articles
                      </a>


                      <!-- for each of the 4 most recent forum posts -->
                      <!-- display the username, profile image, date & post -->
                      <!-- link to each post page using id as $_GET -->
                    <?php foreach ($blogs as $key => $value) { 
                        
                    echo '<a href="'.base_url("blog/article?id=".$value->id.'" class="list-group-item">');
                   
                
                    if($value->filename==!NULL){             
                                                
                                        // the members profile image
                                        $image_properties = array(

                                        'src'   => 'assets/img/blogs/'.$value->filename,
                                        'alt'   => 'NZ Fishing Club',
                                        'class' => 'avatar-img',
                                        'width' => '50',
                                        'height'=> '50',
                                        'title' => 'profile photos'
                                    );

                                    echo img($image_properties);

                            }else{

                                            
                                            $image_properties = array(
                                                'src'   => 'assets/img/placeholder-avatar.jpg',
                                                'alt'   => 'NZ Fishing Club',
                                                'class' => 'avatar-img',
                                                'width' => '50',
                                                'height'=> '50',
                                                'title' => 'profile photos'
                                            );
                                            

                                            echo img($image_properties);
                            }




                                  
                                    
                                    ?>


                            <div class="members">
                                <!-- The members name -->
                                <h4><?php echo 'Admin'; ?></h4>

                                <!-- The date of registration -->
                                <h6><?php echo substr($value->headline, 0, 50) ;  ?></h6> 
                            </div>

                        <!-- </div> -->
                    </a>
                    
                    <?php } ?>


                      <div class="list-group-item">
                        <?php
                            echo anchor('blog', 'VIEW BLOG', 'title="blog" class="btn-members btn-3"'); 
                                    ?>
                            <!-- <div class="members">
                                
                            </div> -->
                        </div>
                     
                </div>
            </div>


























            		  


    		

        <!-- closing container div -->
    	</div> 
    
    </div>

    <div class="advertising-bottom container">

        <div>
                                    <?php
                                        $image_properties = array(
                                        'src'   => 'assets/img/ads/ad.JPG',
                                        'alt'   => 'NZ Fishing Club',
                                        'class' => 'profile-img',
                                        'width' => '200',
                                        'height'=> '200',
                                        'title' => 'profile photos'
                                    );

                                    echo img($image_properties);
                                    ?>
        </div>
        <div>
            <?php
                                        $image_properties = array(
                                        'src'   => 'assets/img/ads/gopro-hd-hero.jpg',
                                        'alt'   => 'NZ Fishing Club',
                                        'class' => 'profile-img',
                                        'width' => '200',
                                        'height'=> '200',
                                        'title' => 'profile photos'
                                    );

                                    echo img($image_properties);
                                    ?>
        </div>
        <div>
            <?php
                                        $image_properties = array(
                                        'src'   => 'assets/img/ads/1206966.jpg',
                                        'alt'   => 'NZ Fishing Club',
                                        'class' => 'profile-img',
                                        'width' => '200',
                                        'height'=> '200',
                                        'title' => 'profile photos'
                                    );

                                    echo img($image_properties);
                                    ?>
        </div>
        <div>
            <?php
                                        $image_properties = array(
                                        'src'   => 'assets/img/ads/055704181be3321ed4c48aa79a223ba4.jpg',
                                        'alt'   => 'NZ Fishing Club',
                                        'class' => 'profile-img',
                                        'width' => '200',
                                        'height'=> '200',
                                        'title' => 'profile photos'
                                    );

                                    echo img($image_properties);
                                    ?>
        </div>



    </div>
</section>
     



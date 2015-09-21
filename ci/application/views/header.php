
        	<header>
                <div class="overlay-blue">
                <div class="container header">


                    <div class="logo">
                        <?php
                            $image_properties = array(
                            'src'   => 'assets/img/logo1.png',
                            'alt'   => 'NZ Fishing Club Logo',
                            'class' => 'logo-img',
                            'width' => '300',
                            // 'height'=> '150',
                            'title' => 'NZ Fishing Club Logo'
                        );

                        echo anchor('/', img($image_properties) );
                        ?>


                    </div>

                    <div class="login-buttons">
                        <div class="login2">

                            <h4>
                                
                                <?php 

                                // if the session has been started
                                // 1. show the loggout link
                                
                                // else if the session has not started
                                // 1. show the login & register links


                            

                                    //$userID = $this->session->userdata('session_id');
                                    //$user = $_SESSION['OSSN_USER'];


                                    //if(){    

                                    
                                    //}else{

                                        // Sign up button & Login button, 
                                        // only visible when there is no session
                                        echo anchor('ossn', 'SIGN IN', 'title="Login" class="header-links" '); 
                                        echo '&nbsp; | &nbsp;'; 
                                        echo anchor('ossn', 'REGISTER', 'title="register" class="header-links" ');
                                        echo '&nbsp;'; 


                                        


                                        // // admin button, only visible to admin users
                                        // if($user[0]->permission==2){
                                        // echo '&nbsp; | &nbsp; ';
                                        // echo anchor('admin', 'ADMIN', 'title="admin" class="header-links" '); 
                                                                             
                                     //}
                                    

                                        

                                    //}

                                ?>
                            </h4>

                            <div class="social-icons-top">
                                <?php 
                                echo anchor('http://www.facebook.com/', '<i class="fa fa-facebook-square fa-2x"></i>' ); 
                                echo anchor('', '<i class="fa fa-twitter-square fa-2x"></i>' );
                                echo anchor('https://plus.google.com/112604457295700737356/', '<i class="fa fa-google-plus-square fa-2x"></i>' );
                                echo anchor('https://www.youtube.com/channel/UCymSZdi1d6xw5ZOd9mgAH-g', '<i class="fa fa-youtube-square fa-2x"></i>');
                                ?>
                            </div>
                        </div>
                    </div>
        
                </div>

               
                </div> <!-- end of container -->
            </header>    


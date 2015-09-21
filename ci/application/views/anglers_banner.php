<?php 

// $userID = The Logged In User
// $user[0] = The User Of the Current Page
      
      $userID = $this->session->userdata('user_id'); 
      $userINFO = $this->session->userdata('user_data'); 

      $id = $_GET['id'];




// echo "<pre>";
// print_r($user[0]);

// print_r($userINFO[0]->profile_img);



?>

<section class="profile-banner">
<?php
 //$user = $this->session->userdata( 'user_id' );
//         print_r($user);
?>
		
		<div class="banner">
			<div class="header-wrapper">
					<?php

					// if cover_img_id is not NULL
					// show a the img 
					// else show the place holder image
					if($user[0]->cover_img_id==!NULL){

					
										// COVER IMAGE
	                                    $image_properties = array(

	                                        'src'   => '../assets/img/cover/cover'.$user[0]->cover_img_id.'.jpg',
	                                        'alt'   => 'NZ Fishing Club',
	                                        'class' => 'cover-img',
	                                        'width' => '100%'
	                                    );
					}else{
										// PLACE HOLDER COVER IMAGE
	                                    $image_properties = array(

	                                        'src'   => '../assets/img/cover/cover6.jpg',
	                                        'alt'   => 'NZ Fishing Club',
	                                        'class' => 'cover-img',
	                                        'width' => '100%'
	                                    );
					}
	                                    echo '<div>';
	                                    echo img($image_properties);
	                                    
	                                    ?>
				<div class="profile-header">

					<?php
									// If the profile img is not NULL, display profile img
									// else display placeholder image
									if($user[0]->profile_img==!NULL){	

											// PROFILE IMAGE
		                                    $image_properties = array(

		                                        'src'   => '../assets/img/uploads/'.$user[0]->profile_img,
		                                        'alt'   => 'NZ Fishing Club',
		                                        'class' => 'profile-img',
		                                        // 'width' => '100%',
		                                        'title' => 'profile photos'
		                                    );
		                            }else{

		                            		// PLACEHOLDER PROFILE IMAGE
		                                    $image_properties = array(
		                                    	'src'   => '../assets/img/placeholder-avatar.jpg',
		                                        'alt'   => 'NZ Fishing Club',
		                                        'class' => 'profile-img',
		                                        // 'height'=> '170',
		                                        'title' => 'profile photos'
		                                    );

		                            }

		                                    echo '<div class="profile-img-box">';
		                                    echo img($image_properties);
		                                    echo '<h1 class="profile-name1">'.$user[0]->username.' </h1>';
											echo '<h4 class="profile-name4">'. $user[0]->username.' </h4>';
		                                    echo '</div>';
		                                    ?>


					
				</div> <!-- end of cover div -->
				</div>
				<div class="my-nav"></div>

			</div>
			<br>
			<div class="newsfeed">
				<div class="left-box"></div>

				<!-- Users Personal News Feed -->
				<div class="right-box">

					<?php 

						// if there is a user logged in, show the form
						if($userID==TRUE){

							echo form_open_multipart('mypage/make_comment?id='.$user[0]->id);?>
					      		<textarea class="form-control" rows="5" id="comment" placeholder="Post a Comment" name="comment"></textarea>
					            <button type="submit" class="btn btn-primary submit-btn button-end">Submit</button>
					        </form>
						<?php } ?>



<!-- 

#
#	.posts is the container box for ALL of the posts 
#

-->

					<!-- Gets all posts for the users profile page -->
			        <div class="posts">


<!-- 

#
#	.post is the container box for EACH of the posts 
#

-->	    	
				    	
				    	<?php
				    	 
				    	// Loop through all 'posts'
				    	// Display each post inside div.post


				    					    	foreach ($post as $key => $value) {
				    	
				    		// This div contains 
				    		// 1. The Person who posted the message
				    		// 2. The Date
				    		// 3. The Post
				    		echo '<div class="post">';

				    			// edit, & delete icons
								echo '<div class="right-icons">';
						    	echo '<i class="fa fa-pencil-square-o"></i>';
						    	echo '<i class="fa fa-times"></i>';
						    	echo '</div>';

					    	echo '<h4 class="user">'.$value->from_user.'</h4>  <span class="col-grey">'.date('D d M Y', strtotime($value->timestamp)).'</span>';
					    	echo '<p>'.$value->post.'</p>';
					    	echo '</div>';



#
#	This is the box that contains ALL comments, that are associated with each post
#								

					    	

					    	echo '<div class="all-comments">';

					    	
					    	echo '<div class="comment-icons">';
								
								// like, share, 

					    		echo '<div class="left-icons">';
						    	echo '<i class="fa fa-thumbs-o-up"></i>';
						    	echo '<i class="fa fa-share-square-o"></i>';
						    	echo '</div>';
							
								// // edit, & delete icons
								// echo '<div class="right-icons">';
						  //   	echo '<i class="fa fa-pencil-square-o"></i>';
						  //   	echo '<i class="fa fa-times"></i>';
						  //   	echo '</div>';

					    	echo '</div>';
					    	
					    		// this is the id for the original post
								$post_id = $value->id;


								// call the model
								$this->load->model('Mypage_model');

								// Get all comments for each Post
								$data['comment'] = $this->Mypage_model->get_all_comments($post_id);

								
								// count all comments for each post	
								$data['amount'] = $this->Mypage_model->total_comments($post_id);

								// echo '<pre>';
								// print_r($data['amount']);

									// loop each comment and display
									foreach ($data['comment'] as $key => $value) {

										$result = array(
											'post_id' => $value->post_id,
										    'profile_img' => $value->profile_img,
										    'username' => $value->username,
										    'comment' => $value->comment,
										    'date' => $value->date
									    );
									
									
	


#	
#	This is the box that contains each comment
#	


								    		echo '<div class="comment">';
								   					
								   				
															// PROFILE IMAGE
					                                        $image_properties = array(

					                                        'src'   => '../assets/img/uploads/'.$result['profile_img'],
					                                        'alt'   => 'NZ Fishing Club',
					                                        'class' => 'profile-img',
					                                        'width' => 32,
					                                        'height' => 32
					                                    );

					                                    // this is the avatar displayed next to each comment
					                                    echo img($image_properties);
												
						                        
					                            // This div contains
					                            // 1. The user who wrote message
					                            // 2. The Date that the message was written
					                            // 3. The Message

						                        echo '<div>';
						                        echo '<h4>'.$result['username'].'</h4>';
						                        echo ' <span class="col-grey">'.date('D d M Y', strtotime($result['date'])).'</span>';
												echo '<p>'.$result['comment'].'</p>';
									    		echo '</div>';
									    	
					                                   
								    	
									    	// the closing div for .comment
								    		echo '</div>';


							    		
								 	} // end comment loop
							
					    		echo '</div>';


#
#	This box contains the Form to leave a comment
#


							echo '<div class="comment-box">';

							// avatar of the logged in user

												
		                                        $image_properties = array(

		                                        'src'   => '../assets/img/uploads/'.$userINFO[0]->profile_img,
		                                        'alt'   => 'NZ Fishing Club',
		                                        'class' => 'avatar',
		                                        // 'width' => '100%',
		                                        'title' => 'profile photos'
		                                    );

		                    // Avatar of the person who is logged in, ready to comment
		                    echo img($image_properties);
		                                  
		                    // Form to make a comment

		                    
		                    // MAKE A NEW FUNCTION FOR THIS FORM
		                    echo form_open_multipart('mypage/comment?id='.$user[0]->id);
		                    echo '<input type="text" class="hide" placeholder="Post a Comment" name="post_id" value="'.$post_id.'">';
		             
		                    echo '<input type="text" class="form-control" placeholder="Post a Comment" name="comment">';
		                    echo '<input type="submit" style="position: absolute; left: -9999px"/>';
					      	// echo 	'<textarea class="form-control" rows="1" id="comment" placeholder="Post a Comment" name="comment"></textarea>'.
					            	// '<button type="submit" class="btn btn-primary submit-btn button-end">Submit</button>'.
					        echo '</form>';


							echo '</div>';
						}
				    	?>

				    </div>
		    	</div>
			</div>
		</div>
	
</section>
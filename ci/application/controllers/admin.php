<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */

	public function __construct()
        {
                parent::__construct();

                session_start();
                $this->load->library('form_validation');

                $this->load->model('Admin_model');
                $this->load->model('Forum_model');
                $this->load->model('Photo_model');
                $this->load->model('Blog_model');
                $this->load->model('Resource_model');
                $this->load->library('session');
       
        // For development only
        //---------------------------------------------------------------
        $this->output->enable_profiler(TRUE);   
        //---------------------------------------------------------------


        }

	public function index()
	{
		// if the user is not logged in redirect to home page
		// if user is logged in but permission is not set to 2
		// redirect to the home page.
		// if user permission is set to 2, show admin

        // $userID = $this->session->userdata('user_id');
		// $user = $this->session->userdata( 'user_data' );

		// if($_SESSION['']==NULL){
		// 	redirect('/login');
		// }

		// if(!$user[0]->permission==2){
		// 	redirect('/');
		// }


		// Do admin Form Validation
		$this->form_validation->set_rules('pagetitle', 'Page Title', 'trim|required|xss_clean');
		$this->form_validation->set_rules('metadescription', 'Meta Description', 'trim|required|xss_clean');
		$this->form_validation->set_rules('headline', 'Headline', 'trim|required|xss_clean');
		$this->form_validation->set_rules('content', 'Content', 'trim|required|xss_clean');


		// gallery validations
		$this->form_validation->set_rules('userfile', 'filename', 'trim');
		$this->form_validation->set_rules('image-title', 'Image Title', 'trim');
		$this->form_validation->set_rules('alt-text', 'Alt Text', 'trim|xss_clean');
		$this->form_validation->set_rules('caption', 'Caption', 'trim|xss_clean');


		// Forum - add new category form validation
		$this->form_validation->set_rules('category', 'Category', 'trim|required|xss_clean');
		$this->form_validation->set_rules('description', 'Description', 'trim|required|xss_clean');


		// blog form validation
		$this->form_validation->set_rules('userfile', 'filename', 'trim');
		$this->form_validation->set_rules('page_title', 'Page Title', 'trim');
		$this->form_validation->set_rules('meta_desc', 'Alt Text', 'trim|xss_clean');
		$this->form_validation->set_rules('headline', 'Headline', 'trim|xss_clean');
		$this->form_validation->set_rules('content', 'Content', 'trim|xss_clean');



		// Bite times form validations
		$this->form_validation->set_rules('region', 'Region', 'trim|xss_clean');
		$this->form_validation->set_rules('date', 'Date', 'trim|xss_clean');
		$this->form_validation->set_rules('best_time', 'Best Time', 'trim|xss_clean');
		$this->form_validation->set_rules('banner', 'Banner', 'trim|xss_clean');
		#--------------------------------------------------------	

        // DISPLAY A LIST OF FORUM CATEGORY'S IN THE ADMIN PANEL

        // Get A list of category's from db
        $data['category'] = $this->Forum_model->get_category();     
 	

        #--------------------------------------------------------

        // DISPLAY A LIST OF FORUM CATEGORY'S IN THE ADMIN PANEL

        // Get A list of image's from db
        $data['gallery'] = $this->Photo_model->get_gallery();     
  	

        #--------------------------------------------------------
		
		// DISPLAY A LIST OF Blogs'S IN THE ADMIN PANEL

        // Get A list of blog's from db
        $data['blog'] = $this->Blog_model->get_every_blog();     
  	

        #--------------------------------------------------------


		// DISPLAY A LIST OF slider'S IN THE ADMIN PANEL

        // Get A list of slider's from db
        // These sliders are displayed on the admin/home page
        // this is where the slider can be either deleted, or info can be updated
       	$data['slider'] = $this->Admin_model->get_slider();     
  	

        #--------------------------------------------------------

       	// Get a list of Charters that need to be approved
        $data['charter_app'] = $this->Admin_model->get_charters_approval();

        #--------------------------------------------------------


        // Get a list of Tournaments that need to be approved
        $data['tournament_app'] = $this->Admin_model->get_tournaments_approval();


        #--------------------------------------------------------

        // Get a list of Campgrounds that need to be approved
        $data['campground_app'] = $this->Admin_model->get_campgrounds_approval();


        #--------------------------------------------------------

        // Get A list of messages that havent been read
        $data['message'] = $this->Admin_model->get_messages();     
  	

        #--------------------------------------------------------




		// if the form validations did not get used/triggered, show the admin/home view 
		if ($this->form_validation->run() == FALSE){

						
			$this->load->view('admin/header');
			$this->load->view('admin/nav');
			$this->load->view('admin/admin_nav');

			$this->load->view('admin/admin_home',$data);
			$this->load->view('admin/admin_gallery', $data);
			$this->load->view('admin/admin_forum', $data);
			$this->load->view('admin/admin_blog', $data);
			$this->load->view('admin/admin_bitetime');
			$this->load->view('admin/admin_moon');
			$this->load->view('admin/admin_charters', $data);
			$this->load->view('admin/admin_tournament', $data);
			$this->load->view('admin/admin_campgrounds',$data);
			$this->load->view('admin/admin_messages', $data);
			$this->load->view('admin/footer', $data);


		}else{

			// ADMIN HOME - POST DATA
			// get the post data as an array
			$post = array(
				
				'page_title' => $this->input->post('pagetitle'),
				'meta_desc' => $this->input->post('metadescription'),
				'headline' => $this->input->post('headline'),
				'content' => $this->input->post('content')

			);

			// remove the submit button from the post data
			array_pop($post);

			// Call the model
			$this->Admin_model->insert_data($post);

		//---------------------------------------------------------------


		}
	}

	public function blog_upload()
        {   

        	    $config['upload_path']          = 'assets/img/blogs/';
                $config['allowed_types']        = 'gif|jpg|png';
                $config['max_size']             = 1000;
                $config['max_width']            = 1024;
                $config['max_height']           = 768;

            // get the upload library   
            $this->load->library('upload', $config);

                if ( ! $this->upload->do_upload()){

                    $error = array('error' => $this->upload->display_errors());
 			error_log(__LINE__);

                    $this->index($error);


                }else{




			#--------------------------------------------------------

             
         	// get the filename
            $data = $this->upload->data('upload_data','file_name');


            // this is the filename which gets stored in the database
            $filename = $data['file_name'];

                
			#--------------------------------------------------------

			// ADMIN PHOTO GALLERY - POST DATA
			// get all post data as an array
			$post = array(
				'filename' => $filename,
				'page_title' => $this->input->post('page_title'),
				'meta_desc' => $this->input->post('meta_desc'),
				'headline' => $this->input->post('headline'),
				'content' => $this->input->post('content')
			);


			// remove the submit button from the post data
			// array_pop($post);

			$this->Blog_model->insert_blog($post);

			#--------------------------------------------------------

			redirect('admin');


			                
			}



        }

    public function edit_blog()
        {   

                $config['upload_path']          = 'assets/img/blogs/';
                $config['allowed_types']        = 'gif|jpg|png';
                $config['max_size']             = 1000;
                $config['max_width']            = 1024;
                $config['max_height']           = 768;

            // get the upload library   
            $this->load->library('upload', $config);

                if ( ! $this->upload->do_upload()){

                    $error = array('error' => $this->upload->display_errors());
            

                    $this->index($error);


                }else{




            #--------------------------------------------------------

             
            // get the filename
            $data = $this->upload->data('upload_data','file_name');


            // this is the filename which gets stored in the database
            $filename = $data['file_name'];

                
            #--------------------------------------------------------

            // this is the id for the blog that is being updated
            $id = $this->input->post('id');

            // get all post data as an array
            $post = array(
                'filename' => $filename,
                'page_title' => $this->input->post('page_title'),
                'meta_desc' => $this->input->post('meta_desc'),
                'headline' => $this->input->post('headline'),
                'content' => $this->input->post('content')
            );


            // remove the submit button from the post data
            // array_pop($post);

            $this->Admin_model->update_blog($id, $post);

            #--------------------------------------------------------

            redirect('admin');


                            
            }
        }


        // this function deletes the blog from the database
        // according to its id
        public function delete_blog()
        {
            // get the id of the row that will be deleted
            $id = $this->input->post('id');

            // get the filename for the blog image using $id
            $filename = $this->Admin_model->blog_img($id);

            // delete the image from the folder using unlink()
            unlink('assets/img/blogs/'.$filename[0]->filename);

            // pass the id to the db, and delete the row from the blog table
            $this->Admin_model->delete_blog($id);

            // redirect to admin
            redirect('admin');
        }



	public function gallery_upload()
        {   

        	    $config['upload_path']          = 'assets/img/gallery/';
                $config['allowed_types']        = 'gif|jpg|png';
                $config['max_size']             = 1000;
                $config['max_width']            = 1024;
                $config['max_height']           = 768;

            // get the upload library   
            $this->load->library('upload', $config);

                if ( ! $this->upload->do_upload()){

                    $error = array('error' => $this->upload->display_errors());
 

                    $this->index($error);


                }else{




			#--------------------------------------------------------


             
                	// get the filename
                    $data = $this->upload->data('upload_data','file_name');


                    // this is the filename which gets stored in the database
                   	$filename = $data['file_name'];

                 

			#--------------------------------------------------------

			// ADMIN PHOTO GALLERY - POST DATA
			// get all post data as an array
			$post = array(
				'filename' => $filename,
				'img_title' => $this->input->post('image-title'),
				'alt_text' => $this->input->post('alt-text'),
				'caption' => $this->input->post('caption')
			);


			// remove the submit button from the post data
			// array_pop($post);

			$this->Admin_model->insert_photo($post);

			#--------------------------------------------------------

			redirect('admin');


			                
			    }



        }


	
        public function edit_photo()
        {
            $id = $this->input->post('id');

            $post = array(
                'img_title' => $this->input->post('img-title'),
                'alt_text' => $this->input->post('alt-text'),
                'caption' => $this->input->post('caption')
            );

        	//$photos = $this->Admin_model->all_imgs();
            $this->Admin_model->update_gallery_img($id, $post);

            // redirect back to the start page
            redirect('admin');
        }


        // This Function Deletes the selected gallery image, 
        // the file is delete from the gallery folder & the db
        public function delete_photo()
        {
            // get the id of the item that is to be deleted
            $id = $this->input->post('id');

            // query the database, get the filename where id = $id
            $filename = $this->Admin_model->photo_filename($id);
            //print_r($filename[0]->filename);

            // delete the file from the folder using unlink()
            unlink('assets/img/gallery/'.$filename[0]->filename);

            // pass the $id to the model, then run the delete query
            $this->Admin_model->delete_photo($id);

            redirect('admin');
        }


        // CREATE A NEW FORUM CATEGORY
        public function forum()
        {

        	// get post data
        	$data = array(
        		'category' => $this->input->post('category'),
        		'description' => $this->input->post('description')

        	);

        	// insert query - put new category in forum table
        	$this->Admin_model->new_category($data);
        
            
            redirect('admin');

        }

        // this function updates the the database with the edited forum category
        public function edit_forum_category()
        {
            // gets the id to update
            $id = $this->input->post('id');

            // get the data to update that id
            $post = array(
                'category' => $this->input->post('category'),
                'description' => $this->input->post('description')
            );

            // pass data to the model where the update query will be run
            $this->Admin_model->update_category($id, $post);

            // redirect back to the admin page
            redirect('admin');
        }


        // this function deletes the forum category from the database
        // according to its id
        public function delete_forum_category()
        {
            // get the id of the row that will be deleted
            $id = $this->input->post('id');

            // pass the id to the db, and delete the row from the forum_category table
            $this->Admin_model->delete_forum_category($id);

            // redirect to admin
            redirect('admin');
        }



        public function bitetimes()
        {
        	$data = array(
        		'region_id' => $this->input->post('region'),
        		'date' => $this->input->post('date'),
        		'best_bite' => $this->input->post('best_time'),
        		'fishing_rating' => $this->input->post('banner')
        	);


        	$this->Resource_model->add_bitetimes($data);
        	redirect('admin');

        }

        public function slider_upload()
        {   

        	    $config['upload_path']          = 'assets/img/slider/';
                $config['allowed_types']        = 'gif|jpg|png';
                $config['max_size']             = 1000;
                $config['max_width']            = 1024;
                $config['max_height']           = 768;

            // get the upload library   
            $this->load->library('upload', $config);

                if ( ! $this->upload->do_upload()){

                    $error = array('error' => $this->upload->display_errors());

                }else{




					#--------------------------------------------------------


		             
		         	// get the filename
		            $data = $this->upload->data('upload_data','file_name');


		            // this is the filename which gets stored in the database
		            $filename = $data['file_name'];


					#--------------------------------------------------------

					// ADMIN PHOTO GALLERY - POST DATA
					// get all post data as an array
					$post = array(
						'filename' => $filename,
						'img_title' => $this->input->post('img_title'),
						'alt_text' => $this->input->post('alt_text'),
						'caption' => $this->input->post('caption')
					);


					// remove the submit button from the post data
					array_pop($post);

					$this->Admin_model->add_slider($post);

					#--------------------------------------------------------

					redirect('admin');


			                
				}

        }

        // This function updates the slider with the title, alt text and caption
        // the form is located in the footer modal
        public function update_slider()
        {
        	// get the id for the slider that is being updated
        	$id = $this->input->post('id');

        	// get all the post data
        	$post = array(
        		'img_title' => $this->input->post('img-title'),
				'alt_text' => $this->input->post('alt-text')
				// 'caption' => $this->input->post('caption')
        	);

        	// query the db
        	// update table home_slider where id is $_GET[id]
        	$this->Admin_model->update_slider($id, $post);

        	// redirect to admin
        	redirect('admin');
        }


        // This Function Deletes the selected slider image, 
        // the file is delete from the slider folder & the db
        public function delete_slider()
        {
            // get the id of the item that is to be deleted
            $id = $this->input->post('id');

            // query the database, get the filename where id = $id
            $filename = $this->Admin_model->slider_filename($id);
            //print_r($filename[0]->filename);

            // delete the file from the folder using unlink()
            unlink('assets/img/slider/'.$filename[0]->filename);

            // pass the $id to the model, then run the delete query
            $this->Admin_model->delete_slider($id);

            redirect('admin');
        }








		// this function is to approve the charter listing
		// Get the id
        // Update the charters table
        // change column "approve" to 1
        public function approve_charter()
        {
        	// the post id
        	$id = $_GET['id'];


        	// update db where id = $id
        	// change column approval to 1
        	$this->Admin_model->approve_charter($id);

        	// redirect back to admin
        	redirect('admin');
        }


        // this function is to approve the tournament listings
		// Get the id
        // Update the tournaments table
        // change column "approve" to 1
        public function approve_tournament()
        {
        	// the post id
        	$id = $_GET['id'];

        	// update db where id = $id
        	// change column approval to 1
        	$this->Admin_model->approve_tournament($id);

        	// redirect back to admin
        	redirect('admin');
        }

        // this function is to approve the campground listings
		// Get the id
        // Update the campground table
        // change column "approve" to 1
        public function approve_campground()
        {
        	// the post id
        	$id = $_GET['id'];

        	// update db where id = $id
        	// change column approval to 1
        	$this->Admin_model->approve_campground($id);

        	// redirect back to admin
        	redirect('admin');
        }


        // this function is to mark the Messages as read
		// Get the id
        // Update the messages table
        // change column "read" to 1
        public function read_message()
        {
        	// the post id
        	$id = $_GET['id'];

        	// update db where id = $id
        	// change column approval to 1
        	$this->Admin_model->read_message($id);

        	// redirect back to admin
        	redirect('admin');
        }

	
}
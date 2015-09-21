<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
ob_start();
class Register extends CI_Controller {

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
		// Call the CI_Model Constructor
		parent::__construct();
		session_start();

		$this->load->model('Registration_model');
		$this->load->helper('security');
        $this->load->library('form_validation');
		$this->load->library('Encrypt');
	 // 	$key = bin2hex( $this->encryption->create_key(16) );
		
 	    $this->load->library('session');



	}

	public function index()
	{
		// echo phpinfo();
		// this function validates the registration form 
		// sends all the user information to the database
		// traps the session id, 
		// then moves to the profile set up form

       
        // form validation rules
		$this->form_validation->set_rules('username','Username','trim|required|min_length[5]|max_length[15]|xss_clean|is_unique[user_registration.username]');
		$this->form_validation->set_rules('email', 'Email', 'required|is_unique[user_registration.email]');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|matches[confirm_password]');
		$this->form_validation->set_rules('confirm_password', 'Confirm Password', 'trim|required' );
		$this->form_validation->set_rules('location_region_id', 'Region', 'trim|required');
		//$this->form_validation->set_rules('location_id', 'Location', 'trim|required');


		// if the form validations did not get used/triggered, show part1 of the registration form  
		if ($this->form_validation->run() == FALSE){


			$this->load->view('html');
			$this->load->view('header');
			$this->load->view('navigation');
			$this->load->view('personal_details');

			$this->load->view('footer');



		}else{
			// user profile function
			//$this->user_profile();
			// get all the post data as an array, 
			// & hash the passwords
			$data = array(
			'username' => $this->input->post('username'),
			'email' => $this->input->post('email'),
			'password' => password_hash(  $this->input->post('password'), PASSWORD_BCRYPT ),
			'confirm_password' => password_hash(  $this->input->post('confirm_password'),  PASSWORD_BCRYPT ),
			'location_region_id' => $this->input->post('location_region_id'),
			'location_id' => $this->input->post('location_id')
			);



				// remove the submit button from the array
				$removed = array_pop($data);

				
				//	run the insert query from the model
				$this->Registration_model->insert_entry($data);



				// SUCCESS POINT



				// trap the last inserted id in a session
				$id = $this->db->insert_id();

				// GET INFO TO SET THE USERDATA
				$user = $this->Registration_model->get_user($id);

				// echo "<pre>";
				// print_r($this->Registration_model->get_user($id));
				

				// USER_DATA & USER_ID ARE SET HERE
				$userID = $this->session->set_userdata('user_id', $id);

				$this->session->set_userdata('user_data', $user);
				
				
				$this->user_profile();

			}	

				
	}










	public function user_profile()
	{
		// this function validates the form data
		// queries the database for the cover images, to display on the form
		// displays the form & passes all the info from the database to the view
		// the form action sends it to the do_upload function


      
        // form validation rules
		$this->form_validation->set_rules('profile_img','Upload A Profile Image', 'trim');
		$this->form_validation->set_rules('cover_img', 'Cover Image', 'trim|required');


		// if the form validations did not get used/triggered, show profile setup form  
		if ($this->form_validation->run() == FALSE){

			// Get the cover images from the database to display on the form
			$data['cover'] = $this->Registration_model->select_data();
				
			// load the view for the profile set up form
			$this->load->view('html');
			$this->load->view('header', $data);
			$this->load->view('navigation');
			$this->load->view('profile_setup', $data);

			$this->load->view('footer');

			 
		}
	}

	public function do_upload()
        {
        	// this function uploads the profile img
        	// gets the post data as an array 
        	// sends the array to the model where the table is update
        	// then redirects to the users profile page


        		// file uploader
                $config['upload_path']          = 'assets/img/uploads/';
                $config['allowed_types']        = 'gif|jpg|png';
                $config['max_size']             = 1000;
                $config['max_width']            = 1024;
                $config['max_height']           = 768;

                // the the upload library
                $this->load->library('upload', $config);

                // if there was a problem with the upload 
                // display the errors 
                if ( ! $this->upload->do_upload()){

                    $error = array('error' => $this->upload->display_errors());

                    $this->user_profile($error);
                    //$this->load->view('upload_form', $error);

                }else{

                	// SUCCESS POINT FOR UPLOAD
                    
                	// get the filename
                    $data = $this->upload->data('upload_data','file_name');
                   
                   
                    // this is the filename which gets stored in the database
                   	$filename = $data['file_name'];
                
                   
                   	// user session id
                   	$userID = $this->session->userdata( 'user_id' );
                   

                   	// get all the post data as an array
                    $post_data = array(
                    	'id' => $userID,
                    	'profile_img' => $filename,
                    	'cover_img_id'	=> $this->input->post('cover_img_id')

                    );

                    // load the model and update the user_registration table 
                    // with the profile and cover images
                    $this->Registration_model->update_entry($post_data, $userID);
                    
                   	


                   	// USER_DATA & USER_ID ARE SET HERE
					//$userID = $this->session->set_userdata('user_id', $id);
                    //$userID = $this->session->userdata('user_id');

					// GET INFO TO SET THE USERDATA
					$user = $this->Registration_model->get_user($userID);
					print_r($user);
					
					$this->session->set_userdata('user_data', $user);


					// echo '<pre>';
					// print_r($users);

                    //redirect to my page where id = sessionID    
                    redirect('mypage?id='.$userID);
                   
                }
        }

        function userdata( $key, $val = null ){

        	// makes userdata global by calling $this->session->userdata('user_id')
		    $ci = &get_instance();
		    
		    if ( $val !== null ){

		    	$ci->session->set_userdata( $key, $val );

		  	} else {
		    	
		    	return $ci->session->userdata( $key );
		  	}
		}

}

/* End of file register.php */
/* Location: ./application/controllers/register.php */
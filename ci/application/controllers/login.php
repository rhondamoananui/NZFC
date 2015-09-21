<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
ob_start();
class Login extends CI_Controller {

	public function __construct()
	{
		// Call the CI_Model Constructor
		parent::__construct();
		//session_start();
		$this->load->model('Login_model');

		// //---------------------------------------------------------------
		// $this->output->enable_profiler(TRUE);	
		// //---------------------------------------------------------------
	}
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
	public function index()
	{


		// load form validation library
        $this->load->library('form_validation');
     
  
        // Validate the form
        // use call back to pass $password to validate()
   		$this->form_validation->set_rules('email', 'Email', 'trim|required|xss_clean');
   		$this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|callback_validate');


   		// if the validations were not run
   		// display the form
        if($this->form_validation->run() == FALSE)
        {

			$this->load->view('html');
			$this->load->view('header');
			$this->load->view('navigation');
			$this->load->view('login');

			$this->load->view('footer');
			
		}else{
			// if the form is validated, it will be sent 
			// to check_database to process the data and start a session
			// if all is ok, redirect to mypage where the session will bring up 
			// all of the users data

			// USER_DATA & USER_ID ARE SET HERE
			$userID = $this->session->userdata( 'user_id' );
			redirect('admin?id='.$userID, 'refresh');

		}
	}


	public function validate($password) {
		//echo print_r($password);
	    $email = $this->input->post('email');
	    $password = $this->input->post('password');
// print_r($email);
// print_r($password);

	    if (!isset($email) || !isset($password) || !$this->login($this->input->post('email'), $this->input->post('password'))) {
	        $this->form_validation->set_message('validate', 'No match for email and/or Password.');
	        return FALSE;
	    }

	}


	public function login($username = 0, $password = 0) {

		// Get post data from the login form
	    $email = $this->input->post('email');
	    $password = $this->input->post('password');


	    $hashed = $this->confirm_password();
		$hashed_password = $hashed[0]->password;
    

		if (password_verify($this->input->post('password'), $hashed_password)) {
		    echo 'Password is valid!';

			// GET INFO TO SET THE USERDATA

			// get all user data where email = $email
			$userdata = $this->Login_model->get_user($email);
			$id = $userdata[0]->id;


			// SET THE USERDATA		
			$this->session->set_userdata('user_data', $userdata);
			$this->session->set_userdata('user_id', $id);	

			$user = $this->session->userdata('user_data');
			$userID = $this->session->userdata('user_id');	

			redirect('admin?id='.$userID);

		} else {
		    echo 'Invalid password.';
		}

		
	

		
		//$this->Login_model->verify_pass($data);
			

	}

	public function confirm_password() {

	    $this->db->where('email', $this->input->post('email'));

	    $query = $this->db->get('user_registration');
	    //print_r($userdetails);
	    return $query->result();

 	}


}

/* End of file login.php */
/* Location: ./application/controllers/login.php */
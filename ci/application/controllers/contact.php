<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contact extends CI_Controller {

public function __construct()
	{
		// Call the CI_Model Constructor
		parent::__construct();
		session_start();

		$this->load->helper('form');
		$this->load->model('Admin_model');

				// For development only
		//---------------------------------------------------------------
		$this->output->enable_profiler(TRUE);	
		//---------------------------------------------------------------
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
        $this->load->library('form_validation');
     
  
        // Validate the form
        // use call back to pass $password to validate()
   		$this->form_validation->set_rules('sender_email', 'Email', 'trim|xss_clean');
   		$this->form_validation->set_rules('message', 'Message', 'trim|required|xss_clean');

		// if the form validations did not get used/triggered, show the admin/home view 
		if ($this->form_validation->run() == FALSE){

			$this->load->view('html');
			$this->load->view('header');
			$this->load->view('navigation');
			$this->load->view('cta');

			$this->load->view('contact_form');

			$this->load->view('footer');
		}


	}

	public function insert_message(){

		$post = array(
			'sender_email' => $this->input->post('sender_email'),
			'message' => $this->input->post('message')
		
		);


		// Insert the message into the database
		$this->Admin_model->insert_message($post);

		// Show Success message

			$this->load->view('html');
			$this->load->view('header');
			$this->load->view('navigation');
			$this->load->view('cta');

			$this->load->view('message-success');

			$this->load->view('footer');		

	}

}

/* End of file anglers.php */
/* Location: ./application/controllers/anglers.php */
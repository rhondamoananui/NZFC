<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Anglers extends CI_Controller {

public function __construct()
	{
		// Call the CI_Model Constructor
		parent::__construct();
		session_start();

		$this->load->database();
		$this->load->model('Anglers_model');
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




		// this function gets the username, region & profile img
		// for the current user

		// current session id
		//$id = $this->session->userdata('user_id');
		
		// get username, region, profile image,
		$data['user'] = $this->Anglers_model->get_angler_info();
		$data['region'] = $this->Anglers_model->select_region();
		

//$user = $this->session->userdata( 'user_id' );
//        echo '<pre>';
//         print_r($user);
// echo '</pre>';

		
		$user_amount = count($data['user']);
		


		$this->load->view('html');
		$this->load->view('header');
		$this->load->view('navigation');
		$this->load->view('cta');

		$this->load->view('angler_profiles', $data);


		$this->pagination($user_amount);

		$this->load->view('footer');


	}

public function pagination($user_amount)
	{
		$this->load->library('pagination');

		$config['base_url'] = 'http://nzfishingclub.com/anglers/page';
		$config['total_rows'] = $user_amount;
		$config['per_page'] = 6;

		$this->pagination->initialize($config);

		echo $this->pagination->create_links();
	}

public function page()
	{
		// this function goes with the pagination function, 
		$data['user'] = $this->Anglers_model->get_angler_info();
		$data['region'] = $this->Anglers_model->select_region();
		


		echo '<pre>';
		$user_amount = count($data['user']);
		echo '</pre>';


		$this->load->view('html');
		$this->load->view('header');
		$this->load->view('navigation');
		$this->load->view('cta');

		$this->load->view('angler_profiles', $data);


		$this->pagination($user_amount);

		$this->load->view('footer');
	}
}

/* End of file anglers.php */
/* Location: ./application/controllers/anglers.php */
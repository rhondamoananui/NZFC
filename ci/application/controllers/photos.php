<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Photos extends CI_Controller {
	public function __construct()
	{
		// Call the CI_Model Constructor
		parent::__construct();
		session_start();
		$this->load->model('Photo_model');
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

		// GET ALL FILENAME'S FROM THE GALLERY
		$post['files'] = $this->Photo_model->get_gallery();


		$this->load->helper('html');
        $this->load->helper('url');

		$this->load->view('html');
		$this->load->view('header');
		$this->load->view('navigation');
		$this->load->view('cta');

		$this->load->view('photos', $post);

		$this->load->view('footer');



	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
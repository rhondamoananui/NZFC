<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {
	public function __construct()
	{
		// Call the CI_Model Constructor
		parent::__construct();
		session_start();
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
		// query the database
		// get photo, name and registration date for the 4 most recent members
		// Send the info to the groups page
		$data['members'] = $this->Admin_model->get_recent_members();

		// query the database
		// get the topic id. username, avatar, date for the 4 most recent posts
		// send the info to the groups page
		$data['posts'] = $this->Admin_model->get_recent_posts();

		// query the database
		// get the id. filename, headline, for the 4 most recent blogs
		// send the info to the groups page
		$data['blogs'] = $this->Admin_model->get_recent_blogs();

		// query the database
		// get the filename, alt text, title, etc for each of the slider images
		// send the info to the slider page
		$data['slider'] = $this->Admin_model->get_slider_img();

		// These views make up the home page
		$this->load->view('html');
		$this->load->view('header');
		$this->load->view('navigation');
		$this->load->view('cta');


		$this->load->view('slider', $data);
		$this->load->view('content');

		$this->load->view('icons');
		$this->load->view('groups', $data);

		$this->load->view('footer');


	}

}

/* End of file index.php */
/* Location: ./application/controllers/index.php */
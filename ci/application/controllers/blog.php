<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Blog extends CI_Controller {

	public function __construct()
	{
		// Call the CI_Model Constructor
		parent::__construct();
		session_start();
		$this->load->model('Blog_model');

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


// This is the Controller for the BLOG LISTINGS
// Show the 8 most recent blogs on the left
// Show the all headlines on the right as links to the article page
public function index()
	{
		// get all the blog infor from the db
		// this gets the 8 most recent blogs
		$data['blog'] = $this->Blog_model->get_all_blogs();

		// get get id, img, headline from all of the blogs
		// this data will be used on the recent-blogs list
		$data['list'] = $this->Blog_model->get_every_blog();

		$this->load->view('html');
		$this->load->view('header');
		$this->load->view('navigation');
		$this->load->view('cta');
		
		$this->load->view('current-blog', $data);
		$this->load->view('recent-blogs', $data);
		// $this->load->view('advertisement');


		$this->load->view('footer');
	}


public function article()
	{

		// get all blog info where id = $get id
		//$data['blog'] = $this->Blog_model->get_all_blogs();
		$getID = $_GET['id'];
	

		$data['blog'] = $this->Blog_model->get_each_blog($getID);

		// get get id, img, headline from all of the blogs
		// this data will be used on the recent-blogs list
		$data['list'] = $this->Blog_model->get_every_blog();

		$this->load->view('html', $data);
		$this->load->view('header');
		$this->load->view('navigation');
		$this->load->view('cta');

		
		$this->load->view('article', $data);

		$this->load->view('recent-blogs', $data);
		// $this->load->view('advertisement');


		$this->load->view('footer');
	}


}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
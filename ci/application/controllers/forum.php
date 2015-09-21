<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Forum extends CI_Controller {
		public function __construct()
	{
		// Call the CI_Model Constructor
		parent::__construct();
		session_start();
		$this->load->model('Forum_model');
		$this->load->library('form_validation');

		$getID = $this->input->get('id');
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


		// get a list of category's 
		// pass the data to forum_table1 view
		$data['category'] = $this->Forum_model->get_category();


		// this is the view for the main forum page
		// this is where a lis of category's will be displayed
		$this->load->helper('html');
        $this->load->helper('url');

		$this->load->view('html');
		$this->load->view('header');
		$this->load->view('navigation');
		$this->load->view('cta');

		$this->load->view('forum_table1', $data);

		$this->load->view('footer');
	}

	public function topic()
	{

		// find out what the $_GET[id] is
		// this will be used to query the database
		$getID = $this->input->get('id');

		// GET ALL TOPICS FROM THE DB TO DISPLAY ON THE TOPICS PAGE 
		// where the category id matches the get id
		$topics['topic'] = $this->Forum_model->get_topic($getID);


		//$getID = $this->input->get('id');

		// GET EACH CATEGORY WHERE ID MATCHES THE $_GET ID
		$heading['headline'] = $this->Forum_model->get_cat_headline($getID);

		//---------------------------------------------------------------

		//run the form validations
		$this->form_validation->set_rules('topic','Topic','trim|required|min_length[5]|max_length[500]|xss_clean');

		
		if ($this->form_validation->run() == FALSE){

			$this->load->helper('html');
	        $this->load->helper('url');

			$this->load->view('html');
			$this->load->view('header');
			$this->load->view('navigation');
			$this->load->view('cta');

			$this->load->view('topic_heading', $heading);
			$this->load->view('topic', $topics);
			$this->load->view('footer');


		}else{

		//---------------------------------------------------------------
		// get the post data & the category id($_GET[id]) & the user_id (session)
		$getID = $this->input->get('id');
		
		// get all the data, to add to db
		$data = array(		
		'topic' => $this->input->post('topic'),
		'forum_category_id' => $getID,
		'user_id' => $this->session->userdata('user_id')
		);


		// send data to the database
		$this->Forum_model->insert_topic($data);

		//---------------------------------------------------------------

		redirect('forum/topic?id='.$getID);

		//$this->post();


		}



		
	}

	public function post()
	{
		//---------------------------------------------------------------

		$getID = $this->input->get('id');
		// GET ALL posts FROM THE DB TO DISPLAY ON THE post PAGE where the topic id matches the get id
		$data['post'] = $this->Forum_model->get_post($getID);

		//---------------------------------------------------------------

		$getID = $this->input->get('id');
		// GET EACH CATEGORY WHERE ID MATCHES THE $GET ID
		$heading['headline'] = $this->Forum_model->get_topic_headline($getID);

		//---------------------------------------------------------------

		//run the form validations
		$this->form_validation->set_rules('post','Post','trim|required|min_length[5]|max_length[500]|xss_clean');


		if ($this->form_validation->run() == FALSE){

			$this->load->helper('html');
	        $this->load->helper('url');

			$this->load->view('html');
			$this->load->view('header');
			$this->load->view('navigation');
			$this->load->view('cta');
			$this->load->view('post_heading', $heading);
			$this->load->view('post', $data);
			$this->load->view('footer');


		}else{

		//---------------------------------------------------------------
		// get the post data & the category id($_GET[id]) & the user_id (session)
		$getID = $this->input->get('id');
		$name = $this->session->userdata('user_data');
		//echo print_r();

		// get all the data, to add to db
		$data = array(		
		'post' => $this->input->post('post'),
		'forum_topic_id' => $getID,
		'user_id' => $this->session->userdata('user_id'),
		'username' => $name[0]->username,
		'avatar' => $name[0]->profile_img
		);


		// send data to the database
		$this->Forum_model->insert_post($data);

		redirect('forum/post?id='.$getID);

		//---------------------------------------------------------------




		}




		
	}	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
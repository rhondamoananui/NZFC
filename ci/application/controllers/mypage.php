<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
ob_start();
class MyPage extends CI_Controller {


	public function __construct()
        {

        
                parent::__construct();
                session_start();
                $this->load->helper('form');
                $this->load->library('session');
                $this->load->model('Mypage_model');
                $this->load->model('Registration_model');
                $this->load->library('form_validation');

        // the current user session
		
		$userID = $this->session->userdata('user_id');
		$user = $this->session->userdata( 'user_data' );


// //---------------------------------------------------------------
		 $this->output->enable_profiler(TRUE);	
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

		
		
		// the current user session
		$userID = $this->session->userdata('user_id');
		$user = $this->session->userdata( 'user_data' );

		if($userID==NULL){
			redirect('http://www.nzfishingclub.co.nz/ossn/');
		}

			// user id
			$id = $_GET['id'];

			// $post_id = $user = $this->session->userdata( 'post_id' );

			// print_r($post_id);

			// get all the messages for each user, to display on each profile page
			// SELECT user_registration_id, post, timestamp, from_user FROM mypage_post
			// WHERE user_registration_id = $_GET['id']
			$data['post'] = $this->Mypage_model->get_all_posts($id);
			
			// get all the id's
			// echo '<pre>';
			// print_r($data['post']);

			// Foreach post
			// extract the id from $data['post']
			
			// foreach ($data['post'] as $key => $value) {
				
			 	// $post_id = $data['post'][0]->id;
				
				


				// Get the comments for all posts, to display on the profile page

				// Get the comment & user_id where the post_id = $post_id


				 // $data['comment'] = $this->Mypage_model->get_all_comments($post_id);

				// echo '<pre>';
				// print_r($data['comment']);

				
			

			// if ($this->form_validation->run() == FALSE){

			// load the view for the profile page (MY PAGE)
			//---------------------------------------------------------------
				$this->load->view('html');
				// $this->load->view('header');
				$this->load->view('navigation');
				$this->load->view('profile-nav');
				
				$this->load->view('profile_banner', $data);
				// $this->load->view('post_form');
				// $this->load->view('post_results');

				$this->load->view('footer');
			//---------------------------------------------------------------

			// }
		// }

		


	}

		public function my_album()
	{


		$this->load->view('html');
		$this->load->view('header');
		$this->load->view('navigation');
		
		$this->load->view('profile_banner');


		$this->load->view('my_album');
		$this->load->view('upload_form', array('error' => ' ' ));


		$this->load->view('footer');
	}

	public function profile()
	{
			$id = $_GET['id'];

			// get all the messages for each user, to display on each profile page
			// SELECT user_registration_id, post, timestamp, from_user FROM mypage_post
			// WHERE user_registration_id = $_GET['id']
			$data['post'] = $this->Mypage_model->get_all_posts($id);

			// echo '<pre>';
			// print_r($data['post']);


			// $post_id = $data['post'];
				
				


				// Get the comments for all posts, to display on the profile page

				// Get the comment & user_id where the post_id = $post_id


				 // $data['comment'] = $this->Mypage_model->get_all_comments($post_id);

		
			// query the database for all user info
			$data['user'] = $this->Mypage_model->user_data($id);
			$userID = $this->session->userdata( 'user_id' );

			// load the view for the profile page (MY PAGE)
			//---------------------------------------------------------------
			$this->load->view('html');
			$this->load->view('navigation');
			$this->load->view('profile-nav');
			
			// $this->load->view('profile_banner');
			
			$this->load->view('anglers_banner', $data);

			// only show the post form if the user is logged in
			// if( $userID==TRUE){
			// $this->load->view('post_form', $data);

			// }
			// $this->load->view('post_results', $data);

			$this->load->view('footer');
			//---------------------------------------------------------------
			


	}

	public function do_upload()
        {
                $config['upload_path']          = '/assets/img/uploads/';
                $config['allowed_types']        = 'gif|jpg|png';
                $config['max_size']             = 100;
                $config['max_width']            = 1024;
                $config['max_height']           = 768;

                $this->load->library('upload', $config);

                if ( ! $this->upload->do_upload())
                {
                        $error = array('error' => $this->upload->display_errors());

                        $this->load->view('upload_form', $error);
                }
                else
                {
                        $data = array('upload_data' => $this->upload->data());

                        $this->load->view('upload_success', $data);
                }
        }
    public function make_comment()
    {
    	// this function is for posting a comment on a users page
    	// when a user comments i will need the session userdata(username) this is who posted the comment
    	// insert the user_registration_id, post, timestamp, from_user (current session id)

    	// set the session data
		$userID = $this->session->userdata( 'user_id' );
		$user = $this->session->userdata( 'user_data' );


		// get the get id
		$id = $_GET['id'];


    	// form validation rules
		$this->form_validation->set_rules('comment','','required|trim|xss_clean');


		// the post data to be sent to the database
		$data = array(
			'user_registration_id' => $id,
			'post' => $this->input->post('comment'),
			'from_user' => $user[0]->username
		);


		// put data in the database
		$this->Mypage_model->post_comment($data);


		// go to the function that gets all post data to display on the user page
		$this->profile($id);

		


    }

    public function comment()
    {
    	// This function is for adding a comment to a post on a profile page
    	$id = $_GET['id'];

    	$userID = $this->session->userdata( 'user_id' );
		$user = $this->session->userdata( 'user_data' );

		// store the post_id as a session so it can be used on other pages
		$this->session->set_userdata('post_id', $this->input->post('post_id'));


    	// $this->form_validation->set_rules('comment', 'Comment', 'required|trim|xss_clean');

    	$data = array(
			'post_id' => $this->input->post('post_id'),
			'comment' => $this->input->post('comment'),
			'user_id' => $user[0]->id,
			'username' => $user[0]->username,
			'profile_img' => $user[0]->profile_img
		);

		// put data in the database
		$this->Mypage_model->comment($data);

		redirect('mypage/profile?id='.$id );
    }


}

/* End of file mypage.php */
/* Location: ./application/controllers/mypage.php */
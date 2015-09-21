<?php
ob_start();	
class Mypage_model extends CI_Model {

	public function __construct()
	{
		// Call the CI_Model Constructor

		parent::__construct();
		
		$this->load->database();
	}

	public function get_user_data($id)
	{
		// SELECT id, username, profile_img, cover_img_id FROM user_registration WHERE id = the current session
		//echo 'hello';

		$this->db->select('id');
        $this->db->select('username');
        $this->db->select('profile_img');
        $this->db->select('cover_img_id');
        $this->db->from('user_registration');
        $this->db->where('id', $id);
        $query = $this->db->get();  
        return $query->result();

	}
	public function user_data($id)
		{
		// SELECT filename FROM cover_img WHERE id = the current session
		//echo 'hello';

		$this->db->select('id');
        $this->db->select('username');
        $this->db->select('profile_img');
        $this->db->select('cover_img_id');
        $this->db->from('user_registration');
        $this->db->where('id', $id);
        $query = $this->db->get();  
        return $query->result();

	}

	public function post_comment($data)
	{

		//	INSERT  $data into the mypage_post table in the database, $data comes from the controller
       	$this->db->insert('mypage_post', $data);

	}


	// Add a reply comment to a post Comment 
	public function comment($data)
	{

		//	INSERT  $data into the mypage_comment table in the database, $data comes from the controller
       	$this->db->insert('mypage_comments', $data);

	}

	public function get_all_posts($id)
	{
		
		 // $this->db->select('comment');
		 // $this->db->select('username');
   //      $this->db->select('profile_img');
   //      $this->db->select('post_id');
		// $this->db->select('*');
		// $this->db->from('mypage_comments');
		
		// $this->db->join('mypage_post', 'mypage_comments.post_id');
		// $this->db->where('user_registration_id', $id);
		// $this->db->order_by('timestamp', 'DESC'); 
		// $query = $this->db->get();

		// SELECT $user_registration, post, timestamp, from_user FROM mypage_post
		$this->db->where('user_registration_id', $id);
		$this->db->order_by('timestamp', 'DESC');
		$query = $this->db->get('mypage_post'); 
		return $query->result();

	}

	// get all the comments to display below the post comment on the profile page
	public function get_all_comments($post_id)
	{
		// $this->db->select('id');
  //       $this->db->select('comment');
  //       $this->db->select('user_id');
  //       $this->db->select('date');
  //       $this->db->select('username');
  //       $this->db->select('profile_img');
        // $this->db->select('*');


        $this->db->where('post_id', $post_id);
        $this->db->order_by('date', 'ASC');
        $query = $this->db->get('mypage_comments');  
        return $query->result();

	}


	function total_comments($post_id)
{
    $this->db->like('post_id', $post_id);
    $this->db->from('mypage_comments');
    return $this->db->count_all_results();
}

		public function get_username($from_userID)
	{
		// SELECT $user_registration, post, timestamp, from_user FROM mypage_post
		
		$this->db->select('username');		
		$this->db->from('user_registration'); 
		$this->db->where('id', $from_userID);
        $query = $this->db->get();  
        return $query->result();
	}
}

?>


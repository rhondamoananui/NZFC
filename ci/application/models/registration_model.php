<?php
class Registration_model extends CI_Model {
	
	public function __construct()
	{
		// Call the CI_Model Constructor
		parent::__construct();

		$this->load->database();
	}

	public function insert_entry($data)
	{
		
			//	INSERT  $data into the user_registration table in the database, $data comes from the controller
			$this->db->insert('user_registration', $data);
			

		
	}

	public function update_entry($post_data)
	{
			// get filename from upload data
			// get cover img data (post)

			//update db with the 2 items
			$id = $post_data['id'];

			$profile = array(
				'profile_img' => $post_data['profile_img'],
				'cover_img_id' => $post_data['cover_img_id']

			);

			
			//	UPDATE user_registration with profile image and cover image
			$this->db->where('id', $id);
			$this->db->update('user_registration', $profile);
			
			// $this->db->update('user_registration', $profile, "id = ".$id);
			
		
	}
	public function select_data()
     {

        $this->db->select('id');
        $this->db->select('filename');
        $this->db->from('cover_img');
        $query = $this->db->get();  // Produces: SELECT id, filename FROM cover_img
        return $query->result();

    }

    public function get_user($id)
    {
    	$this->db->where('id', $id);
    	$query = $this->db->get('user_registration');
    	return $query->result();
    }

    public function login() {


	    //query db
	    $this->db->where('email', $email);
	    $this->db->where('password', password_verify($password, $hashed_password));

	    $user_query = $this->db->get($this->db->dbprefix . 'user_registration');

	    if ($user_query->num_rows() > 0) {

	        $set_userdata = array(
	            'user_id' => $user_query->row('user_id'),
	            'email' => $user_query->row('email')

	        );

	        $this->session->set_userdata($set_userdata);

	        return true;

	    } else {

	        return false;
	    }
	}
}
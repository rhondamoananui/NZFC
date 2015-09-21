<?php
class Login_model extends CI_Model {
	
	public function __construct()
	{
		// Call the CI_Model Constructor
		parent::__construct();

		$this->load->database();
	}

	public function get_user($email)
	{
		$this->db->where('email', $email);
		$query = $this->db->get('user_registration');
		return $query->result();


	}

	public function verify_pass($data)
	{

	    $query = $this->db->get('user_registration', $data);
	    return $query->result();

	    print_r($query->result);
	}


}
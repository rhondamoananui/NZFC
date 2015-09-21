<?php
ob_start();
class Anglers_model extends CI_Model {
	
	public function __construct()
	{
		// Call the CI_Model Constructor
		parent::__construct();

		$this->load->database();
	}

	public function get_angler_info()
	{
		// SELECT id, username, profile_img FROM user_registration
		

		$this->db->select('id');
        $this->db->select('username');
        $this->db->select('profile_img');
        $this->db->select('location_region_id');
        $this->db->from('user_registration');
        $query = $this->db->get();  
        return $query->result();



	}
	public function select_region()
	{
		$this->db->select('username');
		$this->db->select('location_region_id');
		$this->db->select('profile_img');
		//$this->db->select('location');

        $this->db->from('user_registration');
        $this->db->join('region', 'user_registration.location_region_id=region.id', 'inner');


       	// $this->db->from('region');
        // $this->db->join('user_registration','user_registration.location=region.name', 'left');

        $query = $this->db->get();  
        return $query->result();




		// SELECT id region FROM region W

		// $this->db->select('id');
		// $this->db->select('region');
  //       $this->db->from('region');
  //       $query = $this->db->get();  
  //       return $query->result();

	}
}

?>


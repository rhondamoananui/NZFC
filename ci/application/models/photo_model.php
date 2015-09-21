<?php
class Photo_model extends CI_Model {

        public function __construct()
        {
                parent::__construct();
                $this->load->database();
        }

        // This query gets all of the info from the gallery table
        public function get_gallery()
        {
                $query = $this->db->get('photo_gallery');  
                return $query->result();
        }

}
?>
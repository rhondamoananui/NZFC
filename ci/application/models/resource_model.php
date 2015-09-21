<?php
class Resource_model extends CI_Model {

        public function __construct()
        {
                parent::__construct();
                $this->load->database();
        }

        public function add_bitetimes($data)
        {
                $this->db->insert('bite_times', $data);
        }

        public function get_bitetimes()
        {

                $query = $this->db->get('bite_times');
                return $query->result();
        }

        // --------------------------------------------------------
        //                      CHARTERS
        // --------------------------------------------------------

        // insert the main charter info into the database
        public function insert_charter($post)
        {
                $this->db->insert('charters', $post);
        }

        // update the charters table with extra information
        public function update_charter($post, $id)
        {
                $this->db->where('id', $id);
                $this->db->update('charters', $post);
        }

        // get the id which has the given email address
        public function charter_id($email)
        {
                $this->db->where('email', $email);
                $this->db->select('id');
                $this->db->from('charters');
                $query = $this->db->get();
                return $query->result();

        }


        public function get_charters($region)
        {
                $this->db->where('region_id', $region);
                $this->db->where('approval', 1);
                $this->db->from('charters');
                $query = $this->db->get();
                return $query->result();
        }

        public function get_region($region)
        {
                $this->db->where('id', $region);
                $this->db->select('name');
                $this->db->from('region');
                $query = $this->db->get();
                return $query->result();
        }

        public function get_all_charters()
        {
                $this->db->where('featured', 1);
                $this->db->where('approval', 1);
                $query = $this->db->get('charters');
                return $query->result();               
        }
                public function get_charter_info($id)
        {
                $this->db->where('id', $id);
                $this->db->where('approval', 1);
                $query = $this->db->get('charters');
                return $query->result();               
        }


        // --------------------------------------------------------
        //                      TOURNAMENTS
        // --------------------------------------------------------

        public function insert_tournament($post)
        {
                $this->db->insert('tournaments', $post);
        }

        // get the id which has the given email address
        public function tournament_id($email)
        {
                $this->db->where('email', $email);
                $this->db->select('id');
                $this->db->from('tournaments');
                $query = $this->db->get();
                return $query->result();

        }

        // update the tournaments table with extra information
        public function update_tournament($post, $id)
        {
                $this->db->where('id', $id);
                $this->db->update('tournaments', $post);
        }

        public function get_tournaments($region)
        {
                $this->db->where('region_id', $region);
                $this->db->where('approval', 1);
                $this->db->from('tournaments');
                $query = $this->db->get();
                return $query->result();
        }

        public function get_all_tournaments()
        {
                $this->db->where('featured', 1);
                $this->db->where('approval', 1);
                $query = $this->db->get('tournaments');
                return $query->result();               
        }
        
        public function get_tournament_info($id)
        {
                $this->db->where('id', $id);
                $this->db->where('approval', 1);
                $query = $this->db->get('tournaments');
                return $query->result();               
        }

        // --------------------------------------------------------
        //                      CAMPGROUNDS
        // --------------------------------------------------------


        public function insert_campground($post)
        {
                $this->db->insert('campgrounds', $post);
        }

        // get the id which has the given email address
        public function campground_id($email)
        {
                $this->db->where('email', $email);
                $this->db->select('id');
                $this->db->from('campgrounds');
                $query = $this->db->get();
                return $query->result();

        }

        // update the tournaments table with extra information
        public function update_campground($post, $id)
        {
                $this->db->where('id', $id);
                $this->db->update('campgrounds', $post);
        }










        public function get_campground_info($id)
        {
                $this->db->where('id', $id);
                $this->db->where('approval', 1);
                $query = $this->db->get('campgrounds');
                return $query->result();               
        }
        public function get_all_campgrounds()
        {
                $this->db->where('featured', 1);
                $this->db->where('approval', 1);
                $query = $this->db->get('campgrounds');
                return $query->result();               
        }
        public function get_campgrounds($region)
        {
                $this->db->where('region', $region);
                $this->db->where('approval', 1);
                $this->db->from('campgrounds');
                $query = $this->db->get();
                return $query->result();
        }
}
?>
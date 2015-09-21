<?php
class Blog_model extends CI_Model {

        public function __construct()
        {
                parent::__construct();
                $this->load->database();
        }

        // only get the 8 most recent blogs
        public function get_all_blogs()
        {
                $this->db->order_by('id', 'DESC');
                $this->db->limit('8');
                $this->db->from('blog');
                $query = $this->db->get();
                return $query->result();
        }

        // get all the info for each blog 
        // where id = $_GET['id']
        public function get_each_blog($getID)
        {
                $this->db->where('id', $getID);
                $this->db->from('blog');
                $query = $this->db->get();
                return $query->result();
        }

        // get all blog information 
        // from all of the blogs
        public function get_every_blog()
        {
                $query = $this->db->get('blog');
                return $query->result();
        }


        // insert into blog table all of the blog data
        public function insert_blog($post)
        {
                $this->db->insert('blog', $post);


        }
}
?>
<?php
class Forum_model extends CI_Model {

        public function __construct()
        {
                parent::__construct();
                $this->load->database();
        }


        public function get_category()
        {

                $query = $this->db->get('forum_category');  
                return $query->result();
        }

        public function insert_topic($data)
        {

                $this->db->insert('forum_topic', $data);

        }

        public function get_topic($getID)
        {
                // $this->db->select('id, topic, forum_category_id, user_id, date');
                //$this->db->select(COUNT('topic'));
                $this->db->where('forum_category_id', $getID);
                $query = $this->db->get('forum_topic');  
                return $query->result();
        }


        public function get_cat_headline($getID)
        {
                $this->db->where('id', $getID);
                $this->db->select('category');
                $this->db->from('forum_category');
                $query = $this->db->get();  
                return $query->result();
        }
        public function get_post($getID)
        {
                $this->db->where('forum_topic_id', $getID);
                $query = $this->db->get('forum_post');  
                return $query->result();
        }

        public function get_topic_headline($getID)
        {
                $this->db->where('id', $getID);
                $this->db->select('topic');
                $this->db->from('forum_topic');
                $query = $this->db->get();  
                return $query->result();
        }

        public function insert_post($data)
        {

                $this->db->insert('forum_post', $data);

        }

        public function how_many_posts($getID)
        {

              
                $this->db->where('forum_topic_id', $getID);
                $this->db->select('post');
                $this->db->from('forum_post');
                $query = $this->db->get();  
                return count($query->result());
        }
}
?>
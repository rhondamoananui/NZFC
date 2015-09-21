<?php
class Admin_model extends CI_Model {

        public function __construct()
        {
                parent::__construct();
                $this->load->database();
        }

        // Home Page - Recent Members
        // Get all the profile_img & username & date from the last 5 members
        // select * from tbl_name order by id desc limit N;
        public function get_recent_members()
        {

                $this->db->select('id');
                $this->db->select('username');
                $this->db->select('profile_img');
                $this->db->select('date');
                $this->db->from('user_registration');
                $this->db->order_by('id', 'desc');
                $this->db->limit(4);
                $query = $this->db->get();
                return $query->result();


        }


        // Home Page - Recent Forum Posts
        // Get username, avatar, post, topic id, for the 4 most recent posts
        public function get_recent_posts()
        {

                $this->db->select('forum_topic_id');
                $this->db->select('username');
                $this->db->select('avatar');
                $this->db->select('post');
                $this->db->from('forum_post');
                $this->db->order_by('id', 'desc');
                $this->db->limit(4);
                $query = $this->db->get();
                return $query->result();


        }


        // Home Page - Recent Blog Posts
        // Get id, filename, headline for the 4 most recent blogs
        public function get_recent_blogs()
        {

                $this->db->select('id');
                $this->db->select('filename');
                $this->db->select('headline');
                $this->db->from('blog');
                $this->db->order_by('id', 'desc');
                $this->db->limit(4);
                $query = $this->db->get();
                return $query->result();


        }

        // Home Page - Slider Images
        // Get all Slider images
        public function get_slider_img()
        {
                $query = $this->db->get('home_slider');
                return $query->result();
        }



        // update the home_page table where the id is 1
        public function insert_data($post)
        {

                $this->db->where('id', 1);
                $this->db->update('home_page', $post);
        }

        // insert the filename, alt, caption, title into the
        // photo_gallery table
        // these are the images on the photo's page, they are viewed 
        // in a lightbox
        public function insert_photo($post)
        {

                $this->db->insert('photo_gallery', $post);

        }

        // this query gets all images from the database
        // ready to display on the photo's page
        public function all_imgs()
        {

                $this->db->get('photo_gallery');
                return $query->result();
        }

        // this query updates the gallery table with the new
        // title, alt text, caption
        public function update_gallery_img($id, $post)
        {
                $this->db->where('id', $id);
                $this->db->update('photo_gallery', $post);
        }


        // get the slider filename according to its id so it can be deleted
        public function photo_filename($id)
        {
                $this->db->where('id', $id);
                $this->db->select('filename');
                $this->db->from('photo_gallery');
                $query = $this->db->get();
                return $query->result();                
        }

        // Delete the Slider from the db
        // delete the row where the id = $id
        public function delete_photo($id)
        {
                $this->db->where('id', $id);
                $this->db->delete('photo_gallery');

        }



        // add a new forum category
        public function new_category($data)
        {

                $this->db->insert('forum_category', $data);
        }

        // update the forum category
        public function update_category($id, $post)
        {
                $this->db->where('id', $id);
                $this->db->update('forum_category', $post); 
        }

        // Delete the row from forum_category 
        // where id = $id
        public function delete_forum_category($id)
        {
                $this->db->where('id', $id);
                $this->db->delete('forum_category');
        }

        // insert a new slider image
        public function add_slider($post)
        {

                $this->db->insert('home_slider', $post);
        }

        // Get all slider images to display on the home page
        public function get_slider()
        {

                $query = $this->db->get('home_slider');
                return $query->result();
        }

        // Update the home_slider table, where the id is = $id
        // 
        public function update_slider($id, $post)
        {
                $this->db->where('id', $id);
                $this->db->set($post);
                $this->db->update('home_slider');                
        }

        // get the slider filename according to its id so it can be deleted
        public function slider_filename($id)
        {
                $this->db->where('id', $id);
                $this->db->select('filename');
                $this->db->from('home_slider');
                $query = $this->db->get();
                return $query->result();                
        }

        // Delete the Slider from the db
        // delete the row where the id = $id
        public function delete_slider($id)
        {
                $this->db->where('id', $id);
                $this->db->delete('home_slider');

        }



        // approve charters
        // get all charter where approval is set to 0
        public function get_charters_approval()
        {
                $this->db->where('approval', 0);
                $this->db->select('id');
                $this->db->select('charter_name');
                $this->db->from('charters');
                $query = $this->db->get();
                return $query->result();
        }

        // Update Charter to Approved where id = 
        // Once charter listing is set to approved 1
        // the listing will show on the charter page
        public function approve_charter($id)
        {
                $this->db->where('id', $id);
                $this->db->set('approval', 1);
                $this->db->update('charters');
        }


        // Approve Tournaments
        // get all tournaments where approval is set to 0
        public function get_tournaments_approval()
        {
                $this->db->where('approval', 0);
                $this->db->select('id');
                $this->db->select('tournament_name');
                $this->db->from('tournaments');
                $query = $this->db->get();
                return $query->result();
        }

        // Update Tournaments to Approved where id = 
        // Once tournament listing is set to approved 1
        // the listing will show on the tournament page
        public function approve_tournament($id)
        {
                $this->db->where('id', $id);
                $this->db->set('approval', 1);
                $this->db->update('tournaments');
        }

        // Approve Campgrounds
        // get all campground where approval is set to 0
        public function get_campgrounds_approval()
        {
                $this->db->where('approval', 0);
                $this->db->select('id');
                $this->db->select('campground_name');
                $this->db->from('campgrounds');
                $query = $this->db->get();
                return $query->result();
        }

        // Update Campgrounds to Approved where id = 
        // Once campground listing is set to approved 1
        // the listing will show on the campground page
        public function approve_campground($id)
        {
                $this->db->where('id', $id);
                $this->db->set('approval', 1);
                $this->db->update('campgrounds');
        }


        // Contact Page
        // When a user submits a message on the contact page
        // insert the message into the messages table
        public function insert_message($post)
        {
                $this->db->insert('messages', $post);
        }

        // Admin Contact 
        // get all messages from the database where read is set to 0
        // if read is set to 1, the message has been read and will not
        // show on the admin messages page
        public function get_messages()
        {
                $this->db->where('read', 0);
                $query = $this->db->get('messages');
                return $query->result();
        }

        // Update Messages to Read where id = 
        // Once message is set to read 1
        // the will no longer show in the message area
        public function read_message($id)
        {
                $this->db->where('id', $id);
                $this->db->set('read', 1);
                $this->db->update('messages');
        }

        // Update the Blog content
        // where the id is $id, update the blog
        public function update_blog($id, $post)
        {
                $this->db->where('id', $id);
                $this->db->set($post);
                $this->db->update('blog');      
        }

        // get the filename for the blog image so it can be deleted
        public function blog_img($id)
        {
                $this->db->where('id', $id);
                $this->db->select('filename');
                $this->db->from('blog');
                $query = $this->db->get();
                return $query->result();                 
        }


        // Delete the Blog from the db
        // delete the row where the id = $id
        public function delete_blog($id)
        {
                $this->db->where('id', $id);
                $this->db->delete('blog');

        }







}
?>
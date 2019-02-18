<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Login_model extends CI_Model {
    
        public function admin($username, $password)
        {
            $query=$this->db->query("SELECT * FROM admin WHERE username='$username' AND password=MD5('$password') LIMIT 1");
            return $query;

            

        }

        public function adminMavens($username, $password)
        {
            $query=$this->db->query("SELECT * FROM super_admin WHERE username='$username' AND password=MD5('$password') LIMIT 1");
            return $query;

        }

    }
    /* End of file Login_model.php */
    
?>
<?php
    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Camera_model extends CI_Model {
    
        public function insertCamera()
        {
            $insert = array(
                    'link' => $this->input->post('link'),
                    'id_terminal' => $this->input->post('id_terminal'),
                );
            $this->db->insert('camera', $insert);
        }

        public function getTerminal()
        {
            $this->db->select("id_terminal, nama_terminal");
            $query = $this->db->get('terminal');
            return $query->result();
        }
    
    }
    
    /* End of file Camera_model.php */
    
?>
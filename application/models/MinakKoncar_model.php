<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class MinakKoncar_model extends CI_Model {
    
        public function showCamera()
        {
            $this->db->select("camera.id_camera, camera.link, terminal.id_terminal, terminal.nama_terminal");
            $this->db->join('terminal', 'terminal.id_terminal = camera.id_terminal', 'left');
            $this->db->order_by('link', 'desc');
            $this->db->where('terminal.id_terminal',15);
            
            $query = $this->db->get('camera');
            return $query->result();
        }

        public function getTerminal()
        {
            $this->db->select("id_terminal, nama_terminal");
            $query = $this->db->get('terminal');
            return $query->result();
        }

        public function getCameraById($id_camera)
        {
            $this->db->select("id_camera, link, id_terminal");
            $this->db->where('id_camera', $id_camera);
            $query = $this->db->get('Camera');
            return $query->result();
        }

        function cameraTerdaftar($id_camera) {
            $this->db->select('id_camera');
            $this->db->from('camera');
            $this->db->where('id_camera', $id_camera);
            $query = $this->db->get();
            if ($query->num_rows() > 0) {
                return true;
            } else {
                return false;
            }
        }
    
    }
    
    /* End of file MinakKoncar_model.php */
    
?>
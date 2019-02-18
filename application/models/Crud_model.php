<?php 
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Crud_model extends CI_Model {
    
        public function insertCrud()
        {
            $insert = array(
                    'link' => $this->input->post('link'),
                    'id_terminal' => $this->input->post('id_terminal'),
                );
            $this->db->insert('camera', $insert);
        }
        
        public function showCamera()
        {
            $this->db->select("camera.id_camera, camera.link, terminal.id_terminal, terminal.nama_terminal");
            $this->db->join('terminal', 'terminal.id_terminal = camera.id_terminal', 'left');
            $this->db->order_by('link', 'desc');
            $this->db->where('terminal.id_terminal',1);
            
            $query = $this->db->get('camera');
            return $query->result();
        }

        public function getCamera()
        {
            $this->db->select("camera.id_camera, camera.link, terminal.id_terminal, terminal.nama_terminal");
            $this->db->join('terminal', 'terminal.id_terminal = camera.id_terminal', 'left');
            
            
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
            $query = $this->db->get('camera');
            return $query->result();
        }

        public function viewCamera($id_camera)
        {
            $this->db->select("id_camera,link");
            $this->db->where('id_camera', $id_camera);
            $query = $this->db->get('camera');
            return $query->result();
        }
 
        public function editCamera($id_camera)
        {
            $edit = array(
                'link' => $this->input->post('link'), 
                'id_terminal' => $this->input->post('id_terminal'),
            );
            $this->db->where('id_camera', $id_camera);
            $this->db->update('camera', $edit);
        }
        
        public function deleteCamera($id_camera)
        {
            $this->db->where('id_camera', $id_camera);
            $this->db->delete('camera');
        }

        public function select_camera($link)
        {
            $this->load->library('form_validation');
            $this->db->select('*');
            $this->db->from('camera');
            $this->db->where('link', $link);
            $query = $this->db->get();
            if ($query->num_rows() > 0) {
                return true;
            } else {
                return false;
            }
        }

        public function cameraTerdaftar($id_camera) {
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
    
    /* End of file Crud_model.php */
    
?>
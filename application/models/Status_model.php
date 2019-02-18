<?php
    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Status_model extends CI_Model {
    
        public function insertStatus()
        {
            $insert = array(
                    'id_terminal' => $this->input->post('id_terminal'),
                    'ip' => $this->input->post('ip'),

                );
            $this->db->insert('status', $insert);
        }

        public function showStatus()
        {
            $this->db->select("status.id_status, status.ip, terminal.id_terminal, terminal.nama_terminal");
            $this->db->join('terminal', 'terminal.id_terminal = status.id_terminal', 'left');
            $this->db->order_by('ip', 'desc');
            
            $query = $this->db->get('status');
            return $query->result();
        }

        public function getTerminal()
        {
            $this->db->select("id_terminal, nama_terminal");
            $query = $this->db->get('terminal');
            return $query->result();
        }

        public function getStatusById($id_status)
        {
            $this->db->select("id_status, id_terminal, ip");
            $this->db->where('id_status', $id_status);
            $query = $this->db->get('status');
            return $query->result();
        }

        public function editStatus($id_status)
        {
            $edit = array(
                'id_terminal' => $this->input->post('id_terminal'),
                'ip' => $this->input->post('ip'), 
            );
            $this->db->where('id_status', $id_status);
            $this->db->update('status', $edit);
        }

        public function deleteStatus($id_status)
        {
            $this->db->where('id_status', $id_status);
            $this->db->delete('status');
        }

        public function select_status($ip)
        {
            $this->load->library('form_validation');
            $this->db->select('*');
            $this->db->from('status');
            $this->db->where('ip', $ip);
            $query = $this->db->get();
            if ($query->num_rows() > 0) {
                return true;
            } else {
                return false;
            }
        }

        public function statusTerdaftar($id_status) {
            $this->db->select('id_status');
            $this->db->from('status');
            $this->db->where('id_status', $id_status);
            $query = $this->db->get();
            if ($query->num_rows() > 0) {
                return true;
            } else {
                return false;
            }
        }
    
    }
    
    /* End of file Status_model.php */
    
?>
<?php
    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Keluhan_model extends CI_Model {
    
        public function insertKeluhan()
        {
            $insert = array(
                'nama_terminal' => $this->input->post('nama_terminal'),
                'tgl_keluhan' => $this->input->post('tgl_keluhan'),                    
                'id_jeniskeluhan' => $this->input->post('id_jeniskeluhan'),
                'isi_keluhan' => $this->input->post('isi_keluhan'),
                'tgl_penanganan' => $this->input->post('tgl_penanganan'),
                'penanggungjawab' => $this->input->post('penanggungjawab'),
                
                
                );
            $this->db->insert('keluhan', $insert);
        }

        public function showKeluhan()
        {
            $this->db->select("keluhan.id_keluhan, keluhan.tgl_keluhan,keluhan.nama_terminal ,keluhan.isi_keluhan,keluhan.tgl_penanganan,keluhan.penanggungjawab, jenis_keluhan.id_jeniskeluhan, jenis_keluhan.jenis_keluhan");
            $this->db->join('jenis_keluhan', 'jenis_keluhan.id_jeniskeluhan = keluhan.id_jeniskeluhan', 'left');
           
            
            $this->db->order_by('tgl_keluhan', 'desc');
            
            $query = $this->db->get('keluhan');
            return $query->result();
        }

         public function getTerminal()
        {
            $this->db->select("id_terminal, nama_terminal");
            $query = $this->db->get('terminal');
            return $query->result();
        }
        
        public function getTerminalById($id_terminal)
        {
            $this->db->select("id_terminal, nama_terminal");
            $this->db->where('id_terminal', $id_terminal);
            $query = $this->db->get('terminal');
            return $query->result();
        }

        public function getJenisKeluhan()
        {
            $this->db->select("id_jeniskeluhan, jenis_keluhan");
            $query = $this->db->get('jenis_keluhan');
            return $query->result();
        }

        public function getCamera()
        {
            $this->db->select("id_camera, link, id_terminal");
            $query = $this->db->get('camera');
            return $query->result();
        }
        
        public function getCameraById($id_camera)
        {
            $this->db->select("id_camera, link, id_terminal");
            $query = $this->db->get('camera');
            $this->db->where('id_camera', $id_camera);
            return $query->result();
        }

        public function getKeluhanById($id_keluhan)
        {
            $this->db->select("id_camera, id_keluhan, tgl_keluhan,id_jeniskeluhan, isi_keluhan, tgl_penanganan, penanggungjawab ");
            $this->db->where('id_keluhan', $id_keluhan);
            $query = $this->db->get('keluhan');
            return $query->result();
        }
        
        function cameraTerdaftar($id_keluhan) {
            $this->db->select('id_keluhan');
            $this->db->from('keluhan');
            $this->db->where('id_keluhan', $id_keluhan);
            $query = $this->db->get();
            if ($query->num_rows() > 0) {
                return true;
            } else {
                return false;
            }
        }
    
    }
    
    /* End of file Keluhan_model.php */
    
?>
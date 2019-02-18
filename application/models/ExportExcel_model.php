<?php 
    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class ExportExcel_model extends CI_Model {
    
        function fetch_data()
        {
            $this->db->order_by("id_keluhan", "DESC");
            $query = $this->db->get("keluhan");
            return $query->result();
        }
    
    }
    
    /* End of file ExportExcel_model.php */
    
?>
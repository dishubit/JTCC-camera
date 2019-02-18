<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class LaporanMav extends CI_Controller {
    
        public function __construct() {
            parent::__construct();
            // load model
            $this->load->model('KeluhanMav_model', 'export');
        }   

        public function index()
        {
            $data['page'] = 'export-excel';
            $data['title'] = 'Data Keluhan Terminal';
            $data['keluhan'] = $this->export->keluhanList();
            // load view file for output
            $this->load->view('keluhan/laporan_keluhan', $data);
        }

        public function createXLS() {
            $fileName = 'data-'.time().'.xlsx';
        }
    
    }
    
    /* End of file LaporanMav.php */
    
?>
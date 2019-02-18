<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class KeluhanMav extends CI_Controller {
    
        
        public function __construct()
        {
            parent::__construct();
            
            $this->load->model('Keluhanmav_model');
            if($this->session->userdata('akses')=='2'){
                
                // redirect('Larangan','refresh');
                
            }else{
                
                redirect('Login','refresh');
                
            }
            
        }

        public function index()
        {
            $data["jeniskeluhan"] = $this->Keluhanmav_model->getJenisKeluhan();
            $data["camera"] = $this->Keluhanmav_model->getCamera();
            $data["terminal"] = $this->Keluhanmav_model->getTerminal();
		    $data['data_keluhan'] = $this->Keluhanmav_model->showKeluhan();
            $this->load->view('header/headermav',$data);
            $this->load->view('keluhan/keluhanmav',$data);
            $this->load->view('footer/footer2',$data);
        }

        

        public function tangani($id_keluhan)
        {
            $data["camera"] = $this->Keluhanmav_model->getCamera();
            $data["terminal"] = $this->Keluhanmav_model->getTerminal();
            $data['jeniskeluhan']=$this->Keluhanmav_model->getJenisKeluhan();
            $data['data_keluhan']=$this->Keluhanmav_model->showKeluhan();
            $data['get_keluhan']=$this->Keluhanmav_model->getKeluhanById($id_keluhan);
            $this->load->helper(array('form','url'));
            
 
            $this->form_validation->set_rules('tgl_penanganan', 'tgl_penanganan', 'trim|required');
            $this->form_validation->set_rules('penanggungjawab', 'penanggungjawab', 'trim|required');
        


            if($this->form_validation->run()==FALSE){
                $this->load->view('header/headermav', $data);
                $this->load->view('keluhan/tangani_keluhan', $data);
                $this->load->view('footer/footer2', $data);
            }else{
                $this->Keluhanmav_model->editKeluhan($id_keluhan);
                redirect('HomeMav','refresh');
            }
        }

        

        //function to export to excel
        function toExcelAll() {
            $data["jeniskeluhan"] = $this->Keluhanmav_model->getJenisKeluhan();
            $data["camera"] = $this->Keluhanmav_model->getCamera();
            $data["terminal"] = $this->Keluhanmav_model->getTerminal();
            $data['data_keluhan'] = $this->Keluhanmav_model->showKeluhan();
            $this->load->view('keluhan/excel_view',$data);
        }

        
    }
    
    /* End of file KeluhanMav.php */
    
?>
<?php
    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Camera extends CI_Controller {
    
        public function __construct()
        {
            parent::__construct();
            
            $this->load->model('Camera_model');
            if($this->session->userdata('akses')=='1'){
                
                // redirect('Larangan','refresh');
                
            }else{
                
                redirect('Login','refresh');
                
            }
        }

        public function index()
        {
            $this->form_validation->set_rules('link', 'link', 'trim|required');
            $data["terminal"] = $this->Camera_model->getTerminal();
            // $data['data_camera'] = $this->Camera_model->showCamera();
    
            if ($this->form_validation->run()==FALSE) {
                $this->load->view('header/header',$data );
                $this->load->view('camera');
                $this->load->view('footer/footer',$data);
            } else { 
                $this->Camera_model->insertCamera();
                $this->session->set_flashdata('sudah_input', 'Camera sudah ditambah!');	
                redirect('Camera','refresh');
            }
        }

        
    
    }
    
    /* End of file Camera.php */
    
?>
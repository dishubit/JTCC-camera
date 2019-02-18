<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Kesamben extends CI_Controller {
    
        
        public function __construct()
        {
            parent::__construct();
            
            $this->load->model('Kesamben_model');
            if($this->session->userdata('akses')=='1'){
                
                // redirect('Larangan','refresh');
                
            }else{
                
                redirect('Login','refresh');
                
            }
            
        }
        

        public function index()
        {
            $data["terminal"] = $this->Kesamben_model->getTerminal();
		    $data['data_camera'] = $this->Kesamben_model->showCamera();
            $this->load->view('header/header',$data);
            $this->load->view('kesamben/kesamben',$data);
            $this->load->view('footer/footer2',$data);
        }

        public function add()
        {
            
            $this->form_validation->set_rules('link', 'link', 'trim|required');
            $data["terminal"] = $this->Kesamben_model->getTerminal();
            $data['data_camera'] = $this->Kesamben_model->showCamera();
    
            if ($this->form_validation->run()==FALSE) {
                $this->load->view('header/header', $data);
                $this->load->view('kesamben/kesamben');
                $this->load->view('footer/footer', $data);
            } else { 
                $this->Kesamben_model->insertKesamben();
                $this->session->set_flashdata('sudah_input', 'Camera sudah ditambah!');	
                redirect('Kesamben','refresh');
            }
        }

        public function edit($id_camera)
        {
            $data['get_camera']=$this->Kesamben_model->getCameraById($id_camera);
            $data["terminal"] = $this->Kesamben_model->getTerminal();
            $this->form_validation->set_rules('link', 'link', 'trim|required');
        
            if($this->form_validation->run()==FALSE){
                $this->load->view('header/header', $data);
                $this->load->view('kesamben/edit_kesamben');
                $this->load->view('footer/footer', $data);
            }else{
                $this->Kesamben_model->editCamera($id_camera);
                redirect('Kesamben','refresh');
            }
        }

        public function delete($id_camera)
        {
                $terdaftar=$this->Kesamben_model->cameraTerdaftar($id_camera);
                if ($terdaftar) {
                    $this->session->set_flashdata('terhapus', 'Camera Berhasil Dihapus');
                    $this->Kesamben_model->deleteCamera($id_camera);
                    redirect('Kesamben', 'refresh');
                } else {
                    $this->session->set_flashdata('fail', 'Tidak dapat menghapus, Camera tersebut telah digunakan');
                    redirect('Kesamben','refresh');
                }
        }

        
    
    }
    
    /* End of file Kesamben.php */
    
?>
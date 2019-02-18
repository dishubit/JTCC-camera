<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class HamidRusdi extends CI_Controller {
    
        
        public function __construct()
        {
            parent::__construct();
            
            $this->load->model('HamidRusdi_model');
            if($this->session->userdata('akses')=='1'){
                
                // redirect('Larangan','refresh');
                
            }else{
                
                redirect('Login','refresh');
                
            }
            
        }
        

        public function index()
        {
            $data["terminal"] = $this->HamidRusdi_model->getTerminal();
		    $data['data_camera'] = $this->HamidRusdi_model->showCamera();
            $this->load->view('header/header',$data);
            $this->load->view('hamidrusdi/hamidrusdi',$data);
            $this->load->view('footer/footer2',$data);
        }

        public function add()
        {
            
            $this->form_validation->set_rules('link', 'link', 'trim|required');
            $data["terminal"] = $this->HamidRusdi_model->getTerminal();
            $data['data_camera'] = $this->HamidRusdi_model->showCamera();
    
            if ($this->form_validation->run()==FALSE) {
                $this->load->view('header/header', $data);
                $this->load->view('hamidrusdi/hamidrusdi');
                $this->load->view('footer/footer', $data);
            } else { 
                $this->HamidRusdi_model->insertHamidRusdi();
                $this->session->set_flashdata('sudah_input', 'Camera sudah ditambah!');	
                redirect('HamidRusdi','refresh');
            }
        }

        public function edit($id_camera)
        {
            $data['get_camera']=$this->HamidRusdi_model->getCameraById($id_camera);
            $data["terminal"] = $this->HamidRusdi_model->getTerminal();
            $this->form_validation->set_rules('link', 'link', 'trim|required');
        
            if($this->form_validation->run()==FALSE){
                $this->load->view('header/header', $data);
                $this->load->view('hamidrusdi/edit_hamidrusdi');
                $this->load->view('footer/footer', $data);
            }else{
                $this->HamidRusdi_model->editCamera($id_camera);
                redirect('HamidRusdi','refresh');
            }
        }

        public function delete($id_camera)
        {
                $terdaftar=$this->HamidRusdi_model->cameraTerdaftar($id_camera);
                if ($terdaftar) {
                    $this->session->set_flashdata('terhapus', 'Camera Berhasil Dihapus');
                    $this->HamidRusdi_model->deleteCamera($id_camera);
                    redirect('HamidRusdi', 'refresh');
                } else {
                    $this->session->set_flashdata('fail', 'Tidak dapat menghapus, Camera tersebut telah digunakan');
                    redirect('HamidRusdi','refresh');
                }
        }

        
    
    }
    
    /* End of file HamidRusdi.php */
    
?>
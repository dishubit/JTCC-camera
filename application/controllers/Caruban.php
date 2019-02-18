<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Caruban extends CI_Controller {
    
        
        public function __construct()
        {
            parent::__construct();
            
            $this->load->model('Caruban_model');
            if($this->session->userdata('akses')=='1'){
                
                // redirect('Larangan','refresh');
                
            }else{
                
                redirect('Login','refresh');
                
            }
            
        }
        

        public function index()
        {
            $data["terminal"] = $this->Caruban_model->getTerminal();
		    $data['data_camera'] = $this->Caruban_model->showCamera();
            $this->load->view('header/header',$data);
            $this->load->view('caruban/caruban',$data);
            $this->load->view('footer/footer2',$data);
        }

        public function add()
        {
            
            $this->form_validation->set_rules('link', 'link', 'trim|required');
            $data["terminal"] = $this->Caruban_model->getTerminal();
            $data['data_camera'] = $this->Caruban_model->showCamera();
    
            if ($this->form_validation->run()==FALSE) {
                $this->load->view('header/header', $data);
                $this->load->view('caruban/caruban');
                $this->load->view('footer/footer', $data);
            } else { 
                $this->Caruban_model->insertCaruban();
                $this->session->set_flashdata('sudah_input', 'Camera sudah ditambah!');	
                redirect('Caruban','refresh');
            }
        }

        public function edit($id_camera)
        {
            $data['get_camera']=$this->Caruban_model->getCameraById($id_camera);
            $data["terminal"] = $this->Caruban_model->getTerminal();
            $this->form_validation->set_rules('link', 'link', 'trim|required');
        
            if($this->form_validation->run()==FALSE){
                $this->load->view('header/header', $data);
                $this->load->view('caruban/edit_caruban');
                $this->load->view('footer/footer', $data);
            }else{
                $this->Caruban_model->editCamera($id_camera);
                redirect('Caruban','refresh');
            }
        }

        public function delete($id_camera)
        {
                $terdaftar=$this->Caruban_model->cameraTerdaftar($id_camera);
                if ($terdaftar) {
                    $this->session->set_flashdata('terhapus', 'Camera Berhasil Dihapus');
                    $this->Caruban_model->deleteCamera($id_camera);
                    redirect('Caruban', 'refresh');
                } else {
                    $this->session->set_flashdata('fail', 'Tidak dapat menghapus, Camera tersebut telah digunakan');
                    redirect('Caruban','refresh');
                }
        }

        
    
    }
    
    /* End of file Caruban.php */
    
?>
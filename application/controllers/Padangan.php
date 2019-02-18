<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Padangan extends CI_Controller {
    
        
        public function __construct()
        {
            parent::__construct();
            
            $this->load->model('Padangan_model');
            if($this->session->userdata('akses')=='1'){
                
                // redirect('Larangan','refresh');
                
            }else{
                
                redirect('Login','refresh');
                
            }
            
        }
        

        public function index()
        {
            $data["terminal"] = $this->Padangan_model->getTerminal();
		    $data['data_camera'] = $this->Padangan_model->showCamera();
            $this->load->view('header/header',$data);
            $this->load->view('padangan/padangan',$data);
            $this->load->view('footer/footer2',$data);
        }

        public function add()
        {
            
            $this->form_validation->set_rules('link', 'link', 'trim|required');
            $data["terminal"] = $this->Padangan_model->getTerminal();
            $data['data_camera'] = $this->Padangan_model->showCamera();
    
            if ($this->form_validation->run()==FALSE) {
                $this->load->view('header/header', $data);
                $this->load->view('padangan/padangan');
                $this->load->view('footer/footer', $data);
            } else { 
                $this->Padangan_model->insertPadangan();
                $this->session->set_flashdata('sudah_input', 'Camera sudah ditambah!');	
                redirect('Padangan','refresh');
            }
        }

        public function edit($id_camera)
        {
            $data['get_camera']=$this->Padangan_model->getCameraById($id_camera);
            $data["terminal"] = $this->Padangan_model->getTerminal();
            $this->form_validation->set_rules('link', 'link', 'trim|required');
        
            if($this->form_validation->run()==FALSE){
                $this->load->view('header/header', $data);
                $this->load->view('padangan/edit_padangan');
                $this->load->view('footer/footer', $data);
            }else{
                $this->Padangan_model->editCamera($id_camera);
                redirect('Padangan','refresh');
            }
        }

        public function delete($id_camera)
        {
                $terdaftar=$this->Padangan_model->cameraTerdaftar($id_camera);
                if ($terdaftar) {
                    $this->session->set_flashdata('terhapus', 'Camera Berhasil Dihapus');
                    $this->Padangan_model->deleteCamera($id_camera);
                    redirect('Padangan', 'refresh');
                } else {
                    $this->session->set_flashdata('fail', 'Tidak dapat menghapus, Camera tersebut telah digunakan');
                    redirect('Padangan','refresh');
                }
        }

        
    
    }
    
    /* End of file Padangan.php */
    
?>
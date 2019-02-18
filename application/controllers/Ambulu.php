<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Ambulu extends CI_Controller {
    
        
        public function __construct()
        {
            parent::__construct();
            
            $this->load->model('Ambulu_model');
            if($this->session->userdata('akses')=='1'){
                
                // redirect('Larangan','refresh');
                
            }else{
                
                redirect('Login','refresh');
                
            }
            
            
        }
        

        public function index()
        {
            $data["terminal"] = $this->Ambulu_model->getTerminal();
		    $data['data_camera'] = $this->Ambulu_model->showCamera();
            $this->load->view('header/header',$data);
            $this->load->view('ambulu/ambulu',$data);
            $this->load->view('footer/footer2',$data);
        }

        public function add()
        {
            
            $this->form_validation->set_rules('link', 'link', 'trim|required');
            $data["terminal"] = $this->Ambulu_model->getTerminal();
            $data['data_camera'] = $this->Ambulu_model->showCamera();
    
            if ($this->form_validation->run()==FALSE) {
                $this->load->view('header/header', $data);
                $this->load->view('ambulu/ambulu');
                $this->load->view('footer/footer', $data);
            } else { 
                $this->Ambulu_model->insertAmbulu();
                $this->session->set_flashdata('sudah_input', 'Camera sudah ditambah!');	
                redirect('Ambulu','refresh');
            }
        }

        public function edit($id_camera)
        {
            $data['get_camera']=$this->Ambulu_model->getCameraById($id_camera);
            $data["terminal"] = $this->Ambulu_model->getTerminal();
            $this->form_validation->set_rules('link', 'link', 'trim|required');
        
            if($this->form_validation->run()==FALSE){
                $this->load->view('header/header', $data);
                $this->load->view('ambulu/edit_ambulu');
                $this->load->view('footer/footer', $data);
            }else{
                $this->Ambulu_model->editCamera($id_camera);
                redirect('Ambulu','refresh');
            }
        }

        public function delete($id_camera)
        {
                $terdaftar=$this->Ambulu_model->cameraTerdaftar($id_camera);
                if ($terdaftar) {
                    $this->session->set_flashdata('terhapus', 'Camera Berhasil Dihapus');
                    $this->Ambulu_model->deleteCamera($id_camera);
                    redirect('Ambulu', 'refresh');
                } else {
                    $this->session->set_flashdata('fail', 'Tidak dapat menghapus, Camera tersebut telah digunakan');
                    redirect('Ambulu','refresh');
                }
        }

        
    
    }
    
    /* End of file Ambulu.php */
    
?>
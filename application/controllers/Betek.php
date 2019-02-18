<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Betek extends CI_Controller {
    
        
        public function __construct()
        {
            parent::__construct();
            
            $this->load->model('Betek_model');
            if($this->session->userdata('akses')=='1'){
                
                // redirect('Larangan','refresh');
                
            }else{
                
                redirect('Login','refresh');
                
            }
            
        }
        

        public function index()
        {
            $data["terminal"] = $this->Betek_model->getTerminal();
		    $data['data_camera'] = $this->Betek_model->showCamera();
            $this->load->view('header/header',$data);
            $this->load->view('betek/betek',$data);
            $this->load->view('footer/footer2',$data);
        }

        public function add()
        {
            
            $this->form_validation->set_rules('link', 'link', 'trim|required');
            $data["terminal"] = $this->Betek_model->getTerminal();
            $data['data_camera'] = $this->Betek_model->showCamera();
    
            if ($this->form_validation->run()==FALSE) {
                $this->load->view('header/header', $data);
                $this->load->view('betek/betek');
                $this->load->view('footer/footer', $data);
            } else { 
                $this->Betek_model->insertBetek();
                $this->session->set_flashdata('sudah_input', 'Camera sudah ditambah!');	
                redirect('Betek','refresh');
            }
        }

        public function edit($id_camera)
        {
            $data['get_camera']=$this->Betek_model->getCameraById($id_camera);
            $data["terminal"] = $this->Betek_model->getTerminal();
            $this->form_validation->set_rules('link', 'link', 'trim|required');
        
            if($this->form_validation->run()==FALSE){
                $this->load->view('header/header', $data);
                $this->load->view('betek/edit_betek');
                $this->load->view('footer/footer', $data);
            }else{
                $this->Betek_model->editCamera($id_camera);
                redirect('Betek','refresh');
            }
        }

        public function delete($id_camera)
        {
                $terdaftar=$this->Betek_model->cameraTerdaftar($id_camera);
                if ($terdaftar) {
                    $this->session->set_flashdata('terhapus', 'Camera Berhasil Dihapus');
                    $this->Betek_model->deleteCamera($id_camera);
                    redirect('Betek', 'refresh');
                } else {
                    $this->session->set_flashdata('fail', 'Tidak dapat menghapus, Camera tersebut telah digunakan');
                    redirect('Betek','refresh');
                }
        }

        
    
    }
    
    /* End of file Betek.php */
    
?>